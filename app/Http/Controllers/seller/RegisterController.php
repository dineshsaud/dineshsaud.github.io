<?php
namespace App\Http\Controllers\seller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seller;

class RegisterController extends Controller
{
	public function register(){
		return view('users.seller.sellerRegistration');
	}

	public function insert(Request $data){
		$seller = Seller::create($data->all());
		return $seller;
	}
}