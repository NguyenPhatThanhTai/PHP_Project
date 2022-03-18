<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\Service;
use PhpParser\Node\Expr\Cast\Double;

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
    
    public function AllProduct(Request $request){
        $_serviceController = new Service();

        $offset = $request->get('offset');
        $cateid = $request->get('cateid');

        $Total = 10;
        $Current_Page = $offset;

        if($offset == 1){}
        else{
            $offset = ($offset-1) * $Total + 1;
        }

        $splitIdCateFilter = [];
        if($cateid != null){
            $splitIdCateFilter = explode("-", $cateid);
        }

        $AllProduct = $_serviceController->GetAllProduct($offset, $splitIdCateFilter);
        $AllCategory = $_serviceController->GetAllCategory();

        $CountProduct = sizeof($AllProduct);
        (Double) $CountProductsCalculator = $CountProduct / $Total;
        $CountProducts = $CountProductsCalculator + 2;

        return view('Pages.Clients.AllProduct') 
        -> with('AllCategory', $AllCategory) 
        -> with('AllProduct', $AllProduct)
        -> with('CurrentPage', $Current_Page)
        -> with('CurrentCateId', $cateid)
        -> with('CountProduct', $CountProducts);
    }

    //api
    public function SendComment(Request $request){
        $CommentContent = $request->json()->all();
        $_serviceController = new Service();

        if($_serviceController -> SendComment($CommentContent['prodId'], $CommentContent['content'], $CommentContent['start'])){
            return response()->json('{
                "IsSuccess": "true",
                "Message": "Success",
                "StatusCode": 200
            }');
        }
        else{
            return response()->json('{
                "IsSuccess" : "false",
                "Message": "Failed",
                "StatusCode": 200
            }');
        }
    }

    public function GetCommentOfProduct(Request $request){
        $_serviceController = new Service();
        $CommentProduct = $_serviceController->GetCommentOfProduct($request->get('prodId'));

        return response()->json($CommentProduct);
    }
}
