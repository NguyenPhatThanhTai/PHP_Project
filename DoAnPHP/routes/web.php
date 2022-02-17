<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;

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

Route::get('/page/test', [WelcomeController::class, 'testControllerGet']);

Route::post('/page/test', [WelcomeController::class, 'testControllerPost']);

// Route::get('/page', function(){
//     $data = (object) ["Num" => "Mot", "Num" => "Hai"];
//     return view('page1', WellcomeController::class);
// });
