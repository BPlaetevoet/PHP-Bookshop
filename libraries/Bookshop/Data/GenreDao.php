<?php
//GenreDao.php
namespace Bookshop\Data;

use Bookshop\Entities\Genre;

class GenreDao{
    public function getAll($mgr){
        $lijst = $mgr->getRepository('Bookshop\\Entities\\Genre')->findAll(); //(*)
        return $lijst;
    }
    public function getGenreById($mgr, $id){
        $genre = $mgr->getRepository('Bookshop\\Entities\\Genre')->find($id);
        return $genre;
    }
    public function getGenreByOmschrijving($mgr, $omschrijving){
        $genre = $mgr->getRepository('Bookshop\\Entities\\Genre')->findByOmschrijving($omschrijving);
        return $genre;
    }
    public function getAantalEnGenre($mgr){
        $query = $mgr->createQuery("select g, count(b)as aantal from Bookshop\Entities\Genre g LEFT JOIN Bookshop\Entities\Boek b where b.genre = g.id GROUP BY g.id");
        $lijst = $query->getResult();
        return $lijst;
    } 
    
    public function addGenre($mgr, $omschrijving){
        $bestaandGenre = GenreDao::getGenreByOmschrijving($mgr, $omschrijving);
            if(!$bestaandGenre){
                $genre = new Genre($omschrijving);
                $mgr->persist($genre);
                $mgr->flush();
                return $genre;
            }
        }
    public function delete($mgr, $id){
        $genre = GenreDao::getGenreById($mgr, $id);
        $mgr->remove($genre);
        $mgr->flush();
    }
    
    
}

