<?php
namespace Bookshop\Data;

use Bookshop\Entities\Genre;

class GenreDAO{
    public function getAll($mgr){
        $lijst = $mgr->getRepository('Bookshop\\Entities\\Genre')->findAll(); //(*)
        return $lijst;
    }
    public function getGenreById($mgr, $id){
        $genre = $mgr->getRepository('Bookshop\\Entities\\Genre')->find($id);
        return $genre;
    }
    public function getByOmschrijving($mgr, $omschrijving){
        $genre = $mgr->getRepository('Bookshop\\Entities\\Genre')->find($omschrijving);
        return $genre;
    }
    public function getAantalEnGenre($mgr){
        $query = $mgr->createQuery("select g, count(b)as aantal from Bookshop\Entities\Genre g LEFT JOIN Bookshop\Entities\Boek b where b.genre = g.id group by g.id");
        $lijst = $query->getResult();
        return $lijst;
    } 
    
    public function create($omschrijving){
        $bestaandGenre = $this->getByOmschrijving($omschrijving);
        if(isset($bestaandGenre))throw new GenreBestaatException();
        $sql = "insert into mvc_genres (omschrijving) values ('".$omschrijving."')";
        $dbc = new \PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbc->exec($sql);
        $boekId = $dbc->lastInsertId();
        $dbc = null;
        $genreDAO = new GenreDAO();
        $genre = $genreDAO->getById($genreId);
        $genre = Genre::create($genreId, $omschrijving);
        return $genre;
        }
    public function delete($id){
        $sql = "delete from mvc_genres where genre_id=".$id;
        $dbc = new \PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbc->exec($sql);
        $dbc = null;
    }
    
    
}

