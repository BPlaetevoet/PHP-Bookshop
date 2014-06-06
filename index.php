<?php
session_start();

require_once 'bootstrap.php';

use Bookshop\Business\BoekService;
use Bookshop\Business\GenreService;
use Bookshop\Business\FilmService;
use Bookshop\Business\ProductService;
use Bookshop\Business\UserService;
$twigDataArray =array();
if (isset($_GET["actie"])&&($_GET["actie"]=="uitloggen")){
    unset($_SESSION["login"]);
    header('location: index.php');
}
if (isset($_GET["id"])){
    $page = $_GET["id"];
}else{
    $page = "home";
}
$current_url = $_SERVER['REQUEST_URI'];
$twigDataArray["page"]= $page;
$twigDataArray["current_url"] = $current_url;
if (isset($_SESSION["cartItems"])){
    $totaal = 0;
    $cartItems = array();
    foreach ($_SESSION["cartItems"] as $item => $aantal){
        $product = ProductService::getById($mgr, $item);
        array_push($cartItems, array($product, $aantal));
        $totaal += ($product->getPrijs()*$aantal);
    }
    
    $twigDataArray["cartItems"] = $cartItems;
    $twigDataArray["totaal"] = $totaal;
}
if ($page == "boeken"){
    if(isset($_GET["cat"])){
        $boeken = BoekService::getByGenre($mgr, $_GET["cat"]);
    }else {
        $boeken = BoekService::GetBoekenOverzicht($mgr); //(*)
    }
    $genrelijst = BoekService::getGenresEnAantallen($mgr);
    $twigDataArray["boekenlijst"] = $boeken; 
    $twigDataArray["genrelijst"] = $genrelijst;
}
if ($page == "films"){
    if(isset($_GET["cat"])){
        $films = FilmService::getByGenre($mgr, $_GET["cat"]);
    }else {
        $films = FilmService::GetFilmOverzicht($mgr); //(*)
    }
    $genrelijst = FilmService::getGenresEnAantallen($mgr);
    $twigDataArray["filmlijst"] = $films; 
    $twigDataArray["genrelijst"] = $genrelijst;
}
if(isset($_SESSION["login"])){
    $id = $_SESSION["login"];
    $user = UserService::getUserById($mgr, $id);
    $twigDataArray["user"] = $user;
}
if (isset($_SESSION["admin"])){
    $twigDataArray["admin"] = 1;
}

$view = $twig->render("$page.twig", $twigDataArray);
print ($view);
