<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Craft;
class HomeController extends Controller
{
/**
* Create a new controller instance.
*
// * @return void
*/
// public function __construct()
// {
//     $this->middleware('auth');
// }
// *
//  * Show the application dashboard.
//  *
// * @return \Illuminate\Http\Response

public function index()
{
$top_crafts = Craft::orderBy('rating', 'desc')->limit(8)->get();
$crafts = Craft::orderBy('price')->orderBy('rating','desc')->limit(8)->get();
return view('users.index',compact('top_crafts','crafts'));
}
public function showAboutUs()
{
return view('aboutus');
}
public function showGuide()
{
return view('userGuide');
}
}