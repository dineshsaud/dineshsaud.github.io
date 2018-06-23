<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;

class RegisterController extends Controller
{
    public function registerForm()
    {

    	return view('users.customer.register');
    }

    public function register( Request $data)
    {
    		$customer = Customer::create($data->all());
    		return redirect('login')->with('status', 'Registered Successfully!');
    }
}
