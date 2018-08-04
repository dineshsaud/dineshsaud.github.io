<?php 
namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone_no' => 'required|numeric|unique:users',
            'gender' => 'required|string',
            'user_type' => 'required|string',
            'address' => 'required|string',
            'image' =>'max:2000'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create( $data)
    {


        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone_no' => $data['phone_no'],
            'address' => $data['address'],
            'dob' => $data['dob'],
            'user_type' => $data['user_type'],
            'image' => null,
            'gender' => $data['gender'],
        ]);

        if ($data->hasFile('image')) 
        {
            $destination = 'uploads'.DIRECTORY_SEPARATOR.'Users';
            $image=$data->file('image');
            $imageName = time().$image->getClientOriginalName();
            $image->move($destination,$imageName);

            $user->image = $destination.DIRECTORY_SEPARATOR.$imageName;
            $user->update();
        }
        return $user;
    }
}

