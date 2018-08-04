<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'chats';
    protected $fillable = ['id', 'from', 'to'];

    public function seller()
    {
    	return $this->belongsTo('\App\Models\Seller');
    }

    public function customer()
    {
    	return $this->belongsTo('\App\Models\Customer');
    }
}
