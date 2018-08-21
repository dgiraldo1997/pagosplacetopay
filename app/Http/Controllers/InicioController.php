<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use App\Models\Transactions;
use App\Models\TransactionsInformation;
use App\Models\TransactionsResult;
use Validator;

class InicioController extends Controller
{

    public function index()
    {
        //Consulta en la tabla transactions
        $transactions=TransactionsResult::get();
        $counttransaction=count($transactions);
        //fin de consulta
        return view('welcome',compact('counttransaction'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy(Request $request)
    {

    }
}
