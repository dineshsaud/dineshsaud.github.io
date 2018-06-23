<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Seller;

class LoginController extends Controller
{
   public function customerLogin( Request $data)
   {
   	
	   	$customers = Customer::where([
	   		'email'		=> $data->email
	   	])->get();

	   	if(count($customers) > 0)
	   		foreach($customers as $customer):
			   	if(\Hash::check($data->password, $customer->password)):
			   		session(['auth' => $customer]);
				   	return redirect('/');
			   endif;
			endforeach;

		return redirect()->back()->with('error', 'Login credetials didn\'t match!!');

   } 
    public function sellerLogin( Request $data)
   {

	   $sellers = Seller::where([
	   		'email'		=> $data->email
	   	])->get();

	   	if(count($sellers) > 0)
	   		foreach($sellers as $seller):
			   	if(\Hash::check($data->password, $seller->password)):
			   		session(['auth' => $seller]);
				   	return redirect('/');
			   endif;
			endforeach;

		return redirect()->back()->with('error', 'Login credetials didn\'t match!!');
   }
}
