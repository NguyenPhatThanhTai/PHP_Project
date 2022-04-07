<?php

namespace App\DataAccess;

use Exception;
use Illuminate\Support\Facades\DB;

class DataAccess{
    public function GetProductByNumber($offset, $amount,array $cateId){
        $Query = "select 
        product_detail.id as 'id', 
        product_detail.name as 'name', 
        product_detail.description as 'description',
        product_detail.price as 'price',
        product_detail.img_cover as 'img_cover',
        product_detail.img_hover as 'img_hover',
        product_detail.img_detail1 as 'img_detail1',
        product_detail.img_detail2 as 'img_detail2',
        product_detail.img_detail3 as 'img_detail3',
        product_detail.img_detail4 as 'img_detail4',
        product.id as 'product_id',
        category.id as 'categoryId'
            from product
            INNER JOIN category 
                ON product.category_id = category.id
            INNER JOIN product_detail
                ON product.id = product_detail.product_id";

        if($cateId != null && count($cateId) == 1){
            $Query .= ' WHERE product.category_id = ' . str_replace("\\s+", "", $cateId[0]);
        }
        else if($cateId != null && count($cateId) > 1){
            $Query .= ' WHERE product.category_id = ' . str_replace("\\s+", "", $cateId[0]);
            foreach($cateId as $item){
                if($item != ''){
                    $Query .= ' OR product.category_id = ' . $item . '';
                }
            }
        }

        $ListProduct = DB::select($Query . ' limit ' . $offset - 1 . ', ' . $amount . '');

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
        try{
            $Send = DB::insert("
            INSERT INTO `comment_product`(`id`, `content`, `time`, `star`, `product_id`, `customer_id`)
            VALUES (".$id.",'".$content."',".$time.",".$star.",".$productId.",".$customerId.")");   
    
            return true;
        }catch(Exception $e){
            return false;
        }
    }

    public function GetAllCategory(){
        $Category = DB::select("select * from category");

        return $Category;
    }

    // cart
    public function AddToCart($productId, $quantity){
        try{
            $id = date("dhis");
            $time = date("Y-m-d");

            $Send = DB::insert("
            INSERT INTO `cart`(`id`, `product_id`, `quantity`, `time`)
            VALUES (".$id.",".$productId.",".$quantity.",'".$time."')");   
    
            return true;
        }catch(Exception $e){
            return false;
        }
    }
    
    // admin login
    public function GetAdmin($username, $password){
        try{
            $Send = DB::selectOne("
            SELECT * FROM `admin` WHERE `username` = '".$username."' AND `password` = '".$password."'");   
    
            return $Send;
        }catch(Exception $e){
            return false;
        }
    }

    // login
    public function GetCustomer($email, $token){
        try{
            $Send = DB::selectOne("
            SELECT * FROM `customer` WHERE `email` = '".$email."' AND `token` = '".$token."'"); 
            
            return $Send;
        }catch(Exception $e){
            return false;
        }
    }

    // register
    public function PostCustomer($id, $email, $token, $phone, $name){
        try{
            $checkMail = DB::selectOne("SELECT * FROM `customer` WHERE `email` = '".$email."'");
            if($checkMail != null){
                return false;
            }else{
                $Send = DB::insert("
                INSERT INTO `customer`(`id`, `name`, `email`, `token`, `phone`)
                VALUES ('".$id."','".$name."','".$email."','".$token."','".$phone."')"); 
        
                return $Send;
            }
        }catch(Exception $e){
            return false;
        }
    }

    // order
    public function postOrderDb($id, $time, $name_receive, $phone_receive, $address_receive, $note, $status, $total_price, $customerId, $ListQuantity, $ListProductId){

            $Send = DB::insert("INSERT INTO `orders`(`id`, `time`, `name_receive`, `phone_receive`, `address_receive`, `note`, `status`, `total_price`, `customer_id`) 
            VALUES ('".$id."','".$time."','".$name_receive."','".$phone_receive."','".$address_receive."','".$note."','".$status."','".$total_price."','".$customerId."')");
            
            for($i = 0; $i < count($ListProductId); $i++){
                DB::insert("INSERT INTO `detail_orders`(`orders_id`, `product_id`, `quantity`, `size`) 
                VALUES ('".$id."','".$ListProductId[$i]."','".$ListQuantity[$i]."',null)");
            }

            return $Send;

    }
}