<?php

namespace App\Service;

use App\DataAccess\DataAccess;

class Service{
    public function GetRecommentProduct($amount){
        $_dataAccess = new DataAccess();
        return $_dataAccess->GetProductByNumber(1, $amount, []);
    }

    public function GetDetailProducts($prodId){
        $_dataAccess = new DataAccess();
        return $_dataAccess->GetDetailProducts((int)$prodId);
    }

    public function GetCommentOfProduct($prodId){
        $_dataAccess = new DataAccess();
        return $_dataAccess->GetCommentOfProduct((int)$prodId);
    }

    public function SendComment($productId, $content, $star){
        $_dataAccess = new DataAccess();
        $id = date("dhis");
        $time = date("Y-m-d");

        return $_dataAccess->SendComment((int)$id, $content, $time, (int)$star, (int)$productId, 1);
    }

    public function GetAllCategory(){
        $_dataAccess = new DataAccess();

        return $_dataAccess->GetAllCategory();
    }
    
    public function GetAllManufactor(){
        $_dataAccess = new DataAccess();

        return $_dataAccess->GetAllManufactor();
    }

    public function GetAllProduct($offset,array $cateId){
        $_dataAccess = new DataAccess();

        return $_dataAccess->GetProductByNumber($offset, 10 , $cateId);
    }

    // admin login
    public function GetAdmin($email, $password){
        $_dataAccess = new DataAccess();
        return $_dataAccess->GetAdmin($email, $password);
    }

    // login
    public function GetUser($username, $token){
        $_dataAccess = new DataAccess();
        return $_dataAccess->GetCustomer($username, $token);
    }

    public function PostUser($email, $token, $phone, $name){
        $_dataAccess = new DataAccess();
        $id = date("dhis");
        $time = date("Y-m-d");

        return $_dataAccess->PostCustomer((int)$id, $email, $token, $phone, $name, $time);
    }

    // order
    public function PostOrder($name_receive, $phone_receive, $address_receive, $note, $status, $total_price, $customerId, $ListQuantity, $ListProductId){
        $_dataAccess = new DataAccess();
        $id = date("dhis");
        $time = date("Y-m-d");

        return $_dataAccess->postOrderDb((int)$id, $time, $name_receive, $phone_receive, $address_receive, $note, $status, $total_price, $customerId, $ListQuantity, $ListProductId);
    }

    // add product
    public function AddProduct($name, $description, $price, $img_cover, $img_hover, $img_detail1, $img_detail2, $img_detail3, $img_detail4, $manufactor, $category){
        $_dataAccess = new DataAccess();
        $id = date("dhis");
        $idDetail = date("dhis");

        return $_dataAccess->AddProductAdmin((int)$id, (int)$idDetail, $name, $description, $price, $img_cover, $img_hover, $img_detail1, $img_detail2, $img_detail3, $img_detail4, $manufactor, $category, );
    }

    // update product
    public function GetProduct($id){
        $_dataAccess = new DataAccess();
        return $_dataAccess->GetProduct($id);
    }

    public function EditProduct($id, $idDetail, $name, $description, $price, $img_cover, $img_hover, $img_detail1, $img_detail2, $img_detail3, $img_detail4, $manufactor, $category){
        $_dataAccess = new DataAccess();
        return $_dataAccess->EditProductAdmin((int)$id, (int)$idDetail, $name, $description, $price, $img_cover, $img_hover, $img_detail1, $img_detail2, $img_detail3, $img_detail4, $manufactor, $category);
    }

    // delete product
    public function DeleteProduct($id){
        $_dataAccess = new DataAccess();
        return $_dataAccess->DeleteProduct($id);
    }
}