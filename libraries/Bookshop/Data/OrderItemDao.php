<?php
//CartItemDao.php
namespace Bookshop\Data;
use Bookshop\Entities\OrderItem;
use Bookshop\Data\ProductDao;

class OrderItemDao{
    public function getById($mgr, $id){
        $item = $mgr->getRepository('Bookshop\\Entities\\OrderItem')->find($id);
        return $item;
    }
    public static function voegToe($mgr, $productId, $aantal){
        $product = ProductDao::getById($mgr, $productId);
        $prijs = $product->getPrijs();
        $new_item = new OrderItem($product, $aantal, $prijs);
        $mgr->persist($new_item);
        $mgr->flush();
        return $new_item;
    }

}

