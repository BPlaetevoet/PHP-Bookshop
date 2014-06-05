<?php

require_once 'bootstrap.php';

use Bookshop\Data\PlaatsDao;

$postcode = 8530;
$gemeente = "Harelbeke";

$plaats = PlaatsDao::voegPlaatsToe($mgr, $postcode, $gemeente);

print '<pre>';
print_r ($plaats);
print '</pre>';

