<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/flights','FlightsController@index');
Route::get('/flight_create','FlightsController@save');
Route::post('/flight','FlightsController@store');

Route::get('/tasks', 'TaskController@index');
Route::get('/tasks/{id}', 'TaskController@edit');
Route::get('/edit/{id}', 'TaskController@edit');
Route::post('/task', 'TaskController@store');
Route::patch('/task/{id}','TaskController@update');
Route::get('/tasks/show/{id}', 'TaskController@show');
Route::delete('/task/{task}', 'TaskController@destroy');

Route::get('/request_test','InputTestController@checkInput');

Route::get('/profile',function(){
    return view('info');
});
Route::get('user/{id}', function($id)
{
    return 'User '.$id;
});
Route::get('posts/{post}/comments/{comment}',function($postId, $commentId){
    return 'Your post Id '.$postId. ' comment Id'.$commentId;
});
Route::get('user/{name?}',function($name='John'){
return $name;
});
Route::prefix('admin')->group(function () {
    Route::get('users', function () {
        // Matches The "/admin/users" URL
        return 'User->Admin';
    });
});

Route::resource('questions','QuestionController');



Route::resource('taskcategories','TaskCategoryController');
