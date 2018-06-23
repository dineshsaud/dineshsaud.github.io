<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Craft;


class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $condition = \DB::table('craft')->selectRaw('min(price) as price, max(rating) as rating')->get();
        $crafts = \DB::table('craft')
                    ->where('price', '>=', $condition[0]->price)->orderBy('rating', 'desc')
                    ->limit(8)->get();
                    
        $top_crafts = Craft::orderBy('rating','desc')->limit(8)->get();
        return view('users.index', compact('crafts','top_crafts'));
    }


}
