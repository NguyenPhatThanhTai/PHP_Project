<?php

namespace App\DataAccess;

use Illuminate\Support\Facades\DB;

class DataAccess{
    public function GetProductByNumber($number){
        $ListProduct = DB::select('select * from product_detail LIMIT ' . $number);
        return $ListProduct;
    }
}