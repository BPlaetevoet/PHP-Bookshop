<?php
session_start();
/*plaatsbestelling.php
 * 
 * Bestellingen verwerken en toevoegen in db
 */
require_once 'bootstrap.php';

use Bookshop\Business\OrderService;
use Bookshop\Business\UserService;

if (isset($_SESSION["login"])&&(isset($_SESSION["cartItems"]))){
    $userId = $_SESSION["login"];
    $items = $_SESSION["cartItems"];
    $user = UserService::getUserById($mgr, $userId);
    $bestelling = OrderService::PlaatsBestelling($mgr, $user, $items);
    if($bestelling){
        // Bestelling gelukt doorverwijzen naar bevestigingspagina
        unset($_SESSION["cartItems"]);
        header('location: index.php?id=bevestiging');
    }else{
        // Er ging iets fout 
    }
}else{
    //niet ingelogd of geen items in karretje
    
}


//if (isset($_SESSION["cartItems"])){
//    $totaal = 0;
//    $bestelling = new Order($user);
//    foreach($_SESSION["cartItems"] as $item => $aantal){
//        $product = ProductService::getById($mgr, $item);
//        $item = new OrderItem($product, $aantal, $product->getPrijs(), $bestelling);
//        $bestelling->addItem($item);
//        $totaal +=($item->getB_Prijs()*$aantal);
//    }
//    $bestelling->setBedrag($totaal);
//    $mgr->persist($bestelling);
//    $mgr->flush();
//}


