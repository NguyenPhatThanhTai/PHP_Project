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
                ON product.id = product_detail.product_id where product_detail.status = 0";

        if($cateId != null && count($cateId) == 1){
            $Query .= ' AND product.category_id = ' . str_replace("\\s+", "", $cateId[0]);
        }
        else if($cateId != null && count($cateId) > 1){
            $Query .= ' AND product.category_id = ' . str_replace("\\s+", "", $cateId[0]);
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
        product_detail.img_cover as 'img_cover',
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
        $Category = DB::select("select * from category where category.status = 0");

        return $Category;
    }

    public function GetAllManufactor(){
        $Manufactor = DB::select("select * from manufacturers  where manufacturers.status = 0");

        return $Manufactor;
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
    public function GetAdmin($email, $password){
        try{
            $Send = DB::selectOne("
            SELECT * FROM `admin` WHERE `email` = '".$email."' AND `password` = '".$password."'");   
    
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

    // add product
    public function AddProductAdmin($id, $idDetail, $name, $description, $price, $img_cover, $img_hover, $img_detail1, $img_detail2, $img_detail3, $img_detail4, $categoryId, $manufacturersId){
        try{
            $product = DB::insert("INSERT INTO `product`(`id`, `manufacturers_id`, `category_id`) 
            VALUES ('".$id."','".$manufacturersId."','".$categoryId."')");

            $product_detail = DB::insert("INSERT INTO `product_detail`(`id`, `name`, `description`, `price`, `img_cover`, `img_hover`, `img_detail1`, `img_detail2`, `img_detail3`, `img_detail4`, `quantity_in_shop`, `status`, `product_id`) 
            VALUES ('".$idDetail."','".$name."','".$description."','".$price."','".$img_cover."','".$img_hover."','".$img_detail1."','".$img_detail2."','".$img_detail3."','".$img_detail4."','".null."','0','" .$id."')");
    
            return true;
        }catch(Exception $e){
            return false;
        }
    }

    // update product
    public function GetProduct($id){
        $Product = DB::selectOne("
        SELECT product.id as 'ProductId',
        product_detail.id as 'ProductDetailId',
        product_detail.name as 'ProductName',
        product_detail.description as 'ProductDescription',
        product_detail.price as 'ProductPrice',
        product_detail.img_cover as 'ProductImgCover',
        product_detail.img_hover as 'ProductImgHover',
        product_detail.img_detail1 as 'ProductImgDetail1',
        product_detail.img_detail2 as 'ProductImgDetail2',
        product_detail.img_detail3 as 'ProductImgDetail3',
        product_detail.img_detail4 as 'ProductImgDetail4',
        product_detail.quantity_in_shop as 'ProductQuantityInShop',
        product_detail.status as 'ProductStatus',
        product.category_id as 'ProductCategoryId',
        product.manufacturers_id as 'ProductManufacturersId'
            from product 
                INNER JOIN product_detail
                ON product.id = product_detail.product_id
                where product.id = " . $id );

        return $Product; 
    }

    public function EditProductAdmin($id, $idDetail, $name, $description, $price, $img_cover, $img_hover, $img_detail1, $img_detail2, $img_detail3, $img_detail4, $categoryId, $manufacturersId){
        try{
            $product = DB::update("UPDATE `product` SET `category_id` = '".$categoryId."', `manufacturers_id` = '".$manufacturersId."' WHERE `id` = '".$id."'");

            $product_detail = DB::update("UPDATE `product_detail` SET `name` = '".$name."', `description` = '".$description."', `price` = '".$price."', `img_cover` = '".$img_cover."', `img_hover` = '".$img_hover."', `img_detail1` = '".$img_detail1."', `img_detail2` = '".$img_detail2."', `img_detail3` = '".$img_detail3."', `img_detail4` = '".$img_detail4."' WHERE `id` = '".$idDetail."'");
    
            return true;
        }catch(Exception $e){
            return false;
        }
    }

    // delete product
    public function DeleteProduct($id){
        try{
            $product_detail = DB::update("UPDATE `product_detail` SET `status` = '-1' WHERE `id` = '".$id."'");
    
            return true;
        }catch(Exception $e){
            return false;
        }
    }

    // add category
    public function AddCategoryAdmin($id, $name){
        try{
            $category = DB::insert("INSERT INTO `category`(`id`, `name`, `status`) VALUES ('".$id."','".$name."','0')");
    
            return true;
        }catch(Exception $e){
            return false;
        }
    }

    // update category
    public function GetCategory($id){
        $Category = DB::selectOne("
        SELECT category.id as 'CategoryId',
        category.name as 'CategoryName',
        category.status as 'CategoryStatus'
            from category 
                where category.id = " . $id );

        return $Category; 
    }

    public function EditCategoryAdmin($id, $name){
        try{
            $category = DB::update("UPDATE `category` SET `name` = '".$name."' WHERE `id` = '".$id."'");
    
            return true;
        }catch(Exception $e){
            return false;
        }
    }

    // delete category
    public function DeleteCategory($id){
        try{
            $category = DB::update("UPDATE `category` SET `status` = '-1' WHERE `id` = '".$id."'");
    
            return true;
        }catch(Exception $e){
            return false;
        }
    }

    // add manufactor
    public function AddManufactorAdmin($id, $name){
        try{
            $manufactor = DB::insert("INSERT INTO `manufacturers`(`id`, `name`, `status`) VALUES ('".$id."','".$name."','0')");
    
            return true;
        }catch(Exception $e){
            return false;
        }
    }

    // update manufactor
    public function GetManufactor($id){
        $Manufactor = DB::selectOne("
        SELECT manufacturers.id as 'ManufactorId',
        manufacturers.name as 'ManufactorName',
        manufacturers.status as 'ManufactorStatus'
            from manufacturers 
                where manufacturers.id = " . $id );

        return $Manufactor; 
    }

    public function EditManufactorAdmin($id, $name){
        try{
            $manufactor = DB::update("UPDATE `manufacturers` SET `name` = '".$name."' WHERE `id` = '".$id."'");
    
            return true;
        }catch(Exception $e){
            return false;
        }
    }

    // delete manufactor
    public function DeleteManufactor($id){
        try{
            $manufactor = DB::update("UPDATE `manufacturers` SET `status` = '-1' WHERE `id` = '".$id."'");
    
            return true;
        }catch(Exception $e){
            return false;
        }
    }

    // order management
    public function GetAllOrder(){
        $Order = DB::select("SELECT * FROM `orders`");

        return $Order; 
    }

    // get order json
    public function GetOrderJson($id){
        $Order = DB::selectOne("SELECT orders.status, orders.id, orders.name_receive, orders.phone_receive, orders.address_receive, orders.note, orders.total_price FROM orders WHERE orders.id = " . $id);
        
        return $Order; 
    }

    // get list product
    public function GetListProduct($id){
        $ListProduct = DB::select("SELECT detail_orders.orders_id, product_detail.id, product_detail.name, detail_orders.quantity FROM product_detail INNER JOIN product on product_detail.product_id = product.id INNER JOIN detail_orders on detail_orders.product_id = product.id WHERE detail_orders.orders_id = " . $id);
        
        return $ListProduct; 
    }
    // set status order
    public function SetStatusOrder($id){
        try{
            $order = DB::update("UPDATE `orders` SET `status` = -1 WHERE `id` = '".$id."'");
    
            return true;
        }catch(Exception $e){
            return false;
        }
    }

    // user management
    public function GetAllUser(){
        $User = DB::select("SELECT * FROM `customer` WHERE `status` = 0");

        return $User; 
    }

    // disable user
    public function DisableUser($id){
        try{
            $user = DB::update("UPDATE `customer` SET `status` = -1 WHERE `id` = '".$id."'");
    
            return true;
        }catch(Exception $e){
            return false;
        }
    }
}