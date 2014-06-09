<?php
session_start();
require_once 'bootstrap.php';

use Bookshop\Business\FilmService;
use Bookshop\Business\BoekService;

if (isset($_SESSION["admin"])&&($_SESSION["admin"]==1)){
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
}
else {
    die ('unauthorised acces');
}

