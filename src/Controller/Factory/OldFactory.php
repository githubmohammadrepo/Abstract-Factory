<?php

namespace App\Controller\Factory;

use App\Model\Chair\ChairInteface;
use App\Model\Desk\OldDesk;
use App\Model\Chair\OldChair;
use App\Model\Desk\DeskInteface;
use App\Model\Table\OldTable;
use App\Model\Table\TableInteface;

class OldFactory implements ProductFactoryInterface
{
    public function __construct()
    {
        
    }

    public function createChair():ChairInteface{
        return new OldChair();
    }

    public function createTable():TableInteface{
        return new OldTable();
    }

    public function createDesk():DeskInteface{
        return new OldDesk();
    }

}
