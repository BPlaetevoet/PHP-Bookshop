<?php
//test.php
require_once 'bootstrap.php';
use Bookshop\Business\PlaatsService;

$postcode = "8904";
$gemeente = "Boezinge";
$plaats = PlaatsService::voegPlaatsToe($mgr, $postcode, $gemeente);


print '<pre>';
print_r ($plaats);
print '</pre>';
