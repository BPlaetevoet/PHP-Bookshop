<?php
//test.php
require_once 'bootstrap.php';
use Bookshop\Business\BoekService;
$boekenlijst = $mgr->getRepository('Bookshop\\Entities\\Boek')->findAll();


print '<pre>';
print_r ($boekenlijst);
print '</pre>';