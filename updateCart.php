<?php
//UpdateCart.php
session_start();

require_once 'bootstrap.php';
use Bookshop\Business\ProductService;


if (isset($_GET["actie"])&& (isset($_GET["id"])) && (isset($_GET["returnurl"]))){
    if(!isset($_SESSION["cartItems"])){
        $_SESSION["cartItems"]= array();
    }
    if ($_GET["actie"]=="toevoegen"){
         $_SESSION["cartItems"][$_GET["id"]] ++ ;
        header("location: ".$_SERVER['HTTP_REFERER']);
        }
    if ($_GET["actie"]=="delete"){
        $_SESSION["cartItems"][$_GET["id"]]--;
        if ($_SESSION["cartItems"][$_GET["id"]]==0){
            unset($_SESSION["cartItems"][$_GET["id"]]);
        }
        header("location: ".$_SERVER['HTTP_REFERER']);
    }
}
if (isset($_GET["reset"])&& $_GET["reset"]== "1"){
    unset($_SESSION["cartItems"]);
    header("location: index.php");    
}
