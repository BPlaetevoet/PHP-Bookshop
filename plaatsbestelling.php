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
        header('location: index.php?id=bevestigen');
    }else{
        // Er ging iets fout 
    }
}else{
    //niet ingelogd of geen items in karretje
    
}