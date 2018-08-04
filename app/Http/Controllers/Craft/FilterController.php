<?php

namespace App\Http\Controllers\Craft;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Craft;
use App\User;


class FilterController extends Controller
{
    

	public function filterCrafts(Request $data)
	{
		$condition = '';
		if($data->seller != '')
			$condition .= ' user_id ='.$data->seller.' AND';
		if($data->category != '')
			$condition .= ' handicrafttype ="'.$data->category.'" AND';
		if($data->price_from != '' && $data->price_upto == '')
			$condition .= ' price >= '.$data->price_from.' AND';
		if($data->price_upto != '' && $data->price_from == '')
			$condition .= ' price <= '. $data->price_upto.' AND';
		if($data->price_from != '' && $data->price_upto != '')
			$condition .= " price BETWEEN {$data->price_from} AND {$data->price_upto} AND";

		$crafts = \DB::table('craft')->whereRaw(\DB::raw(trim($condition, 'AND')))->get();
		return view('users.craft.filter', compact('crafts'));
	}


}
