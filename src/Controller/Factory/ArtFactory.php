<?php

namespace App\Controller\Factory;

use App\Model\Desk\ArtDesk;
use App\Model\Chair\ArtChair;
use App\Model\Chair\ChairInteface;
use App\Model\Desk\DeskInteface;
use App\Model\Table\ArtTable;
use App\Model\Table\TableInteface;

class ArtFactory implements ProductFactoryInterface
{
    public function __construct()
    {
        
    }

    public function createChair():ChairInteface{
        return new ArtChair();
    }

    public function createTable():TableInteface{
        return new ArtTable();
    }

    public function createDesk():DeskInteface{
        return new ArtDesk();
    }

}
