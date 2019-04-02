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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('home', 'PagesController@home');

Route::get('about', 'PagesController@about');

Route::get('contact', 'PagesController@contact');

Route::get('createTicket', 'TicketController@create');

Route::post('/createTicket','TicketController@store');

Route::get('/tickets','TicketController@index');

Route::get('/tickets/{slug?}', 'TicketController@show');

Route::get('tickets/{slug?}/edit', 'TicketController@edit');

Route::post('tickets/{slug?}/edit', 'TicketController@update');

Route::post('tickets/{slug?}/delete','TicketController@destroy');

Route::get('/createTicket/cancelCreate', 'TicketController@cancelCreate');

Route::get('/tickets/{slug}', 'TicketController@cancelEdit');

Route::post('/comment', 'CommentController@newComment');

Route::get('users/register', 'Auth\RegisterController@getRegister');

Route::post('users/register', 'Auth\RegisterController@postRegister');

Route::get('profile', 'HomeController@index')->name('profile');


//Learnnnn
Route::get('tuoi/{tuoi}', function ($tuoi) {
    echo "<h1>Tuoi cua ban la :  $tuoi</h1>";
})->where(['tuoi'=>'[a-zA-Z 0-9]+']);

//Dinh danh cho route

Route::get('route', ['as' => 'myroute', function(){
    echo "Hello anh em!";
}]);

Route::get('route2', function (){
    echo "Hi anh em!";
})->name('myroute2');

Route::get('anhem',function (){
   return redirect()->route('myroute2');
});

//route group
Route::group(['prefix' => 'MyGroup'] , function (){

    Route::get('User1', function (){
       echo "Hello User1";
    });

    Route::get('User2', function (){
        echo "Hello User1";
    });

    Route::get('User2', function (){
        echo "Hello User1";
    });

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
