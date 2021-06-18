<?php
namespace App\Core;

use App\Core\DatabaseConnection\PdoConnection;

class Database extends PdoConnection{
    
    public function __construct(){
        $this->PdoConnect();
    }
    

}