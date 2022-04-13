<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;


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

// login admin
Route::get('/FormLoginAdmin', [AdminController::class, 'LoginAdminController']);
Route::post('/FormLoginAdmin', [AdminController::class, 'postLoginAdmin']);

// product management
Route::get('/ProductManagement', [AdminController::class, 'ProductManagement']);
Route::post('/ProductManagement', [AdminController::class, 'postProductManagement']);

// edit product
Route::get('/GetProductJson', [AdminController::class, 'GetProductJson']);
Route::post('/PostProductEdit', [AdminController::class, 'PostProductEdit']);

// delete product
Route::post('/PostProductDelete', [AdminController::class, 'PostProductDelete']);

// category management
Route::get('/CategoryManagement', [AdminController::class, 'CategoryManagement']);
Route::post('/CategoryManagement', [AdminController::class, 'postCategoryManagement']);

// edit category
Route::get('/EditCategory', [AdminController::class, 'EditCategory']);
Route::post('/EditCategory', [AdminController::class, 'postEditCategory']);

// delete category
Route::post('/DeleteCategory', [AdminController::class, 'DeleteCategory']);

// manufactor management
Route::get('/ManufactorManagement', [AdminController::class, 'ManufactorManagement']);
Route::post('/ManufactorManagement', [AdminController::class, 'postManufactorManagement']);

// edit manufactor
Route::get('/EditManufactor', [AdminController::class, 'EditManufactor']);
Route::post('/EditManufactor', [AdminController::class, 'postEditManufactor']);

// delete manufactor
Route::post('/DeleteManufactor', [AdminController::class, 'DeleteManufactor']);

// order management
Route::get('/OrderManagement', [AdminController::class, 'OrderManagement']);
Route::post('/OrderManagement', [AdminController::class, 'postOrderManagement']);

Route::get('/GetOrderJson', [AdminController::class, 'GetOrderJson']);

// set status order
Route::post('/SetStatusOrder', [AdminController::class, 'SetStatusOrder']);

// user management
Route::get('/UserManagement', [AdminController::class, 'UserManagement']);
Route::post('/UserManagement', [AdminController::class, 'postUserManagement']);


// Route::get('/page', function(){
//     $data = (object) ["Num" => "Mot", "Num" => "Hai"];
//     return view('page1', WellcomeController::class);
// });
