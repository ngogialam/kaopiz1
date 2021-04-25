<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\View\Compilers\Concerns;
use Illuminate\Support\Facades\App\Http;
use Illuminate\Support\Facades\Auth;
use App\Support\Controllers\Home;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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


Route::get('/', 'Home@show')->name('auth.show');

//Route::get('/login','Home@showLogin')->name('auth.showlogin');
Route::get('/', 'Home@sendemailDemo');
Route::post('/', 'Home@store')->name('auth.post');
Route::get('db', ['as' => 'MyRoute', function () {
    $data = DB::table('test')->get();
    //  var_dump(($data));
    foreach ($data as $row) {
        foreach ($row as $key => $value) {
            echo $key . ":" . $value . "<br>";
        }
        echo "<hr>";
    }
    return view('auth.menu');
}]);

Route::get('/search', 'Home@search');

Route::get('/ma', function () {
    return view('ma');
});
Route::post('/user/update/{id}', 'Home@stote');

//Get session
Route::get('/get-session-1', function (Request $request) {
    $value = $request->session()->get('session_id', 'default');
    echo "Session ID is" . $value;
});

Route::get('/get-session-2', function (Request $request) {
    if ($request->session()->has('session')) {
        echo "Session ID is:" . $request->session()->get('session_id;');
    } else {
        echo "Session ID is invalid";
    }
});

//store Session 
Route::get('/store-session', function (Request $request) {
    $request->session()->put('session_id', 'hjskfcwegiwbcns');
});
//clear session
Route::get('/pull-session', function (Request $request) {
    $value = $request->session()->pull('session_id');
    echo "Session ID is:" . $value;
});
Route::get('/pull-session', function (Request $request) {
    $request->session()->forget('session_id');
    $request->session()->forget(['session_id']);
    $request->session()->flush();
});

//flash
Route::get('/store-flash', function (Request $request) {
    $request->session()->flash('status', 'Task was successful!');
});
Route::get('/get-flash', function (Request $request) {
    $value = $request->session()->get('status');
    echo "Flash is:" . $value;
});

Route::get('/blade', function () {
    return view('child');
});
