<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class AnsReview extends Model
{
protected $table ='ans_reviews';
protected $fillable = [
			'user_id',
			'answer_id',
			'like',
			'dislike'

		];
}