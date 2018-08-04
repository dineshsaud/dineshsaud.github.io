<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $table = "sellers";

    protected $fillable = [
    	'name',
    	'email',
    	'password',
    	'phone_no',
    	'address',
    	'account_no',
    	'dob'
    ];


    public function setPasswordAttribute($value){

    		$this->attributes['password'] = bcrypt($value);

    }

    public function crafts(){
        return $this->hasMany('\App\Models\Craft');
    }

    public function chat(){
        return $this->hasOne('\App\Models\Chat');
    }
}
