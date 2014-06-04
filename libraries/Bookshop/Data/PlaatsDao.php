<?php
namespace Bookshop\Data;

use Bookshop\Entities\Plaats;

class PlaatsDao{
    public function getAll($mgr){
        $lijst = $mgr->getRepository('Bookshop\\Entities\\Plaats')->findAll();
        return $lijst;
    }
    public function getPlaatsById($mgr, $id){
        $plaats = $mgr->getRepository('Bookshop\\Entities\\Plaats')->find($id);
        return $plaats;        
    }
    public function getByPostcode($mgr, $postcode){
        $plaats = $mgr->getRepository('Bookshop\\Entities\\Plaats')->findBy(array("postcode"=>$postcode));
        return $plaats;
    }
    public function getByGemeente($mgr, $gemeente){
        $plaats = $mgr->getRepository('Bookshop\\Entities\\Plaats')->findBy(array("gemeente"=>$gemeente));
        if (!$plaats){
            return null;
            exit;
        }
        return $plaats;
    }
    public function voegPlaatsToe($mgr, $postcode, $gemeente){
        $GemeenteBestaat = PlaatsDao::getByGemeente($mgr, $gemeente);
        if (!$GemeenteBestaat){
            $plaats = new Plaats($postcode, $gemeente);
            $mgr->persist($plaats);
            $mgr->flush();
            $plaats = PlaatsDao::getByGemeente($mgr, $gemeente);
            return $plaats;
        }else{
            return $GemeenteBestaat;
        } 
    }
}