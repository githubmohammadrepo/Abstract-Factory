<?php

namespace App\Controller\Factory;

use App\Model\Chair\ChairInteface;
use App\Model\Chair\ModernChair;
use App\Model\Desk\DeskInteface;
use App\Model\Desk\ModernDesk;
use App\Model\Table\ModernTable;
use App\Model\Table\TableInteface;

class ModernFactory implements ProductFactoryInterface
{
    public function __construct()
    {
        
    }

    public function createChair():ChairInteface{
        return new ModernChair();
    }

    public function createTable():TableInteface{
        return new ModernTable();
    }

    public function createDesk():DeskInteface{
        return new ModernDesk();
    }

}
