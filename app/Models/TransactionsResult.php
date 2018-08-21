<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionsResult extends Model {

    protected $table = 'transactionsresult';
    protected $fillable = ['id','returnCode','bankURL','trazabilityCode','transactionCycle','transactionID','sessionID','bankCurrency','bankFactor','responseCode','responseReasonCode','responseReasonText','transaction'];

    public function getTransaction(){
        return $this->belongsTo('App\Models\Transactions', 'transaction', 'id');
    }
}