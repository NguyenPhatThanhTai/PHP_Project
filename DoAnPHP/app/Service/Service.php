<?php

namespace App\Service;

use App\DataAccess\DataAccess;

class Service{
    public function GetRecommentProduct($Number){
        $_dataAccess = new DataAccess();
        return $_dataAccess->GetProductByNumber($Number);
    }
}