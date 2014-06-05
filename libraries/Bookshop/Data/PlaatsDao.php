<?php
namespace Bookshop\Data;

use Bookshop\Entities\Plaats;

class PlaatsDao{
    public function getAll($mgr){
        $lijst = $mgr->getRepository('Bookshop\\Entities\\Plaats')->findAll();
        return $lijst;
    }
    public function getById($mgr, $id){
        $plaats = $mgr->getRepository('Bookshop\\Entities\\Plaats')->findOneById($id);
        return $plaats;
    }
    public function getByPostcode($mgr, $postcode){
        $plaats = $mgr->getRepository('Bookshop\\Entities\\Plaats')->findOneByPostcode($postcode);
        return $plaats;
    }
    public function getByGemeente($mgr, $gemeente){
        $plaats = $mgr->getRepository('Bookshop\\Entities\\Plaats')->findOneByGemeente($gemeente);
        return $plaats;
    }
    public function voegPlaatsToe($mgr, $postcode, $gemeente){
        $GemeenteBestaat = PlaatsDao::getByGemeente($mgr, $gemeente);
        if (!$GemeenteBestaat){
            $plaats = new Plaats($postcode, $gemeente);
            $mgr->persist($plaats);
            $mgr->flush();
            return $plaats;
        }else{
            return $GemeenteBestaat;
        } 
    }
}