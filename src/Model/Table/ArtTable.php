<?php

namespace App\Model\Table;

use App\Core\Model;

class ArtTable extends Model implements TableInteface
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
            ":categoryId"=>12,
            ":categoryType"=>1
        ]);
        return $artChairs;
    }
}
