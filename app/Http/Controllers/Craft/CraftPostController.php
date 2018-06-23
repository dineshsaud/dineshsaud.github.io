<?php
namespace App\Http\Controllers\Craft;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Craft;


class CraftPostController extends Controller
{


	public function viewProducts()
	{
		$sellers = \App\Models\Seller::all();
		$crafts = Craft::all();

		return view('users.craft.results',compact('crafts','sellers'));		
	}

	public function details(Craft $craft)
	{
		$craft->views++;
		$craft->update();
		return view('users.craft.details', compact('craft'));
	}	

	public function viewProductByCategory($type)
	{
		$sellers = \App\Models\Seller::all();
		$crafts = Craft::where('handicrafttype', $type)->get();

		return view('users.craft.results',compact('crafts','sellers'));

	}



}