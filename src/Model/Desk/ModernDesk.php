<?php

namespace App\Model\Desk;

use App\Core\Model;

class ModernDesk extends Model implements DeskInteface
{
    public function __construct()
    {
        $this->PdoConnect();
    }

    public function showInfos():array{
        $sql = "SELECT products .* FROM products 
        INNER JOIN category
        ON products.category_id = category.id
        INNER JOIN category_type
        ON products.category_type =category_type.id
        WHERE category.id=:categoryId AND category_type.id = :categoryType";
        
        $artChairs = $this->select($sql,[
            ":categoryId"=>3,
            ":categoryType"=>2
        ]);
        return $artChairs;
    }
}
