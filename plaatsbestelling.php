<?php
session_start();
/*plaatsbestelling.php
 * 
 * Bestellingen verwerken en toevoegen in db
 */
require_once 'bootstrap.php';
use Bookshop\Data\OrderDao;
use Bookshop\Data\OrderItemDao;
use Bookshop\Entities\Order;
use Bookshop\Entities\OrderItem;
use Bookshop\Business\UserService;
use Bookshop\Business\ProductService;
use Doctrine\Common\Collections\ArrayCollection;


if (isset($_SESSION["login"])){
    $userId = $_SESSION["login"];
    $user = UserService::getUserById($mgr, $userId);
}
if (isset($_SESSION["cartItems"])){
    $totaal = 0;
    $bestelling = new Order($user);
    foreach($_SESSION["cartItems"] as $item => $aantal){
        $product = ProductService::getById($mgr, $item);
        $item = new OrderItem($product, $aantal, $product->getPrijs(), $bestelling);
        $bestelling->addItem($item);
        $totaal +=($item->getB_Prijs()*$aantal);
    }
    
    $bestelling->setBedrag($totaal);
    $mgr->persist($bestelling);
    print '<pre>';
    Doctrine\Common\Util\Debug::dump($bestelling);
    Doctrine\Common\Util\Debug::dump($bestelling->getItems());
    print '</pre>';
    $mgr->flush();
    print '<pre>';
    Doctrine\Common\Util\Debug::dump($bestelling);
    Doctrine\Common\Util\Debug::dump($bestelling->getItems());
    print '</pre>';
   $bestelling5 = Bookshop\Data\OrderDao::getById($mgr, 6);
   //$bestelling2->getItems();
    
    
 }
//    $bestelling = OrderDao::PlaatsBestelling($mgr, $user);
//    foreach($_SESSION["cartItems"] as $item => $aantal){
//        $product = ProductService::getById($mgr, $item);
//        $item = OrderItemDao::voegtoe($mgr, $product, $aantal);
//        $bestelling->addItem($item);
//        $totaal +=($item->getB_Prijs()*$aantal);
//    }
//    $bestelling->setBedrag($totaal);
//}




