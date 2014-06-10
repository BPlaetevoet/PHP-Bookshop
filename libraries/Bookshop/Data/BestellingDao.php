<?php
// BestellingDao.php
namespace Bookshop\Data;

use Bookshop\Entities\Bestelling;

class BestellingDao{
    public function PlaatsBestelling($mgr, $user, $bedrag){
        $bestelling = new Bestelling($user, $bedrag);
        $mgr->persist($bestelling);
        $mgr->flush();
        return $bestelling;
    }
}


