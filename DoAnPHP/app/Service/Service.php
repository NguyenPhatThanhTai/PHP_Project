<?php

namespace App\Service;

use App\DataAccess\DataAccess;

class Service{
    public function GetRecommentProduct($Number){
        $_dataAccess = new DataAccess();
        return $_dataAccess->GetProductByNumber($Number);
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
}