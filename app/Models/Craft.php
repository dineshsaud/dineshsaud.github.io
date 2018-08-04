<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Craft extends Model
{
protected $table="craft";
protected $fillable=[

'name',
'seller_id',
'imgname1',
'imgname2',
'imgname3',
'price',
'quntity',
'handicrafttype',
'description',
'views',
'popularity',
'rating'
];
public function user(){
return $this->belongsTo('\App\User');
}
public function reviews(){
return $this->hasMany('\App\Models\Review');
}
}