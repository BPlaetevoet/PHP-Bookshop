<?php
namespace Bookshop\Data;

use Bookshop\Entities\FilmGenre;

class FilmGenreDAO{
    public function getAll($mgr){
        $lijst = $mgr->getRepository('Bookshop\\Entities\\FilmGenre')->findAll(); //(*)
        return $lijst;
    }
    public function getGenreById($mgr, $id){
        $genre = $mgr->getRepository('Bookshop\\Entities\\FilmGenre')->find($id);
        return $genre;
    }
    public function getByOmschrijving($mgr, $omschrijving){
        $genre = $mgr->getRepository('Bookshop\\Entities\\FilmGenre')->find($omschrijving);
        return $genre;
    }
    public function getAantalEnGenre($mgr){
        $query = $mgr->createQuery("select g, count(f)as aantal from Bookshop\Entities\FilmGenre g LEFT JOIN Bookshop\Entities\Film f where f.filmGenre = g.id group by g.id");
        $lijst = $query->getResult();
        return $lijst;
    } 
}   