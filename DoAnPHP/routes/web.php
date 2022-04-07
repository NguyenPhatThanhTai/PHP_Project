<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ClientController;


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

Route::get('/', [ClientController::class, 'HomePageController']);
Route::get('/Detail', [ClientController::class, 'DetailProductsController']);
Route::get('/GetComment', [ClientController::class, 'GetCommentOfProduct']);
Route::post('/SendComment', [ClientController::class, 'SendComment']);
Route::get('/AllProducts', [ClientController::class, 'AllProduct']);

// cart
Route::get('/Cart', [ClientController::class, 'Cart']);
Route::post('/AddToCart', [ClientController::class, 'AddToCart']);

//check-out
Route::get('/Order', [ClientController::class, 'checkOutPage']);
Route::post('/Order', [ClientController::class, 'checkOutPost']);

// thank you
Route::get('/ThankYou', [ClientController::class, 'thankYouPage']);

// login
Route::get('/FormLogin', [ClientController::class, 'LoginController']);
Route::post('/FormLogin', [ClientController::class, 'postLogin']);

// signup
Route::get('/FormSignUp', [ClientController::class, 'SignUpController']);
Route::post('/FormSignUp', [ClientController::class, 'postSignUp']);

Route::get('/page/test', [WelcomeController::class, 'testControllerGet']);

Route::post('/page/test', [WelcomeController::class, 'testControllerPost']);


// Route::get('/page', function(){
//     $data = (object) ["Num" => "Mot", "Num" => "Hai"];
//     return view('page1', WellcomeController::class);
// });
