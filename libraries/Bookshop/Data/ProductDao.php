<?php
namespace Bookshop\Data;

use Bookshop\Entities\Product;

class ProductDao{
    public function getById($mgr, $id){
        $product = $mgr->getRepository('Bookshop\\Entities\\Product')->find($id);
        return $product;
    }
    public function getAll($mgr){
        $query = $mgr->createQuery('select p from Bookshop\\Entities\\Product p ');
        $lijst= $query->getResult();
        return $lijst;
    }
    public function deleteProduct($mgr, $id){
        $product = ProductDao::getById($mgr, $id);
        $mgr->remove($product);
        $mgr->flush();
    }
}


