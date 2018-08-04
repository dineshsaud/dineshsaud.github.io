<?php
namespace App\Http\Controllers\Forum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Answer;
class PostController extends Controller
{
    public function __construct(){
$this->middleware('auth');
}


public function postAnswer( Request $answer)
{
$answer= Answer::create($answer->all());
return redirect()->back()->with('success', 'Your question is submited.');
}


public function postQuestion( Request $data)
{
    $question = Question::create($data->all());
    return redirect()->back()->with('success', 'Your question is submited.');
}
}