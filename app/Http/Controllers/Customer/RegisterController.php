<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Chat;

class RegisterController extends Controller
{
    public function registerForm()
    {

    	return view('users.customer.register');
    }

    public function register( Request $data)
    {
    		$customer = Customer::create($data->all());
    		Chat::create(['customer_id'=> $customer->id]);
    		return redirect('login')->with('status', 'Registered Successfully!');
    }
}
