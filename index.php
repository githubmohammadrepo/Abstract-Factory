<?php

use App\Controller\ProductController;
use App\Controller\Factory\ArtFactory;
use App\Controller\Factory\OldFactory;
use App\Controller\Factory\ModernFactory;

require_once('./vendor/autoload.php');

$artFactory = new ArtFactory();
$modernFactory= new ModernFactory();
$oldFactory = new OldFactory();


//one art chair
$chairs =[];
$chairs[] = $artFactory->createChair();
$chairs[] = $modernFactory->createChair();
$chairs[] = $oldFactory->createChair();

// foreach ($chairs as $key => $chair) {
//     print_r($chair->showInfos());
// }


// old table
$oldTable = $oldFactory->createTable();
print_r($oldTable->showInfos());