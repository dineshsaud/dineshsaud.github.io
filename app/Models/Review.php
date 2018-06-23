<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Review extends Model
{
	protected $table="reviews";
	protected $fillable=[
		'customer_id',
		'craft_id',
		'comment',
		'tittle',
		'rating'
	];

	public function customer(){
		return	$this->belongsTo('\App\Models\Customer');
	}
}