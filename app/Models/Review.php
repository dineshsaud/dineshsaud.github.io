<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Review extends Model
{
	protected $table="reviews";
	protected $fillable=[
		'user_id',
		'craft_id',
		'comment',
		'tittle',
		'rating'
	];

	public function user(){
		return	$this->belongsTo('\App\User');
	}
}