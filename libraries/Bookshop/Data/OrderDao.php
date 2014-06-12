<?php
//ShoppingCartDao.php
namespace Bookshop\Data;

use Bookshop\Entities\Order;

class OrderDao{
    public function getById($mgr, $id){
        $order = $mgr->getRepository('Bookshop\\Entities\\Order')->find($id);
        return $order;
    }
    public function PlaatsBestelling($mgr, $user){
        $bestelling = new Order($user);
        $mgr->persist($bestelling);
        $mgr->flush();
        return $bestelling;
        
    }
}


