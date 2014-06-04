<?php
namespace Bookshop\Data;

use Bookshop\Entities\Product;

class ProductDao{
    public function getById($mgr, $id){
        $product = $mgr->getRepository('Bookshop\\Entities\\Product')->find($id);
        return $product;
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

