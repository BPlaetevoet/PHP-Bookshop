<?php
session_start();
require_once 'bootstrap.php';

use Bookshop\Business\userService;

if (isset($_POST["email"])&& (isset($_POST["password"]))){
    $mail = htmlspecialchars($_POST["email"]);
    $password = base64_encode(htmlspecialchars($_POST["password"]));
    $login = userService::validateUser($mgr, $mail, $password);
    if ($login){
        $_SESSION["login"]= $login[0]->getId();
        if ($login[0]->getAdmin()){
            $_SESSION["admin"]= true;
        }
    }
    header('location: index.php');
 
}


