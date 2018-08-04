<?php
Route::get('/', 'HomeController@index')->name('hom');
Route::get('/profile', 'HomeController@profile');
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
route::get ('users', 'userscontroller@notindex');
route::get('/about','userscontroller@about');
// route::get('/contact','userscontroller@contact');
route::get('/create','userscontroller@create');
Route::get('/help', ['uses'=>'userscontroller@help']);
Route::get('/results', ['uses'=>'Guest\PostController@details']);
// craft routes
Route::get('/craft/register', 'Craft\RegisterController@registerForm')->name('cregister.view');
Route::post('/craft/register', 'Craft\RegisterController@register')->name('craftregister');
Route::get('craft/view','Craft\CraftPostController@viewProducts');
Route::get('/craft/', 'Craft\CraftPostController@viewProducts');
Route::get('/craft/{craft}/details', 'Craft\CraftPostController@details')->name('c.detail');
Route::get('/category/{cat}/results','Craft\CraftPostController@viewProductByCategory')->name('cat.results');
Route::post('/name/results','Craft\CraftPostController@viewProductByName')->name('name.results');
Route::post('/craft/review', 'Craft\ReviewController@review')->name('c.review');
// seller profile
Route::get('/user/{user}', 'seller\ShowController@show')->name('u.profile');
/*****************************
* this route belongs to chat *
*****************************/
Route::post('/chat/store', 'Chat\ChatController@store');
Route::post('/chat/history', 'Chat\ChatController@fetch');
Route::post('/chat', 'Chat\ChatController@fetchInbox');
// forum
Route::get('/forum','Forum\ForumController@viewForum')->name('v.forum');
Route::post('/forum/qpost','Forum\PostController@postQuestion')->name('q.post');
Route::post('/forum/apost','Forum\PostController@postAnswer')->name('a.post');
Route::get('/post/{id}/like','Forum\LikeController@answerLike')->name('a.like');
Route::get('/post/{id}/dislike','Forum\LikeController@answerDisLike')->name('a.dislike');
// filter
Route::get('/result/{seller}/seller','Craft\FilterController@showBySeller')->name('f.seller');
Route::get('/result/{seller}/seller/{cat}','Craft\FilterController@showBySellerAndCategory');
Route::get('/result/{type}/category','Craft\FilterController@showByCategory')->name('f.category');
Route::post('/filter/crafts','Craft\FilterController@filterCrafts');
Route::get('/crafts/{craft}/delete','Craft\CraftPostController@deleteCrafts')->name('c.delete');
Route::get('/crafts/{craft}/edit','Craft\CraftPostController@showEditCraftForm')->name('c.edit');
Route::post('/crafts/{craft}/update','Craft\CraftPostController@updateCraft')->name('craft.update');
Route::get('user/{id}/userUpdateForm','seller\ModifyUserController@showUpdateUser')->name('user.updateForm');
Route::post('user/userUpdate','seller\ModifyUse	rController@userUpdate')->name('user.update');
Route::get('/about-us','HomeController@showAboutUs')->name('aboutus');
Route::get('/user-guide','HomeController@showGuide')->name('guide');
Route::get('/shipping-method','HomeController@shippingMethod')->name('shipping-method');