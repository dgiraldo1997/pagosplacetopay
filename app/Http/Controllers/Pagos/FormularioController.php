<?php

namespace App\Http\Controllers\Pagos;

use App\Http\Controllers\Controller;
use App\Models\Buyers;
use App\Models\Payers;
use App\Models\Shippings;
use App\Models\Transactions;
use App\Models\TransactionsInformation;
use App\Models\TransactionsResult;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Location;
use PhpParser\Builder\Function_;

class FormularioController extends Controller
{

    public $idTranKey, $url, $idPlace, $seed ,$fechacookie;

    public function __construct()
    {
        $this->idPlace = "6dd490faf9cb87a9862245da41170ff2";
        $this->url = "https://test.placetopay.com/soap/pse/?wsdl";
        $this->idTranKey = "024h1IlD";
        $this->seed = date('c');
        $this->fechacookie='';
    }


    public function index(Request $request)
    {
        $transactionsresult = TransactionsResult::get();
        foreach ($transactionsresult as $transactionresult) {
            $information = TransactionsInformation::where('transactionID', '=', $transactionresult->transactionID)->get();
            if (count($information) == 0) {
                //WebService para el consumo de respuesta de banco
                $transKey = sha1($this->seed . $this->idTranKey);

                $parametros = array();
                $params = array(); //parametros de la llamada


                $params['login'] = $this->idPlace;
                $params['tranKey'] = $transKey;
                $params['seed'] = $this->seed;
                $params['additional'] = array();

                $parametros['auth'] = $params;
                $parametros['transactionID'] = ($transactionresult->transactionID);

                try {
                    $client = new \SoapClient($this->url, $parametros);
                    $resulttransactioninformation = $client->getTransactionInformation($parametros);
                } catch (Exception $e) {
                    return 'Excepción capturada: ' . $e->getMessage() . "\n";
                }
                //Fin de WebService
                $datos = array();
                foreach ($resulttransactioninformation as $resultado) {
                    $datos = ['transactionID' => $resultado->transactionID, 'sessionID' => $resultado->sessionID, 'reference' => $resultado->reference, 'requestDate' => $resultado->requestDate, 'bankProcessDate' => $resultado->bankProcessDate, 'onTest' => $resultado->onTest, 'returnCode' => $resultado->returnCode, 'trazabilityCode' => $resultado->trazabilityCode, 'transactionCycle' => $resultado->transactionCycle, 'transactionState' => $resultado->transactionState, 'responseCode' => $resultado->responseCode, 'responseReasonCode' => $resultado->responseReasonCode, 'responseReasonText' => $resultado->responseReasonText, 'transactionresult' => $transactionresult->id];
                }
                $transactioninfo = new TransactionsInformation();
                $transactioninfo->fill($datos);
                $transactioninfo->save();
            }
        }

        $transactionresultfiltrarypaginar = TransactionsInformation::filtrarYPaginar($request->payerdocument, $request->payerfirstName, $request->payerlastName, $request->buyerdocument, $request->buyerfirstName, $request->buyerlastName, $request->shippingdocument, $request->bankCod, $request->language, $request->currency, $request->totalAmount, $request->taxAmount, $request->devolutionBase, $request->tipAmount,
            $request->responseReasonTextresult, $request->transactionID, $request->reference, $request->requestDate, $request->bankProcessDate, $request->returnCode, $request->transactionState, $request->responseReasonText);

        return view('pagos/formulario/index',compact('transactionresultfiltrarypaginar'));
    }

    public function create(Request $request)
    {
        $arraydocumenttype = array('CC' => 'Cédula de ciudadanía colombiana', 'CE' => 'Cédula de extranjería', 'TI' => 'Tarjeta de identidad', 'PPN' => 'Pasaporte', 'NIT' => 'Número de identificación tributaria', 'SSN' => 'Social Security Number');
        $arraycountry = array('CO' => 'Colombia', 'AR' => 'Argentina', 'BO' => 'Bolivia', 'BR' => 'Brazil');


        //WebService para la lista de bancos
        $transKey = sha1($this->seed . $this->idTranKey);

        $parametros = array();
        $params = array(); //parametros de la llamada


        $params['login'] = $this->idPlace;
        $params['tranKey'] = $transKey;
        $params['seed'] = $this->seed;
        $params['additional'] = array();

        $parametros['auth'] = $params;

        try {
            $client = new \SoapClient($this->url, $parametros);
            $result= $client->getBankList($parametros);

            $arraybanks = array();
            foreach ($result->getBankListResult as $banks) {
                foreach ($banks as $bank) {
                    $arraybanks[$bank->bankCode] = $bank->bankName;
                }
            }
        } catch (Exception $e) {
            return 'Excepción capturada: ' . $e->getMessage() . "\n";
        }


        //guardando arreglo de bancos en cookie
        /*setcookie('cookie',json_encode($arraybank),time()+3600);
        $data= json_encode($_COOKIE['cookie']);
        $attaybanck=json_decode($data);
        $arraybanks=json_decode($attaybanck,true);*/
        //fin
        //Fin de WebService

        $arraybankinterfaces = array('0' => 'Personas', '1' => 'Empresas');
        $arraylanguage = array('ES' => 'Español', 'En' => 'English', 'FR' => 'Français', 'IT' => 'Italiano');
        $arraymonedas = array('COP' => 'Pesos Colombianos', 'USD' => 'Dolar Estadounidense ', 'EUR' => 'Euro', 'BRL' => 'Real Brasileño');

        $ip = $request->ip();

        //obteniendo agente del navegador
        function detect()
        {
            $browser = array("IE", "OPERA", "MOZILLA", "NETSCAPE", "FIREFOX", "SAFARI", "CHROME");
            $os = array("WIN", "MAC", "LINUX");

            # definimos unos valores por defecto para el navegador y el sistema operativo
            $info['browser'] = "OTHER";
            $info['os'] = "OTHER";

            # buscamos el navegador con su sistema operativo
            foreach ($browser as $parent) {
                $s = strpos(strtoupper($_SERVER['HTTP_USER_AGENT']), $parent);
                $f = $s + strlen($parent);
                $version = substr($_SERVER['HTTP_USER_AGENT'], $f, 15);
                $version = preg_replace('/[^0-9,.]/', '', $version);
                if ($s) {
                    $info['browser'] = $parent;
                    $info['version'] = $version;
                }
            }


            # devolvemos el array de valores
            return $info;
        }

        $info = detect();
        $navegadorusado = $info["browser"] . '-' . $info["version"];

        //fin del agente

        return view('pagos/formulario/create', compact('arraydocumenttype', 'arraycountry', 'arraybanks', 'arraybankinterfaces', 'arraylanguage', 'arraymonedas', 'ip', 'navegadorusado'));
    }

    public function store(Request $request)
    {
        $data = ['bankCode' => $request->bankcode, 'bankInterface' => $request->bankinterface, 'returnURL' => $request->urlreturn, 'reference' => $request->reference, 'description' => $request->description, 'language' => $request->language, 'currency' => $request->currency, 'totalAmount' => $request->totalamount, 'taxAmount' => $request->taxamount, 'devolutionBase' => $request->devolutionbase, 'tipAmount' => $request->tipamount];
        $data['payer'] = array('documentType' => $request->documenttype, 'document' => $request->document, 'firstName' => $request->fristname, 'lastName' => $request->lastname, 'company' => $request->company, 'emailAddress' => $request->email, 'address' => $request->address, 'city' => $request->city, 'province' => $request->province, 'country' => $request->country, 'phone' => $request->phone, 'mobile' => $request->mobile, 'postalCode' => '');
        $data['buyer'] = array('documentType' => $request->documenttypebuyer, 'document' => $request->documentbuyer, 'firstName' => $request->fristnamebuyer, 'lastName' => $request->lastnamebuyer, 'company' => $request->companybuyer, 'emailAddress' => $request->emailbuyer, 'address' => $request->addressbuyer, 'city' => $request->citybuyer, 'province' => $request->provincebuyer, 'country' => $request->countrybuyer, 'phone' => $request->phonebuyer, 'mobile' => $request->mobilebuyer, 'postalCode' => '');
        $data['shipping'] = array('documentType' => $request->documenttypeshipping, 'document' => $request->documentshipping, 'firstName' => $request->fristnameshipping, 'lastName' => $request->lastnameshipping, 'company' => $request->companyshipping, 'emailAddress' => $request->emailshipping, 'address' => $request->addressshipping, 'city' => $request->cityshipping, 'province' => $request->provinceshipping, 'country' => $request->countryshipping, 'phone' => $request->phoneshipping, 'mobile' => $request->mobileshipping, 'postalCode' => '');
        $data = $data + ['ipAddress' => $request->ipaddress, 'userAgent' => $request->useragent];
        $data['additionalData'] = array('name' => $request->nameadicional, 'value' => $request->valueadicional);


        //WebService para el consumo de pago
        $transKey = sha1($this->seed . $this->idTranKey);

        $parametros = array();
        $params = array(); //parametros de la llamada


        $params['login'] = $this->idPlace;
        $params['tranKey'] = $transKey;
        $params['seed'] = $this->seed;
        $params['additional'] = array();

        $parametros['auth'] = $params;
        $parametros['transaction'] = $data;

        try {
            $client = new \SoapClient($this->url, $parametros);
            $resulttransaction = $client->createTransaction($parametros);
        } catch (Exception $e) {
            return 'Excepción capturada: ' . $e->getMessage() . "\n";
        }
        //Fin de WebService
        $payer = new Payers();
        $payer->fill($data['payer']);
        $payer->save();

        $buyer = new Buyers();
        $buyer->fill($data['buyer']);
        $buyer->save();

        $shipping = new Shippings();
        $shipping->fill($data['shipping']);
        $shipping->save();

        $transaction = new Transactions();
        $transaction->bankCode = $data['bankCode'];
        $transaction->bankInterface = $data['bankInterface'];
        $transaction->returnURL = $data['returnURL'];
        $transaction->reference = $data['reference'];
        $transaction->description = $data['description'];
        $transaction->language = $data['language'];
        $transaction->currency = $data['currency'];
        $transaction->totalAmount = $data['totalAmount'];
        $transaction->taxAmount = $data['taxAmount'];
        $transaction->devolutionBase = $data['devolutionBase'];
        $transaction->tipAmount = $data['tipAmount'];
        $transaction->payer = $payer->id;
        $transaction->buyer = $buyer->id;
        $transaction->shipping = $shipping->id;
        $transaction->ipAddress = $data['ipAddress'];
        $transaction->userAgent = $data['userAgent'];
        $transaction->name = $data['additionalData']['name'];
        $transaction->value = $data['additionalData']['value'];
        $transaction->save();

        $datos = array();
        foreach ($resulttransaction as $resultado) {
            $datos = ['returnCode' => $resultado->returnCode, 'bankURL' => $resultado->bankURL, 'trazabilityCode' => $resultado->trazabilityCode, 'transactionCycle' => $resultado->transactionCycle, 'transactionID' => $resultado->transactionID, 'sessionID' => $resultado->sessionID, 'bankCurrency' => $resultado->bankCurrency, 'bankFactor' => $resultado->bankFactor, 'responseCode' => $resultado->responseCode, 'responseReasonCode' => $resultado->responseReasonCode, 'responseReasonText' => $resultado->responseReasonText];
        }
        $transactionresult = new TransactionsResult();
        $transactionresult->fill($datos);
        $transactionresult->transaction = $transaction->id;
        $transactionresult->save();

        return redirect(url($transactionresult->bankURL));
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update($id)
    {

    }

    public function destroy()
    {

    }
}