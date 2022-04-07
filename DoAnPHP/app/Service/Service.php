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

    public function GetAllProduct($offset,array $cateId){
        $_dataAccess = new DataAccess();

        return $_dataAccess->GetProductByNumber($offset, 10 , $cateId);
    }


    // admin login
    public function GetAdmin($username, $password){
        $_dataAccess = new DataAccess();
        return $_dataAccess->GetAdmin($username, $password);
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
}