<?php
namespace Bookshop\Business;

use Bookshop\Data\FilmDao;
use Bookshop\Data\FilmGenreDao;

class FilmService{
    public static function getFilmOverzicht($mgr){
       $lijst = FilmDao::getAll($mgr);
        return $lijst;
    }
    public function getLatest($mgr){
        $lijst = FilmDao::getLatest($mgr);
        return $lijst;
    }
    public function getOrderedOverzicht($mgr, $orderby){
        $lijst = FilmDao::getAllOrdered($mgr, $orderby);
        return $lijst;
    }
    public function getByGenre($mgr, $genreId){
        $lijst = FilmDao::getByGenre($mgr, $genreId);
        return $lijst;
    }
    public function getByGenreAndOrdered($mgr, $genreId, $orderby){
        $lijst = FilmDao::getByGenreAndOrdered($mgr, $genreId, $orderby);
        return $lijst;
    }
    public function getById($mgr,$id){
        $film = FilmDao::getById($mgr, $id);
        return $film;
    }
    public function getByTitel($mgr, $titel){
        $film = FilmDao::getByTitel($mgr, $titel);
        return $film;
    }
    public function VoegFilmToe($mgr, $titel, $prijs, $speelduur, $genre){
        $film = FilmDao::AddFilm($mgr, $titel, $prijs, $speelduur, $genre);
        return $film;
    }
    public function deleteFilm($mgr, $id){
        FilmDao::deleteFilm($mgr, $id);
    }
    public function getGenresEnAantallen($mgr){
        $lijst = FilmDao::getGenresEnAantallen($mgr);
        return $lijst;
    }
}
