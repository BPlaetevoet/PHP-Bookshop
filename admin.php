<?php
session_start();
require_once 'bootstrap.php';

use Bookshop\Business\FilmService;
use Bookshop\Business\BoekService;
use Bookshop\Business\ProductService;
use Bookshop\Business\UserService;

if (isset($_SESSION["admin"])&&($_SESSION["admin"]==1)){
    if (isset($_GET["actie"])){
        $actie = htmlspecialchars($_GET["actie"]);
    switch ($actie){
    case 'toevoegen' :
        $product = htmlspecialchars($_POST["product"]);
        $titel = htmlspecialchars($_POST["titel"]);
        $genre = $_POST["genre"];
        $prijs = $_POST["prijs"];
        $returnurl = $_POST["return_url"];
        if ($product=='boeken'){
            $auteur = htmlspecialchars($_POST["auteur"]);
            $boek = BoekService::VoegBoekToe($mgr, $titel, $prijs, $auteur, $genre);
        }
        if ($product=='films'){
            $speelduur = htmlspecialchars($_POST["speelduur"]);
            $film = FilmService::VoegFilmToe($mgr, $titel, $prijs, $speelduur, $genre);
        }
        header ('location: '.$returnurl);
        break;
    case 'delete' :
        ProductService::deleteProduct($mgr, $_GET["id"]);
        header("location: ".$_SERVER['HTTP_REFERER']);
        break;
    }
    
    }else{
     // Geen actie opgegeven   
    }
}else{
    // Niet ingelogd als admin
    die ('unauthorised acces');
}

