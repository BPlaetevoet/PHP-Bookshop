<?php
namespace Bookshop\Data;
use Bookshop\Entities\Product;
use Bookshop\Entities\Boek;
use Bookshop\Entities\Genre;

class BoekDao{
    public function getAll($mgr){
        $lijst = $mgr->getRepository("Bookshop\\Entities\\Boek")->findAll(); //(*)
        return $lijst;
    }
    public function getById($mgr, $id){
        $boek = $mgr->getRepository('Bookshop\\Entities\\Boek')->find($id);
        return $boek;
    }
    public function getByGenre($mgr, $GenreId){
        $lijst = $mgr->getRepository('Bookshop\\Entities\\Boek')->findBy(array('genre' => $GenreId));
        return $lijst;

        }
    
    public function getByTitel($mgr, $titel){
        $boek = $mgr->getRepository('Bookshop\\Entities\\Boek')->findBy(array('titel' => $titel));
        return $boek;
    }
     
    public function __create($titel, $genreId){
        $bestaandboek = $this->getByTitel($titel);
        if(isset($bestaandboek))throw new TitelBestaatException();
        $sql = "insert into mvc_boeken (titel, prijs, auteur, genre_id) values ('".$titel."', ".$prijs ."', ".$genreId .")";
        $dbc = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbc->exec($sql);
        $boekId = $dbc->lastInsertId();
        $dbc = null;
        $genreDAO = new GenreDAO();
        $genre = $genreDAO->getById($genreId);
        $boek = Boek::create($boekId, $titel, $prijs, $genre);
        return $boek;
        }
    public function delete($id){
        $sql = "delete from mvc_boeken where id=".$id;
        $dbc = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbc->exec($sql);
        $dbc = null;
    }
    public function update($boek){
        $bestaandboek = $this->getByTitel($boek->getTitel());
        if (isset($bestaandboek) && $bestaandboek->getId() != $boek->getId()) throw new TitelBestaatException();
        $sql = "update mvc_boeken set titel='" .$boek->getTitel() ."', prijs=" .$boek->getPrijs() ."', genre_id=" .$boek->getGenre()->getId() ."
            where id=".$boek->getId();
        $dbc = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbc->exec($sql);
        $dbc = null;
    }
}
