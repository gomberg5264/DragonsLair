<?php
use App\Http\Controllers\miscController;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;

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

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::view('template', 'misc.template')->name('template');
Route::view('shell', 'misc.shell')->name('shell');
Route::get('foo', 'TestController@foo')->name('foo');
Route::get('back', 'miscController@back')->name('back');


Route::get('fail/{errorCode?}', 'FailController@index')->name('fail');   //Sends the error code as a parameter to the failController's index function.
/*
*   Below is a hacky method to handle the failure page routing.
*   It is terrible coding practice and is only used as a placeholder until I can code the routing properly.
*/
Route::get('fail/unauthenticated', 'FailController@unauthenticated')->name('unauthenticated');
Route::get('fail/incorrectCredentials', 'FailController@incorrectCredentials')->name('incorrectCredentials');
Route::get('fail/wrongPermissions', 'FailController@wrongPermissions')->name('wrongPermissions');

Route::get('success/{successCode?}', 'SuccessController@index')->name('success');   //Sends the success code as a parameter to the SuccessController's index function.
/*
 *   Below is a hacky method to handle the success page routing.
 *   It is terrible coding practice and is only used as a placeholder until I can code the routing properly.
 */
Route::get('success/registrationSuccess', 'SuccessController@registrationSuccess')->name('registrationSuccess');
Route::get('success/loginSuccess', 'SuccessController@loginSuccess')->name('loginSuccess');
Route::get('success/logoutSuccess', 'SuccessController@logoutSuccess')->name('logoutSuccess');
Route::get('success/postCreateSuccess', 'SuccessController@postCreateSuccess')->name('postCreateSuccess');
Route::get('success/postDeleteSuccess', 'SuccessController@postDeleteSuccess')->name('postDeleteSuccess');
Route::get('success/postEditSuccess', 'SuccessController@postEditSuccess')->name('postEditSuccess');


Route::post('register', 'UserController@register')->name('register');
Route::post('login', 'UserController@login')->name('login');
Route::post('logout', 'UserController@logout')->name('logout');
Route::get('users/{username?}', 'UserController@page')->name('page')->middleware('auth');
Route::get('usersList', 'UserController@index')->name('users')->middleware('auth');
Route::get('dashboard', 'UserController@dashboard')->name('dashboard')->middleware('auth');


Route::post('createPost', 'PostController@createPost')->name('post.create')->middleware('auth');
Route::get('posts/{ID}', 'PostController@indexes')->name('post')->middleware('auth');
Route::post('posts/getPost', 'PostController@getPost')->name('getPost')->middleware('auth');
Route::post('posts/deletePost/{postID}', 'PostController@deletePost')->name('deletePost')->middleware('auth');
Route::post('posts/editPost/', 'PostController@editPost')->name('editPost')->middleware('auth');
