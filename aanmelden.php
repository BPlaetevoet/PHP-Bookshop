<?php
session_start();

require_once 'bootstrap.php';

use Bookshop\Business\UserService;
use Bookshop\Business\ProductService;

$twigDataArray =array();

$page="login";

$twigDataArray["page"]= $page;

if (isset($_GET["error"])){
    $twigDataArray["error"]= 1;
}

// functies voor het winkelkarretje :

if (isset($_SESSION["cartItems"])){
    $countItems = 0;
    $totaal = 0;
    $cartItems = array();
    foreach ($_SESSION["cartItems"] as $item=>$aantal){
        $product = ProductService::getById($mgr, $item);
        array_push($cartItems, array($product, $aantal));
        $countItems += 1*$aantal;
        $totaal += ($product->getPrijs()*$aantal);
    }
    $twigDataArray["countItems"]=$countItems;
    $twigDataArray["cartItems"] = $cartItems;
    $twigDataArray["totaal"] = $totaal;
}

// Maak de pagina aan :

$view = $twig->render("$page.twig", $twigDataArray);
print ($view);
