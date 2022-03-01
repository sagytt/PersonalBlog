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

Route::get('/', 'PublicController@index')->name('index');

Route::get('post/{post}', 'PublicController@singlePost')->name('singlePost');
Route::get('about', 'PublicController@about')->name('about');
Route::get('contact', 'PublicController@contact')->name('contact');
Route::post('contact', 'PublicController@contactPost')->name('contactPost');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::prefix('user')->group(function (){
    Route::post('new-comment', 'UserController@newComment')->name('newComment');
    Route::get('dashboard', 'UserController@dashboard')->name('userDashboard');
    Route::get('comments', 'UserController@comments')->name('userComments');
    Route::post('comment/{id}/delete', 'UserController@deleteComment')->name('deleteComment');
    Route::get('profile', 'UserController@profile')->name('userProfile');
    Route::post('profile', 'UserController@profilePost')->name('userProfilePost');
});

Route::prefix('author')->group(function (){
    Route::get('dashboard', 'Authorcontroller@dashboard')->name('authorDashboard');
    Route::get('posts', 'Authorcontroller@posts')->name('authorPosts');
    Route::get('posts/new', 'Authorcontroller@newPost')->name('newPost');
    Route::post('posts/new', 'Authorcontroller@createPost')->name('createPost');
    Route::get('post/{id}/edit', 'Authorcontroller@postEdit')->name('postEdit');
    Route::post('post/{id}/edit', 'Authorcontroller@postEditpost')->name('postEditpost');
    Route::post('post/{id}/delete', 'Authorcontroller@deletePost')->name('deletePost');
    Route::get('comments', 'Authorcontroller@comments')->name('authorComments');
});

Route::prefix('admin')->group(function ()
{
    Route::get('dashboard', 'AdminController@dashboard')->name('adminDashboard');
    Route::get('posts', 'AdminController@posts')->name('adminPosts');
    Route::get('post/{id}/edit', 'AdminController@postEdit')->name('adminPostEdit');
    Route::post('post/{id}/edit', 'AdminController@postEditPost')->name('adminPostEditPost');
    Route::post('post/{id}/delete', 'AdminController@deletePost')->name('adminDeletePost');
    Route::get('Comments', 'AdminController@comments')->name('adminComments');
    Route::post('Comments/{id}/delete', 'AdminController@deleteComments')->name('adminDeleteComments');
    Route::get('users', 'AdminController@users')->name('adminUsers');
    Route::get('user/{id}/edit', 'AdminController@editUser')->name('adminEditUsers');
    Route::post('user/{id}/edit', 'AdminController@editUserPost')->name('adminEditUserPost');
    Route::post('user/{id}/delete', 'AdminController@deleteUser')->name('adminDeleteUser');


    Route::get('products', 'AdminController@products')->name('adminProducts');

    Route::get('products/new', 'AdminController@newProduct')->name('adminNewProduct');
    Route::post('products/new', 'AdminController@newProductPost')->name('adminNewProduct');

    Route::get('product/{id}', 'AdminController@editProduct')->name('adminEditProduct');
    Route::post('product/{id}', 'AdminController@editProductPost')->name('adminEditProduct');

    Route::post('product/{id}/delete', 'AdminController@deleteroduct')->name('adminDeleteProduct');

});

Route::prefix('shop')->group(function(){

    Route::get('/', 'ShopController@index')->name('shop.index');
    Route::get('product/{id}', 'ShopController@singleProduct')->name('shop.singleProduct');
    Route::get('product/{id}/order', 'ShopController@orderProduct')->name('shop.orderProduct');
    Route::get('product/{id}/execute', 'ShopController@executeOrder')->name('shop.executeOrder');

});

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');
