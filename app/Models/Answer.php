<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Answer extends Model
{

protected $table ='answer';
protected $fillable = [
			'question_id',
			'user_id',
			'answer',
			'likes',
			'dislikes'
];
public function user()
{
	return $this->belongsTo('App\User');
}

}