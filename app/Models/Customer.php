<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customers";

    protected $fillable = [
    	'name',
    	'email',
    	'password',
    	'phone_no',
    	'address',
    	'gender',
    	'dob'
    ];

    public function setPasswordAttribute($value){

    	$this->attributes['password'] = bcrypt($value);

    }

    public function chat(){
        return $this->hasOne('\App\Models\Chat');
    }
}
