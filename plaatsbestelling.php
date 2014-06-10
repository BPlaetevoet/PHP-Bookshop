<?php
session_start();
/*plaatsbestelling.php
 * 
 * Bestellingen verwerken en toevoegen in db
 */
require_once 'bootstrap.php';

use Bookshop\Data\BestellingDao;
use Bookshop\Data\BestelRijDao;
use Bookshop\Business\UserService;
use Bookshop\Business\ProductService;

if (isset($_SESSION["login"])){
    $userId = $_SESSION["login"];
    $user = UserService::getUserById($mgr, $userId);
}
if (isset($_SESSION["cartItems"])){
    $totaal = 0;
    $cartItems = array();
    foreach($_SESSION["cartItems"] as $item => $aantal){
        $product = ProductService::getById($mgr, $item);
        array_push($cartItems, array($product, $aantal));
        $totaal +=($product->getPrijs()*$aantal);
    }
}
$bestelling = BestellingDao::PlaatsBestelling($mgr, $user, $totaal);
foreach($_SESSION["cartItems"] as $item => $aantal){
    $product = ProductService::getById($mgr, $item);
    $bestelrij = BestelRijDao::VoegRijToe($mgr, $bestelling, $product, $aantal, $product->getPrijs());
}



