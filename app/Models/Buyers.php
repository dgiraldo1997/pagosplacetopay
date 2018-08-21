<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buyers extends Model {

    protected $table = 'buyers';
    protected $fillable = ['id','document','documentType','firstName','lastName','company','emailAddress','address','city','province','country','phone','mobile','postalCode'];

}