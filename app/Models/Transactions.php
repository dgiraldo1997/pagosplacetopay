<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model {

    protected $table = 'transactions';
    protected $fillable = ['id','bankCode','bankInterface','returnURL','reference','description','language','currency','totalAmount','taxAmount','devolutionBase','tipAmount','payer','buyer','shipping','ipAddress','userAgent','name','value'];

    public function getPayer(){
        return $this->belongsTo('App\Models\Payers', 'payer', 'id');
    }
    public function getBuyer(){
        return $this->belongsTo('App\Models\Buyers', 'buyer', 'id');
    }
    public function getShipping(){
        return $this->belongsTo('App\Models\Shippings', 'shipping', 'id');
    }
}