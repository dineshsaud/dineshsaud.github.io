<?php

namespace App\Http\Controllers\Craft;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Craft;

class ReviewController extends Controller
{

	public function __construct(){
		$this->middleware('auth');
	}

    public function review( Request $request)
    {

		$review = Review::create($request->all());

		$rate = Review::selectRaw('avg(rating) as rating')->where('craft_id', $review->craft_id)->first();

		Craft::where('id', $review->craft_id)->update(["rating" => intval($rate->rating)]);

		return redirect()->back()->with('success', 'Your review is submited.');	
    }

}
