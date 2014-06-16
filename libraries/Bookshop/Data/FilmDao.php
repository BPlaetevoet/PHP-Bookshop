<?php
namespace Bookshop\Data;

use Bookshop\Entities\Product;
use Bookshop\Entities\Film;
use Bookshop\Entities\Genre;

class FilmDAO{
    public function getAll($mgr){
        $lijst = $mgr->getRepository('Bookshop\\Entities\\Film')->findALL(); 
        return $lijst;
    }
    public function getLatest($mgr){
        $query = $mgr->createQuery('select f from Bookshop\\Entities\\Film f order by f.id desc');
        $lijst = $query->setMaxResults(10)->getResult();
        return $lijst;
    }
    public function getAllOrdered($mgr, $orderby){
        $query = $mgr->createQuery('select f from Bookshop\\Entities\\Film f order by f.'.$orderby);
        $lijst = $query->getResult();
        return $lijst;
    }
    public function getByGenre($mgr, $genre){
        $lijst = $mgr->getRepository('Bookshop\\Entities\\Film')->findBy(array('genre'=>$genre));
        return $lijst;
    }
    public function getByGenreAndOrdered($mgr, $genre, $orderby){
        $query = $mgr->createQuery('select f from Bookshop\\Entities\\Film f  where f.genre ='.$genre.' order by f.'.$orderby);
        $lijst = $query->getResult();
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
    public function getGenresEnAantallen($mgr){
        $query = $mgr->createQuery('select g.id, g.omschrijving, count(f) as aantal from Bookshop\\Entities\\Genre g LEFT JOIN Bookshop\\Entities\\Film f where f.genre = g.id  group by f.genre having count(f)>0');
        $lijst = $query->getResult();
        return $lijst;
    }
    public function addFilm($mgr, $titel, $prijs, $speelduur, $genre){
        $filmgenre = $mgr->getRepository('Bookshop\\Entities\\Genre')->find($genre);
        $film = new Film($titel, $prijs, $speelduur, $filmgenre);
        $mgr->persist($film);
        $mgr->flush();
    }
}

