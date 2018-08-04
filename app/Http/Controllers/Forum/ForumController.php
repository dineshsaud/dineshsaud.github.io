<?php
namespace App\Http\Controllers\Forum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Answer;
class ForumController extends Controller
{
public function __construct()
{
$this->middleware('auth');
}
public function viewForum()
{
		$likes = [];
		$question = Question::all();
		$answers = Answer::all();
		if(count(auth()->user()->likes()))
			foreach(auth()->user()->likes() as $like):
				$likes[$like->answer_id] = $like->liked;
			endforeach;
	return view('users.forum.forum',compact('question','answers', 'likes'));
}
}