<?php
//BestelrijDao.php
namespace Bookshop\Data;

use Bookshop\Entities\Bestelrij;

class BestelRijDao{
    public function VoegRijToe($mgr, $bestel_id, $product_id, $aantal, $b_prijs){
    $b_rij = new Bestelrij($bestel_id, $product_id, $aantal, $b_prijs);
    $mgr->persist($b_rij);
    $mgr->flush();
    }
}

