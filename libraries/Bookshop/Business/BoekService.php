<?php
namespace Bookshop\Business;

use Bookshop\Data\BoekDao;
use Bookshop\Data\GenreDao;

class BoekService{
    public static function getBoekenOverzicht($mgr){
       $lijst = boekDao::getAll($mgr);
        return $lijst;
    }
    public function getByGenre($mgr, $genreId){
        $lijst = BoekDao::getByGenre($mgr, $genreId);
        return $lijst;
    }
    public function getById($mgr,$id){
        $boek = BoekDao::getById($mgr, $id);
        return $boek;
    }
    public function getByTitel($mgr, $titel){
        $boek = BoekDao::getByTitel($mgr, $titel);
        return $boek;
    }
}
