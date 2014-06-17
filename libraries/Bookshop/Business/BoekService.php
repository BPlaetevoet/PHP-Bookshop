<?php
namespace Bookshop\Business;

use Bookshop\Data\BoekDao;
use Bookshop\Data\GenreDao;

class BoekService{
    public static function getBoekenOverzicht($mgr){
       $lijst = boekDao::getAll($mgr);
        return $lijst;
    }
    public function getOrderedOverzicht($mgr, $orderby){
        $lijst= BoekDao::getAllOrdered($mgr, $orderby);
        return $lijst;
    }
    public function getLatest($mgr){
        $lijst = BoekDao::getLatest($mgr);
        return $lijst;
    }
    public function getByGenre($mgr, $genreId){
        $lijst = BoekDao::getAllFromGenre($mgr, $genreId);
        return $lijst;
    }
    public function getByGenreAndOrdered($mgr, $genreId, $orderby){
        $lijst = BoekDao::getByGenreAndOrdered($mgr, $genreId, $orderby);
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
    public function getGenresEnAantallen($mgr){
        $lijst = BoekDao::getGenresEnAantallen($mgr);
        return $lijst;
    }
    public function VoegBoekToe($mgr, $titel, $prijs, $auteur, $genre){
        $boek = BoekDao::AddBoek($mgr, $titel, $prijs, $auteur, $genre);
        return $boek;
    }
    public function deleteBoek($mgr, $id){
        BoekDao::deleteBoek($mgr, $id);
    }
    public function UpdateBoek($mgr, $id , $titel, $prijs, $auteur, $genre){
        $boek = BoekDao::UpdateBoek($mgr, $id, $titel, $prijs, $auteur, $genreId);
        return $boek;
    }
    
}
