<?php

namespace App\Model\Chair;

use App\Core\Model;

class ModernChair extends Model implements ChairInteface
{
    public function __construct()
    {
       $this->PdoConnect(); 
    }

    public function showInfos(){
        $sql = "SELECT products .* FROM products 
        INNER JOIN category
        ON products.category_id = category.id
        INNER JOIN category_type
        ON products.category_type =category_type.id
        WHERE category.id=:categoryId AND category_type.id = :categoryType";
        
        $artChairs = $this->select($sql,[
            ":categoryId"=>1,
            ":categoryType"=>2
        ]);
        return $artChairs;
    }
}
