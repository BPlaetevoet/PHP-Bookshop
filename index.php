<?php
session_start();

require_once 'bootstrap.php';

use Bookshop\Business\BoekService;
use Bookshop\Business\GenreService;
use Bookshop\Business\FilmService;
use Bookshop\Business\FilmGenreService;
$twigDataArray =array();

if (isset($_GET["id"])){
    $page = $_GET["id"];
}else{
    $page = "home";
}
$twigDataArray["page"]= $page;

if (isset($_SESSION["cartItems"]["boeken"])|| (isset($_SESSION["cartItems"]["films"]))){
    $totaal = 0;
    $cartItems["boeken"] = array();
    $cartItems["films"] = array();
    foreach ($_SESSION["cartItems"]["boeken"] as $item => $aantal){
        $boek = BoekService::getById($mgr, $id);
        array_push($cartItems["boeken"], $boek);
        $totaal += ($boek->getPrijs()*$aantal);
    }
    foreach($_SESSION["cartItems"]["films"] as $item => $aantal){
        $film = $mgr->find("\\Bookshop\\Entities\\Film", $item);
        array_push($cartItems["films"], $film);
        $totaal += ($film->getPrijs()*$aantal);
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
    $genrelijst = GenreService::getGenresEnAantallen($mgr);
    $twigDataArray["boekenlijst"] = $boeken; 
    $twigDataArray["genrelijst"] = $genrelijst;
}
if ($page == "films"){
    if(isset($_GET["cat"])){
        $films = FilmService::getByGenre($mgr, $_GET["cat"]);
    }else {
        $films = FilmService::GetFilmOverzicht($mgr); //(*)
    }
    $genrelijst = FilmGenreService::getGenresEnAantallen($mgr);
    $twigDataArray["filmlijst"] = $films; 
    $twigDataArray["genrelijst"] = $genrelijst;
}





$view = $twig->render("$page.twig", $twigDataArray);
print ($view);
