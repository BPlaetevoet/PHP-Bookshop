<?php
namespace Bookshop\Data;

use Bookshop\Entities\Film;
use Bookshop\Entities\FilmGenre;

class FilmDAO{
    public function getAll($mgr){
        $lijst = $mgr->getRepository('Bookshop\\Entities\\Film')->findALL(); 
        return $lijst;
    }
    public function getByGenre($mgr, $genre){
        $lijst = $mgr->getRepository('Bookshop\\Entities\\Film')->findBy(array('filmgenre_id'=>$genre));
        return $lijst;
    }
    public function getById($mgr, $id){
        $film = $mgr->getRepository('Bookshop\\Entities\\Film')->find($id);
        return $film;
    }
    public function getByTitel($mgr, $titel){
        $film = $mgr->getRepository('Bookshop\\Entities\\Film')->find($titel);
        return $film;
    }
}

