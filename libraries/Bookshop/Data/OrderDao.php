<?php
//OrderDao.php
namespace Bookshop\Data;

use Bookshop\Entities\Order;
use Bookshop\Entities\OrderItem;
use Bookshop\Business\ProductService;

class OrderDao{
    public function getById($mgr, $id){
        $order = $mgr->getRepository('Bookshop\\Entities\\Order')->find($id);
        return $order;
    }
    public function PlaatsBestelling($mgr, $user, $items){
        $bestelling = new Order($user);
        foreach($items as $item=>$aantal){
            $product = ProductService::getById($mgr, $item);
            $orderitem = new OrderItem($product, $aantal, $product->getPrijs(), $bestelling);
            $bestelling->addItem($orderitem);
            $bedrag += ($orderitem->getB_Prijs()*$aantal);
        }
        $bestelling->setBedrag($bedrag);
        $mgr->persist($bestelling);
        $mgr->flush();
        return $bestelling;
    }
    public function ToonBestellingVanUser($mgr, $user){
        $bestellingen = $mgr->getRepository('Bookshop\\Entities\\Order')->findBy(array('user_id'=>$user));
        return $bestellingen;
    }
}


