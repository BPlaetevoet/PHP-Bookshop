<?php
namespace Bookshop\Business;

use Bookshop\Data\FilmGenreDAO;

class FilmGenreService{
    public function getGenreOverzicht($mgr){
        $lijst = FilmGenreDAO::getAll($mgr);
        return $lijst;
    }
    public function getGenreById($mgr, $id){
        $genre = FilmGenreDAO::getById($mgr, $id);
        return $genre;
    }
    public function getGenresEnAantallen($mgr){
        $lijst = FilmGenreDAO::getAantalEnGenre($mgr);
        return $lijst;
    }
}

