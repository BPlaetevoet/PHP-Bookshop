<?php
//test.php
require_once 'bootstrap.php';
use Bookshop\Business\BoekService;
$id=1;
$boek1 = BoekService::getById($mgr, $id);
echo 'De titel van het boek met id 1 is :' ,$boek1->getTitel();
echo '<br>';
echo 'Het genre is :' ,$boek1->getGenre()->getOmschrijving();
echo '<br /><br />';