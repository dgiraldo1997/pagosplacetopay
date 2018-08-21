<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionsInformation extends Model
{

    protected $table = 'transactionsinformation';
    protected $fillable = ['id', 'transactionID', 'sessionID', 'reference', 'requestDate', 'bankProcessDate', 'onTest', 'returnCode', 'trazabilityCode', 'transactionCycle', 'transactionState', 'responseCode', 'responseReasonCode', 'responseReasonText', 'transactionresult'];

    public function getTransactionResult()
    {
        return $this->belongsTo('App\Models\TransactionsResult', 'transactionresult', 'id');
    }

    public static function filtrarYPaginar($payerdocument, $payerfirstName, $payerlastName, $buyerdocument, $buyerfirstName, $buyerlastName, $shippingdocument, $bankCod, $language, $currency, $totalAmount, $taxAmount, $devolutionBase, $tipAmount,
                                           $responseReasonTextresult, $transactionID, $reference, $requestDate, $bankProcessDate, $returnCode, $transactionState, $responseReasonText)
    {
        return TransactionsInformation::select('payers.document as payerdocument', 'payers.firstName as payerfirstName', 'payers.lastName as payerlastName', 'buyers.document as buyerdocument', 'buyers.firstName as buyerfirstName', 'buyers.lastName as buyerslastName', 'shippings.document as shippingdocument',
            'transactions.bankCode', 'transactions.language', 'transactions.currency', 'transactions.totalAmount', 'transactions.taxAmount', 'transactions.devolutionBase', 'transactions.tipAmount', 'transactionsresult.responseReasonText as responseReasonTextresult',
            'transactionsinformation.transactionID', 'transactionsinformation.reference', 'transactionsinformation.requestDate', 'transactionsinformation.bankProcessDate', 'transactionsinformation.returnCode', 'transactionsinformation.transactionState', 'transactionsinformation.responseReasonText as responseReasonTextbank')
            ->leftJoin('transactionsresult', 'transactionsresult.id', '=', 'transactionsinformation.transactionresult')
            ->leftJoin('transactions', 'transactions.id', '=', 'transactionsresult.transaction')
            ->leftJoin('payers', 'payers.id', '=', 'transactions.payer')
            ->leftJoin('buyers', 'buyers.id', '=', 'transactions.buyer')
            ->leftJoin('shippings', 'shippings.id', '=', 'transactions.shipping')
            ->payerdocument($payerdocument)
            ->payerfirstName($payerfirstName)
            ->payerlastName($payerlastName)
            ->buyerdocument($buyerdocument)
            ->buyerfirstName($buyerfirstName)
            ->buyerlastName($buyerlastName)
            ->shippingdocument($shippingdocument)
            ->bankCod($bankCod)
            ->language($language)
            ->currency($currency)
            ->totalAmount($totalAmount)
            ->taxAmount($taxAmount)
            ->devolutionBase($devolutionBase)
            ->tipAmount($tipAmount)
            ->responseReasonTextresult($responseReasonTextresult)
            ->transactionID($transactionID)
            ->reference($reference)
            ->requestDate($requestDate)
            ->bankProcessDate($bankProcessDate)
            ->returnCode($returnCode)
            ->transactionState($transactionState)
            ->responseReasonText($responseReasonText)
            ->paginate();
    }

    public function scopepayerdocument($query, $key)
    {
        if (trim($key) <> '') {
            $query->where('payers.document', 'LIKE', '%' . $key . '%');
        }
    }

    public function scopepayerfirstName($query, $key)
    {
        if (trim($key) <> '') {
            $query->where('payers.firstName', 'LIKE', '%' . $key . '%');
        }
    }

    public function scopepayerlastName($query, $key)
    {
        if (trim($key) <> '') {
            $query->where('payers.lastName', 'LIKE', '%' . $key . '%');
        }
    }

    public function scopebuyerdocument($query, $key)
    {
        if (trim($key) <> '') {
            $query->where('buyers.document', 'LIKE', '%' . $key . '%');
        }
    }

    public function scopebuyerfirstName($query, $key)
    {
        if (trim($key) <> '') {
            $query->where('buyers.firstName', 'LIKE', '%' . $key . '%');
        }
    }

    public function scopebuyerlastName($query, $key)
    {
        if (trim($key) <> '') {
            $query->where('buyers.lastName', 'LIKE', '%' . $key . '%');
        }
    }

    public function scopeshippingdocument($query, $key)
    {
        if (trim($key) <> '') {
            $query->where('shippings.document', 'LIKE', '%' . $key . '%');
        }
    }

    public function scopebankCod($query, $key)
    {
        if (trim($key) <> '') {
            $query->where('transactions.bankCode', 'LIKE', '%' . $key . '%');
        }
    }

    public function scopelanguage($query, $key)
    {
        if (trim($key) <> '') {
            $query->where('transactions.language', 'LIKE', '%' . $key . '%');
        }
    }

    public function scopecurrency($query, $key)
    {
        if (trim($key) <> '') {
            $query->where('transactions.currency', 'LIKE', '%' . $key . '%');
        }
    }

    public function scopetotalAmount($query, $key)
    {
        if (trim($key) <> '') {
            $query->where('transactions.totalAmount', 'LIKE', '%' . $key . '%');
        }
    }

    public function scopetaxAmount($query, $key)
    {
        if (trim($key) <> '') {
            $query->where('transactions.taxAmount', 'LIKE', '%' . $key . '%');
        }
    }

    public function scopedevolutionBase($query, $key)
    {
        if (trim($key) <> '') {
            $query->where('transactions.devolutionBase', 'LIKE', '%' . $key . '%');
        }
    }

    public function scopetipAmount($query, $key)
    {
        if (trim($key) <> '') {
            $query->where('transactions.tipAmount', 'LIKE', '%' . $key . '%');
        }
    }

    public function scoperesponseReasonTextresult($query, $key)
    {
        if (trim($key) <> '') {
            $query->where('transactionsresult.responseReasonText', 'LIKE', '%' . $key . '%');
        }
    }

    public function scopetransactionID($query, $key)
    {
        if (trim($key) <> '') {
            $query->where('transactionsinformation.transactionID', 'LIKE', '%' . $key . '%');
        }
    }

    public function scopereference($query, $key)
    {
        if (trim($key) <> '') {
            $query->where('transactionsinformation.reference', 'LIKE', '%' . $key . '%');
        }
    }

    public function scoperequestDate($query, $key)
    {
        if (trim($key) <> '') {
            $query->where('transactionsinformation.requestDate', 'LIKE', '%' . $key . '%');
        }
    }

    public function scopebankProcessDate($query, $key)
    {
        if (trim($key) <> '') {
            $query->where('transactionsinformation.bankProcessDate', 'LIKE', '%' . $key . '%');
        }
    }

    public function scopereturnCode($query, $key)
    {
        if (trim($key) <> '') {
            $query->where('transactionsinformation.returnCode', 'LIKE', '%' . $key . '%');
        }
    }

    public function scopetransactionState($query, $key)
    {
        if (trim($key) <> '') {
            $query->where('transactionsinformation.transactionState', 'LIKE', '%' . $key . '%');
        }
    }

    public function scoperesponseReasonText($query, $key)
    {
        if (trim($key) <> '') {
            $query->where('transactionsinformation.responseReasonText', 'LIKE', '%' . $key . '%');
        }
    }
}