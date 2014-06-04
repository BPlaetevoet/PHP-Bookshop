<?php

namespace Bookshop\Business;

use Bookshop\Data\ProductDao;

class ProductService{
    public function getById($mgr, $id){
        $product = ProductDao::getById($mgr, $id);
        return $product;
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

