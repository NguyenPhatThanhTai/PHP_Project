<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\Service;

class ClientController extends Controller
{
    public function HomePageController(Request $request){
        $_serviceController = new Service();
        $ListProduct = $_serviceController->GetRecommentProduct(4);

        return view('Pages.Clients.HomePage') -> with('ListProduct', $ListProduct);
    }
}
