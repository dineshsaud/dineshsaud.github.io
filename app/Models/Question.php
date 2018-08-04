<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Question extends Model
{
protected $table ='question';
protected $fillable = [
			'question',
			'user_id',
			'dislikes',
			'likes',
			
];

public function answers(){

	return $this->hasMany('\App\Models\Answer');
}

public function user()
{
	return $this->belongsTo('App\User');
}

}