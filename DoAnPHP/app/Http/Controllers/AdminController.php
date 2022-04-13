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
                return redirect('/ProductManagement');

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

    // category management
    public function CategoryManagement(Request $request)
    {
        // check session admin
        if ($_SESSION['Admin'] == null) {

            return redirect('/FormLoginAdmin');
        }else{
            $_serviceController = new Service();
            $AllCategory = $_serviceController->GetAllCategory();

            return view('Pages.Admin.CategoryManagement')
                ->with('AllCategory', $AllCategory);
        }
    }

    // add category
    public function postCategoryManagement(Request $request)
    {
        // check session admin
        if ($_SESSION['Admin'] == null) {

            return redirect('/FormLoginAdmin');
        }else{
            $_serviceController = new Service();

            $CategoryName = $request->post('name');

            $AddCategory = $_serviceController->AddCategory($CategoryName);
            if($AddCategory)
                return redirect('/CategoryManagement');

            return view('Pages.Admin.AdminDashboard');
        }
    }

    // edit category
    public function EditCategory(Request $request)
    {
        // check session admin
        if ($_SESSION['Admin'] == null) {

            return redirect('/FormLoginAdmin');
        }else{
            $_serviceController = new Service();
            $CategoryId = $request->get('id');
            $Category = $_serviceController->GetCategory($CategoryId);

            return response()->json($Category);
        }
    }

    public function postEditCategory(Request $request)
    {
        // check session admin
        if ($_SESSION['Admin'] == null) {

            return redirect('/FormLoginAdmin');
        }else{
            $_serviceController = new Service();

            $CategoryId = $request->post('CategoryId');
            $CategoryName = $request->post('name');

            $EditCategory = $_serviceController->EditCategory($CategoryId, $CategoryName);
            if($EditCategory)
                return redirect('/CategoryManagement');

            return view('Pages.Admin.AdminDashboard');
        }
    }

    // delete category
    public function DeleteCategory(Request $request)
    {
        // check session admin
        if ($_SESSION['Admin'] == null) {

            return redirect('/FormLoginAdmin');
        }else{
            $_serviceController = new Service();

            $CategoryId = $request->post('id');

            $DeleteCategory = $_serviceController->DeleteCategory($CategoryId);
            if($DeleteCategory)
                return redirect('/CategoryManagement');

            return view('Pages.Admin.AdminDashboard');
        }
    }

    // manufactor management
    public function ManufactorManagement(Request $request)
    {
        // check session admin
        if ($_SESSION['Admin'] == null) {

            return redirect('/FormLoginAdmin');
        }else{
            $_serviceController = new Service();
            $AllManufactor = $_serviceController->GetAllManufactor();

            return view('Pages.Admin.ManufactorManagement')
                ->with('AllManufactor', $AllManufactor);
        }
    }

    // add manufactor
    public function postManufactorManagement(Request $request)
    {
        // check session admin
        if ($_SESSION['Admin'] == null) {

            return redirect('/FormLoginAdmin');
        }else{
            $_serviceController = new Service();

            $ManufactorName = $request->post('name');

            $AddManufactor = $_serviceController->AddManufactor($ManufactorName);
            if($AddManufactor)
                return redirect('/ManufactorManagement');

            return view('Pages.Admin.AdminDashboard');
        }
    }

    // edit manufactor
    public function EditManufactor(Request $request)
    {
        // check session admin
        if ($_SESSION['Admin'] == null) {

            return redirect('/FormLoginAdmin');
        }else{
            $_serviceController = new Service();
            $ManufactorId = $request->get('id');
            $Manufactor = $_serviceController->GetManufactor($ManufactorId);

            return response()->json($Manufactor);
        }
    }

    public function postEditManufactor(Request $request)
    {
        // check session admin
        if ($_SESSION['Admin'] == null) {

            return redirect('/FormLoginAdmin');
        }else{
            $_serviceController = new Service();

            $ManufactorId = $request->post('ManufactorId');
            $ManufactorName = $request->post('name');

            $EditManufactor = $_serviceController->EditManufactor($ManufactorId, $ManufactorName);
            if($EditManufactor)
                return redirect('/ManufactorManagement');

            return view('Pages.Admin.AdminDashboard');
        }
    }

    // delete manufactor
    public function DeleteManufactor(Request $request)
    {
        // check session admin
        if ($_SESSION['Admin'] == null) {

            return redirect('/FormLoginAdmin');
        }else{
            $_serviceController = new Service();

            $ManufactorId = $request->post('id');

            $DeleteManufactor = $_serviceController->DeleteManufactor($ManufactorId);
            if($DeleteManufactor)
                return redirect('/ManufactorManagement');

            return view('Pages.Admin.AdminDashboard');
        }
    }

    // order management
    public function OrderManagement(Request $request)
    {
        // check session admin
        if ($_SESSION['Admin'] == null) {

            return redirect('/FormLoginAdmin');
        }else{
            $_serviceController = new Service();
            $AllOrder = $_serviceController->GetAllOrder();

            return view('Pages.Admin.OrderManagement')
                ->with('AllOrder', $AllOrder);
        }
    }

    // get order json
    public function GetOrderJson(Request $request)
    {
        // check session admin
        if ($_SESSION['Admin'] == null) {

            return redirect('/FormLoginAdmin');
        }else{
            $_serviceController = new Service();
            $OrderId = $request->get('id');
            $Order = $_serviceController->GetOrderJson($OrderId);
            $ListProduct = $_serviceController->GetListProduct($OrderId);
            $ListProductModal = (object)["ListProduct" => $ListProduct, "Order" => $Order];

            return response()->json($ListProductModal);
        }
    }

    // set status order
    public function SetStatusOrder(Request $request)
    {
        // check session admin
        if ($_SESSION['Admin'] == null) {

            return redirect('/FormLoginAdmin');
        }else{
            $_serviceController = new Service();

            $OrderId = $request->post('id');

            $_serviceController->SetStatusOrder($OrderId);
            return redirect('/OrderManagement');
        }
    }

    // user management
    public function UserManagement(Request $request)
    {
        // check session admin
        if ($_SESSION['Admin'] == null) {

            return redirect('/FormLoginAdmin');
        }else{
            $_serviceController = new Service();
            $AllUser = $_serviceController->GetAllUser();

            return view('Pages.Admin.UserManagement')
                ->with('AllUser', $AllUser);
        }
    }

    // disable user
    public function postUserManagement(Request $request)
    {
        // check session admin
        if ($_SESSION['Admin'] == null) {

            return redirect('/FormLoginAdmin');
        }else{
            $_serviceController = new Service();

            $UserId = $request->post('id');

            $_serviceController->DisableUser($UserId);
            return redirect('/UserManagement');
        }
    }
}
