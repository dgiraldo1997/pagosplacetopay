<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shippings extends Model {

    protected $table = 'shippings';
    protected $fillable = ['id','document','documentType','firstName','lastName','company','emailAddress','address','city','province','country','phone','mobile','postalCode'];

}