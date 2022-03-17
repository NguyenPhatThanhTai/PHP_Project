<?php

namespace App\DataAccess;

use Exception;
use Illuminate\Support\Facades\DB;

class DataAccess{
    public function GetProductByNumber($number){
        $ListProduct = DB::select('select * from product_detail LIMIT ' . $number);
        return $ListProduct;
    }

    public function GetDetailProducts($prodId){
        $Product = DB::selectOne("select 
        product_detail.id as 'ProductDetailId', 
        product_detail.name as 'ProductName', 
        product_detail.description as 'ProductDescipsion',
        product_detail.price as 'ProductPrice',
        product_detail.img_detail1 as 'img_detail1',
        product_detail.img_detail2 as 'img_detail2',
        product_detail.img_detail3 as 'img_detail3',
        product_detail.img_detail4 as 'img_detail4',
        product.id as 'ProductId',
        manufacturers.name as 'ManufacturersName'
            from product 
                INNER JOIN manufacturers 
                ON product.manufacturers_id = manufacturers.id
                INNER JOIN product_detail
                ON product.id = product_detail.product_id
                where product.id = " . $prodId);

        return $Product; 
    }

    public function GetCommentOfProduct($prodId){
        $Comment = DB::select("
        SELECT customer.name, comment_product.star, comment_product.content FROM comment_product 
        INNER JOIN customer on comment_product.customer_id = customer.id  
        WHERE comment_product.product_id =" . $prodId);

        return $Comment;
    }

    public function SendComment($id, $content, $time, $star, $productId, $customerId){
        // try{
            $Send = DB::insert("
            INSERT INTO `comment_product`(`id`, `content`, `time`, `star`, `product_id`, `customer_id`)
            VALUES (".$id.",'".$content."',".$time.",".$star.",".$productId.",".$customerId.")");   
    
            return true;
        // }catch(Exception $e){
        //     return false;
        // }
    }
    
}