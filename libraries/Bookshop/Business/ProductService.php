<?php

namespace Bookshop\Business;

use Bookshop\Data\ProductDao;
use Bookshop\Business\BoekService;
use Bookshop\Business\FilmService;

class ProductService{
    
    /**
     * Controller om de productlijst weer te geven 
     * 
     */
    public function getAll($mgr, $type){
    switch ($type){
        case "boeken":
            $lijst = BoekService::getBoekenOverzicht($mgr);
            break;
        case "films":
            $lijst = FilmService::getFilmOverzicht($mgr);
            break;
        default :
            $lijst = ProductDao::getAll($mgr); 
            break;
        }
        return $lijst;
    }
    public function getById($mgr, $id){
        $product = ProductDao::getById($mgr, $id);
        return $product;
    }
    public function deleteProduct($mgr, $id){
     ProductDao::deleteProduct($mgr, $id);
    }
}



