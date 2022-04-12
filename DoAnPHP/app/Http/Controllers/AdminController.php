<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\Service;
use phpDocumentor\Reflection\Types\Boolean;
use PhpParser\Node\Expr\Cast\Double;
use \stdClass;

session_start();

class AdminController extends Controller
{
    // login admin
    public function LoginAdminController(Request $request)
    {
        return view('Pages.Admin.SigninAdmin');
    }

    // admin login
    public function postLoginAdmin(Request $request)
    {
        $email = $request->post('email');
        $password = $request->post('password');

        $_serviceController = new Service();
        $Admin = $_serviceController->GetAdmin($email, $password);

        if ($Admin != null) {
            $_SESSION['Admin'] = $Admin;

            return view('Pages.Admin.AdminDashboard');
        } else {
            return view('Pages.Admin.SigninAdmin');
        }
    }

    // product management
    public function ProductManagement(Request $request)
    {
        // check session admin
        if ($_SESSION['Admin'] == null) {

            return redirect('/FormLoginAdmin');
        }else{
            $_serviceController = new Service();
            $AllProduct = $_serviceController->GetAllProduct(1, []);
            $AllCategory = $_serviceController->GetAllCategory();
            $AllManufactor = $_serviceController->GetAllManufactor();

            return view('Pages.Admin.ProductManagement')
                ->with('AllProduct', $AllProduct)
                ->with('AllCategory', $AllCategory)
                ->with('AllManufactor', $AllManufactor);
        }
    }

    // add product
    public function postProductManagement(Request $request)
    {
        // check session admin
        if ($_SESSION['Admin'] == null) {

            return redirect('/FormLoginAdmin');
        }else{
            $_serviceController = new Service();

            $ProductName = $request->post('name');
            $ProductDescription = $request->post('description');
            $ProductPrice = $request->post('price');
            $ProductImgCover = $request->post('img_cover');
            $ProductImgHover = $request->post('img_hover');
            $ProductImgDetail1 = $request->post('img_detail1');
            $ProductImgDetail2 = $request->post('img_detail2');
            $ProductImgDetail3 = $request->post('img_detail3');
            $ProductImgDetail4 = $request->post('img_detail4');
            $ProductManufactor = $request->post('manufactor');
            $ProductCategory = $request->post('category');

            $AddProduct = $_serviceController->AddProduct($ProductName, $ProductDescription, $ProductPrice, $ProductImgCover, $ProductImgHover, $ProductImgDetail1, $ProductImgDetail2, $ProductImgDetail3, $ProductImgDetail4, $ProductManufactor, $ProductCategory);
            if($AddProduct)
                return view('Pages.Admin.ProductManagement');

            return view('Pages.Admin.AdminDashboard');
        }
    }

    // edit product
    
    public function GetProductJson(Request $request)
    {
        // check session admin
        if ($_SESSION['Admin'] == null) {

            return redirect('/FormLoginAdmin');
        }else{
            $_serviceController = new Service();
            $ProductId = $request->get('id');
            $Product = $_serviceController->GetProduct($ProductId);

            return response()->json($Product);
        }
    }

    public function PostProductEdit(Request $request)
    {
        // check session admin
        if ($_SESSION['Admin'] == null) {

            return redirect('/FormLoginAdmin');
        }else{
            $_serviceController = new Service();

            $ProductId = $request->post('ProductId');
            $ProductDetailId = $request->post('ProductDetailId');
            $ProductName = $request->post('name');
            $ProductDescription = $request->post('description');
            $ProductPrice = $request->post('price');
            $ProductImgCover = $request->post('img_cover');
            $ProductImgHover = $request->post('img_hover');
            $ProductImgDetail1 = $request->post('img_detail1');
            $ProductImgDetail2 = $request->post('img_detail2');
            $ProductImgDetail3 = $request->post('img_detail3');
            $ProductImgDetail4 = $request->post('img_detail4');
            $ProductManufactor = $request->post('manufactor');
            $ProductCategory = $request->post('category');
            

            $EditProduct = $_serviceController->EditProduct($ProductId, $ProductDetailId, $ProductName, $ProductDescription, $ProductPrice, $ProductImgCover, $ProductImgHover, $ProductImgDetail1, $ProductImgDetail2, $ProductImgDetail3, $ProductImgDetail4, $ProductManufactor, $ProductCategory);
            if($EditProduct)
                return redirect('/ProductManagement');

            return view('Pages.Admin.AdminDashboard');
        }
    }

    // delete product
    public function PostProductDelete(Request $request)
    {
        // check session admin
        if ($_SESSION['Admin'] == null) {

            return redirect('/FormLoginAdmin');
        }else{
            $_serviceController = new Service();

            $ProductId = $request->post('id');

            $DeleteProduct = $_serviceController->DeleteProduct($ProductId);
            if($DeleteProduct)
                return redirect('/ProductManagement');

            return view('Pages.Admin.AdminDashboard');
        }
    }
}
