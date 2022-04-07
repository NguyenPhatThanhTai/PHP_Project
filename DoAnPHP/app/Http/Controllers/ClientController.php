<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\Service;
use phpDocumentor\Reflection\Types\Boolean;
use PhpParser\Node\Expr\Cast\Double;
use \stdClass;

session_start();

class ClientController extends Controller
{
    public function HomePageController(Request $request)
    {
        $_serviceController = new Service();
        $ListProduct = $_serviceController->GetRecommentProduct(8);

        return view('Pages.Clients.HomePage')->with('ListProduct', $ListProduct);
    }

    public function DetailProductsController(Request $request)
    {
        $_serviceController = new Service();
        $ProductDetail = $_serviceController->GetDetailProducts($request->get('prodId'));

        return view('Pages.Clients.DetailProduct')->with('ProductDetail', $ProductDetail);
    }

    public function AllProduct(Request $request)
    {
        $_serviceController = new Service();

        $offset = $request->get('offset');
        $cateid = $request->get('cateid');

        $Total = 10;
        $Current_Page = $offset;

        if ($offset == 1) {
        } else {
            $offset = ($offset - 1) * $Total + 1;
        }

        $splitIdCateFilter = [];
        if ($cateid != null) {
            $splitIdCateFilter = explode("-", $cateid);
        }

        $AllProduct = $_serviceController->GetAllProduct($offset, $splitIdCateFilter);
        $AllCategory = $_serviceController->GetAllCategory();

        $CountProduct = sizeof($AllProduct);
        (float) $CountProductsCalculator = $CountProduct / $Total;
        $CountProducts = $CountProductsCalculator + 2;

        return view('Pages.Clients.AllProduct')
            ->with('AllCategory', $AllCategory)
            ->with('AllProduct', $AllProduct)
            ->with('CurrentPage', $Current_Page)
            ->with('CurrentCateId', $cateid)
            ->with('CountProduct', $CountProducts);
    }

    //api
    public function SendComment(Request $request)
    {
        $CommentContent = $request->json()->all();
        $_serviceController = new Service();

        if ($_serviceController->SendComment($CommentContent['prodId'], $CommentContent['content'], $CommentContent['start'])) {
            return response()->json('{
                "IsSuccess": "true",
                "Message": "Success",
                "StatusCode": 200
            }');
        } else {
            return response()->json('{
                "IsSuccess" : "false",
                "Message": "Failed",
                "StatusCode": 200
            }');
        }
    }

    public function GetCommentOfProduct(Request $request)
    {
        $_serviceController = new Service();
        $CommentProduct = $_serviceController->GetCommentOfProduct($request->get('prodId'));

        return response()->json($CommentProduct);
    }

    public function Cart(Request $request)
    {
        $arrayList = [];
        $price = 0;
        if (isset($_SESSION['cart'])) {
            $arrayList = $_SESSION['cart'];
            foreach($_SESSION['cart'] as $item){
                $price += $item -> price * $item -> number;
            }
        }
        return view('Pages.Clients.Cart')->with('cart', $arrayList)->with('totalPrice', $price);
    }

    // cart
    public function AddToCart(Request $request)
    {
        $isDefined = false;
        if (isset($_SESSION['cart']) && sizeof($_SESSION['cart']) > 0) {
            for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
                if ($_SESSION['cart'][$i]->productId == $request->post('productId')) {
                    $isDefined = true;
                    if($request->post('action') == 0){
                        $_SESSION['cart'][$i]->number += $request->post('number');
                        
                    }
                    else {
                        $_SESSION['cart'][$i]->number -= $request->post('number');
                        if($_SESSION['cart'][$i]->number == 0){
                            unset($_SESSION['cart'][$i]);
                        }
                    }
                }
            }

            if ($isDefined == false) {
                $cart = new stdClass;
                $cart->productId = $request->post('productId');
                $cart->number = $request->post('number');
                $cart->price = $request->post('price');
                $cart->image = $request->post('image');
                $cart->name = $request->post('name');
                array_push($_SESSION['cart'], $cart);
            }
        } else {
            $_SESSION['cart'] = [];
            $cart = new stdClass;
            $cart->productId = $request->post('productId');
            $cart->number = $request->post('number');
            $cart->price = $request->post('price');
            $cart->image = $request->post('image');
            $cart->name = $request->post('name');
            array_push($_SESSION['cart'], $cart);
        }

        return response()->json('{
            "IsSuccess": "true",
            "Message": ' . sizeof($_SESSION['cart']) . ',
            "StatusCode": 200
        }');
    }

    // admin login
    public function AdminLogin(Request $request)
    {
        $UserName = $request->get('UserName');
        $Password = $request->get('Password');

        $_serviceController = new Service();
        $Admin = $_serviceController->GetAdmin($UserName, $Password);

        if ($Admin != null) {
            session()->put('Admin', $Admin);
            return response()->json('{
                "IsSuccess": "true",
                "Message": "Success",
                "StatusCode": 200
            }');
        } else {
            return response()->json('{
                "IsSuccess": "false",
                "Message": "Failed",
                "StatusCode": 200
            }');
        }
    }

    // login

    public function LoginController(Request $request)
    {
        return view('Pages.Clients.Signing');
    }

    public function postLogin(Request $request)
    {
        $username = $request->input('email');
        $token = $request->input('token');

        $_serviceController = new Service();
        $Customer = $_serviceController->GetUser($username, $token);

        if ($Customer != null) {
            $_SESSION['Customer'] = $Customer;

            return redirect('/');
        }
        return view('Pages.Clients.Signing');
    }

    // sign up

    public function SignUpController(Request $request)
    {
        return view('Pages.Clients.Register');
    }

    public function postSignUp(Request $request)
    {
        $username = $request->input('email');
        $token = $request->input('token');
        $phone = $request->input('phone');
        $name = $request->input('name');

        $_serviceController = new Service();
        $Customer = $_serviceController->PostUser($username, $token, $phone, $name);

        if ($Customer) {
            $_SESSION['Customer'] = $Customer;

            return redirect('/');
        } else {
            return view('Pages.Clients.Register');
        }
    }

    //check-out
    public function checkOutPage(){
        if(isset($_SESSION['Customer'])){
            $arrayList = [];
            $price = 0;
            if (isset($_SESSION['cart'])) {
                $arrayList = $_SESSION['cart'];
                foreach($_SESSION['cart'] as $item){
                    $price += $item -> price * $item -> number;
                }
            }
    
            return view('Pages.Clients.order')->with('cart', $arrayList)->with('totalPrice', $price);
        }else {
            return view('Pages.Clients.Signing');
        }
    }

    public function checkOutPost(Request $request){
        $_serviceController = new Service();
        $time = date('d-m-Y');
        $address = $request->input('address');
        $phone = $request->input('phone');
        $name = $request->input('name');
        $note = $request->input('note');
        $status = 0;
        $totalPrice = $request->input('totalPrice');

        $customerId = $_SESSION['Customer']->id;
        $ListQuantity[] = $request->input('ListQuantity');
        $ListProductId[] = $request->input('ListProductId');

        if($_serviceController->PostOrder($name, $phone, $address, $note, $status, $totalPrice, $customerId, $ListQuantity, $ListProductId, $time)){
            return redirect('/ThankYou');
        }
        return redirect('/Order');
    }

    // thank you
    public function thankYouPage(){
        return view('Pages.Clients.Thankyou');
    }
}
