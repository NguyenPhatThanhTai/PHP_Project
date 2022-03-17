<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\Service;

class ClientController extends Controller
{
    public function HomePageController(Request $request){
        $_serviceController = new Service();
        $ListProduct = $_serviceController->GetRecommentProduct(8);

        return view('Pages.Clients.HomePage') -> with('ListProduct', $ListProduct);
    }

    public function DetailProductsController(Request $request){
        $_serviceController = new Service();
        $ProductDetail = $_serviceController->GetDetailProducts($request->get('prodId'));

        return view('Pages.Clients.DetailProduct') -> with('ProductDetail', $ProductDetail);
    }

    public function GetCommentOfProduct(Request $request){
        $_serviceController = new Service();
        $CommentProduct = $_serviceController->GetCommentOfProduct($request->get('prodId'));

        return response()->json($CommentProduct);
    }

    public function SendComment(Request $request){
        $CommentContent = $request->json()->all();
        $_serviceController = new Service();

        if($_serviceController -> SendComment($CommentContent['prodId'], $CommentContent['content'], $CommentContent['start'])){
            return response()->json("{
                'IsSuccess' : true,
                'Message': 'Success',
                'StatusCode': 200
            }");
        }
        else{
            return response()->json("{
                'IsSuccess' : false,
                'Message': 'Error',
                'StatusCode': 400
            }");
        }
    }
}
