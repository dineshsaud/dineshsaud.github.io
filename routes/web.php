<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'HomeController@index');

route::get ('users', 'userscontroller@notindex');
Route::get('/login', function(){
	return view('users.customer.login');
})->name('login');
route::get('/about','userscontroller@about');
route::get('/contact','userscontroller@contact');
route::get('/create','userscontroller@create');
Route::get('/help', ['uses'=>'userscontroller@help']);
//retrieving post from database


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/results', ['uses'=>'Guest\PostController@details']);
Route::get('/sellerregister', ['uses'=>'seller\RegisterController@register'])->name('s.register');
route::post ('post','seller\RegisterController@insert')->name('s.create');
Route::get('/customer/register', 'Customer\RegisterController@registerForm')->name('register');
Route::post('/customer/register', 'Customer\RegisterController@register')->name('c.register');
/*login routes*/
Route::get('/login/seller', function(){
	return view('users.seller.login');
})->name('s.loginView');

Route::post('/login/seller', 'LoginController@sellerLogin')->name('s.login');
Route::post('/login/customer', 'LoginController@customerLogin')->name('c.login');
/* logout */
Route::post('/logout', function(){
	session()->forget('auth');
	return redirect('/');
});
// craft routes
Route::get('/craft/register', 'Craft\RegisterController@registerForm');
Route::post('/craft/register', 'Craft\RegisterController@register')->name('craftregister');

Route::get('craft/view','Craft\CraftPostController@viewProducts');


Route::get('/craft/', 'Craft\CraftPostController@viewProducts');
Route::get('/craft/{craft}/details', 'Craft\CraftPostController@details')->name('c.detail');

Route::get('/category/{cat}/results','Craft\CraftPostController@viewProductByCategory')->name('cat.results');

Route::post('/craft/review', 'Craft\ReviewController@review')->name('c.review');



