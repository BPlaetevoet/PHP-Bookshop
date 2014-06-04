<?php

namespace Bookshop\Business;

use Bookshop\Data\PlaatsDao;

class PlaatsService {
    public function getPlaatsOverzicht($mgr){
        $lijst = PlaatsDao::getAll($mgr);
        return $lijst;
    }
    public function getPlaatsById($mgr, $id){
        $plaats = PlaatsDao::getById($mgr, $id);
        return $plaats;
    }
    public function getPlaatsByPostcode($mgr, $postcode){
        $plaats = PlaatsDao::getByPostcode($mgr, $postcode);
        return $plaats;
    }
    public function getByGemeente($mgr, $gemeente){
        $plaats = PlaatsDao::getByGemeente($mgr, $gemeente);
        return $plaats;
    }
    public function voegPlaatsToe($mgr, $postcode, $gemeente){
        $plaats = PlaatsDao::voegPlaatsToe($mgr, $postcode, $gemeente);
        return $plaats;
    }
}
