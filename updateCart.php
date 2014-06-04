<?php

session_start();

require_once 'bootstrap.php';


use Bookshop\Business\BoekService;

if (isset($_GET["actie"])&& (isset($_GET["id"])) && (isset($_GET["returnurl"]))){
    if ($_GET["actie"]=="toevoegen"){
        $_SESSION["cartItems"][$_GET["id"]] ++ ;
        header("location: ".$_GET["returnurl"]);
        }
    if ($_GET["actie"]=="delete"){
        $_SESSION["cartItems"][$_GET["id"]]--;
        if ($_SESSION["cartItems"][$_GET["id"]]==0){
            unset($_SESSION["cartItems"][$_GET["id"]]);
        }
        header("location: ".$_GET["returnurl"]);
    }
}
if (isset($_GET["reset"])&& $_GET["reset"]== "1"){
    session_destroy();
    header("location: ".$_GET["returnurl"]);    
}
