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
    unset($_SESSION["admin"]);
    header('location: index.php');
}
if (isset($_GET["id"])){
    $page = $_GET["id"];
}else{
    $page = "home";
}
$current_url =parse_url($_SERVER['REQUEST_URI']);
if (isset($current_url['query'])){
   parse_str($current_url['query'], $parts);
   unset($parts['orderby']);
   $current_url = $current_url['path'].'?'.http_build_query($parts);
}
$twigDataArray["page"]= $page;
$twigDataArray["current_url"] = $current_url;
if (isset($_SESSION["cartItems"])){
    $countItems = 0;
    $totaal = 0;
    $cartItems = array();
    foreach ($_SESSION["cartItems"] as $item => $aantal){
        $product = ProductService::getById($mgr, $item);
        array_push($cartItems, array($product, $aantal));
        $countItems += 1*$aantal;
        $totaal += ($product->getPrijs()*$aantal);
    }
    $twigDataArray["countItems"]=$countItems;
    $twigDataArray["cartItems"] = $cartItems;
    $twigDataArray["totaal"] = $totaal;
}
if ($page == "producten"){
    if (isset($_GET["type"])){
    $type = $_GET["type"];
    $twigDataArray["type"] = $type;
    if ($type == "boeken"){
        $producten = BoekService::getBoekenOverzicht($mgr);
            if (isset($_GET['orderby'])){
                $orderby = $_GET['orderby'];
                $producten = BoekService::getOrderedOverzicht($mgr, $orderby);
            }
            if(isset($_GET["cat"])){
                $categorie = $_GET['cat'];
                $producten = BoekService::getByGenre($mgr, $categorie);
                $twigDataArray["soort"]=  GenreService::getGenreById($mgr, $categorie);
                if(isset($_GET['orderby'])){
                    $orderby = $_GET['orderby'];
                    $producten = BoekService::GetByGenreAndOrdered($mgr, $categorie, $orderby);
                }
                
            }
            $genrelijst = BoekService::getGenresEnAantallen($mgr);
    }
    if ($type == "films"){
        $producten = FilmService::getFilmOverzicht($mgr);
        if (isset($_GET['orderby'])){
            $orderby = $_GET['orderby'];
            $producten = FilmService::getOrderedOverzicht($mgr, $orderby);
        }
        if (isset($_GET['cat'])){
            $categorie = $_GET['cat'];
            $twigDataArray["soort"]= GenreService::GetGenreById($mgr, $categorie);
            $producten = FilmService::getByGenre($mgr, $categorie);
            if (isset($_GET['orderby'])){
                $orderby = $_GET['orderby'];
                $producten = FilmService::getByGenreAndOrdered($mgr, $categorie, $orderby);
            }           
        }
        $genrelijst = FilmService::getGenresEnAantallen($mgr);
    }
    
    $twigDataArray["productlijst"] = $producten; 
    $twigDataArray["genrelijst"] = $genrelijst;
    
    }
}

if(isset($_SESSION["login"])){
    $id = $_SESSION["login"];
    $user = UserService::getUserById($mgr, $id);
    if ($user->getAdmin()==1){
        $_SESSION["admin"]=1;
    }else{
        $_SESSION["admin"]=0;
    }
    $twigDataArray["user"] = $user;
}
if (isset($_SESSION["admin"])){
    $twigDataArray["admin"] = 1;
}

$view = $twig->render("$page.twig", $twigDataArray);
print ($view);
