<?php

namespace App\Controller\Factory;

use App\Model\Chair\ChairInteface;
use App\Model\Desk\DeskInteface;
use App\Model\Table\TableInteface;

interface ProductFactoryInterface
{
    public function createChair():ChairInteface;
    public function createTable():TableInteface;
    public function createDesk():DeskInteface;
}
