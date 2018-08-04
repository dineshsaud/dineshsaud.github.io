<?php
namespace App\Http\Controllers\Forum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\AnsReview;
class LikeController extends Controller
{
public function answerLike($id)
{
    $ans = Answer::find($id);
$ans->likes++;
$ans->update();
\DB::table("ans_reviews")->insert(["user_id"=>auth()->id(), "answer_id"=> $id, "liked"=> 1]);
        return redirect()->back();
}
public function answerDisLike($id)
{
$ans = Answer::find($id);
$ans->dislikes++;
$ans->update();
\DB::table("ans_reviews")->insert(["user_id"=>auth()->id(), "answer_id"=> $id, "liked"=> -1]);
return redirect()->back();
}
}