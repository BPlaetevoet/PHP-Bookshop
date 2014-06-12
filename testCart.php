<?php
session_start();
require_once 'bootstrap.php';

use Bookshop\Data\ProductDao;
use Bookshop\Entities\CartItem;

function voegToe($mgr, $productId, $aantal){
        $product = ProductDao::getById($mgr, $productId);
        $prijs = $product->getPrijs();
        $new_item = new CartItem($product, $aantal, $prijs);
        $mgr->persist($new_item);
        $mgr->flush();
        echo $new_item->getId();
        if(!isset($_SESSION["cartItems"])){
            $_SESSION["cartItems"] = array();
        }
        array_push($_SESSION["cartItems"], $new_item->getId());
}
voegToe($mgr, 11, 1);


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

