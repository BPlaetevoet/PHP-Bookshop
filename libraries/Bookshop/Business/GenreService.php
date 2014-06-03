<?php
namespace Bookshop\Business;

use Bookshop\Data\GenreDAO;

class GenreService{
    public function getGenreOverzicht($mgr){
        $lijst = GenreDAO::getAll($mgr);
        return $lijst;
    }
    public function getGenreById($mgr, $id){
        $genre = GenreDAO::getById($mgr, $id);
        return $genre;
    }
    public function getGenresEnAantallen($mgr){
        $lijst = GenreDAO::getAantalEnGenre($mgr);
        return $lijst;
    }
}
