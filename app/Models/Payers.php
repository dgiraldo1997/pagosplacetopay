<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payers extends Model {

    protected $table = 'payers';
    protected $fillable = ['id','document','documentType','firstName','lastName','company','emailAddress','address','city','province','country','phone','mobile','postalCode'];

}