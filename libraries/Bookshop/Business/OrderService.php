<?php
namespace Bookshop\Business;

use Bookshop\Data\OrderDao;

class OrderService{
    public function GetById($mgr, $id) {
        $bestelling = OrderDao::getById($mgr, $id);
        return $bestelling;
    }
    public function PlaatsBestelling($mgr, $user, $items) {
        $bestelling = OrderDao::PlaatsBestelling($mgr, $user, $items);
        return $bestelling;
    }
    public function ToonBestellingVanUser($mgr, $user){
        $bestelling = OrderDao::ToonBestellingVanUser($mgr, $user);
        return $bestelling;
    }
}

