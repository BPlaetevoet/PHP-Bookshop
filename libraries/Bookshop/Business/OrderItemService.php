<?php
//CartItemService.php
namespace Bookshop\Business;

use Bookshop\Data\OrderItemDao;

class OrderItemService{
    public function getById($mgr, $id){
        $item = OrderItemDao::getById($mgr, $id);
        return $item;
    }
    public function VoegToe($mgr, $productId, $aantal){
        $item = OrderItemDao::voegToe($mgr, $productId, $aantal);
        return $item;
    }
}


