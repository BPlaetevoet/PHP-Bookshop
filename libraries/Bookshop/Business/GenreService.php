<?php
//GenreService.php
namespace Bookshop\Business;

use Bookshop\Data\GenreDao;

class GenreService{
    public function getGenreOverzicht($mgr){
        $lijst = GenreDao::getAll($mgr);
        return $lijst;
    }
    public function getGenreById($mgr, $id){
        $genre = GenreDao::getGenreById($mgr, $id);
        return $genre;
    }
    public function getGenreByOmschrijving($mgr, $omschrijving){
        $genre = GenreDao::getGenreByOmschrijving($mgr, $omschrijving);
        return $genre;
    }
    public function getGenresEnAantallen($mgr){
        $lijst = GenreDao::getAantalEnGenre($mgr);
        return $lijst;
    }
    public function addGenre($mgr, $omschrijving){
        $genre = GenreDao::addGenre($mgr, $omschrijving);
        return $genre;
    }
    public function deleteGenre($mgr, $id){
        GenreDao::delete($mgr, $id);
    }
}
