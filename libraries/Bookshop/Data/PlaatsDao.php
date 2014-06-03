<?php
namespace Bookshop\Data;

require_once 'libraries/Bookshop/Data/dbconfig.class.php';
require_once 'libraries/Bookshop/Entities/Plaats.class.php';

use Bookshop\Data\DBConfig;
use Bookshop\Entities\Plaats;

class PlaatsDao{
    public function getAll(){
        $lijst = array();
        $dbc = new \PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select id, postcode, gemeente from mvc_plaatsen ";
        $resultset = $dbc->query($sql);
        foreach($resultset as $rij){
            $plaats = Plaats::create($rij["id"], $rij["postcode"], $rij["gemeente"]);
            array_push($lijst, $plaats);
        }
        $dbc = null;
        return $lijst;
    }
    public function getPlaatsById($id){
        $dbc = new \PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql ="select id, postcode, gemeente from mvc_plaatsen where id=".$id ;
        $resultset = $dbc->query($sql);
        $rij = $resultset->fetch();
        if (!$rij){
            return null;
        }else {
            $plaats = Plaats::create($rij["id"], $rij["postcode"], $rij["gemeente"]);
            $dbc = null;
            return $plaats;
        }
        
    }
    public function getByPostcode($postcode){
        $dbc = new \PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select id, postcode, gemeente from mvc_plaatsen where postcode ='" .$postcode ."'";
        $resultset = $dbc->query($sql);
        $rij = $resultset->fetch();
        if (!$rij){
            return null;
        }else{
            $plaats = Plaats::create($rij["id"], $rij["postcode"], $rij["gemeente"]);
            $dbc = null;
            return $plaats;
        }
    }
    public function getByGemeente($gemeente){
        $dbc = new \PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select id, postcode, gemeente from mvc_plaatsen where gemeente ='" .$gemeente ."'";
        $resultset = $dbc->query($sql);
        $rij = $resultset->fetch();
        if (!$rij){
            return null;
        }else{
            $plaats = Plaats::create($rij["id"], $rij["postcode"], $rij["gemeente"]);
            $dbc = null;
            return $plaats;
        }
    }
    public function __create($postcode, $gemeente){
        $GemeenteBestaat = $this->getByGemeente($gemeente);
        if (isset($GemeenteBestaat)) throw new GemeenteBestaatAlException();
        $sql = "insert into mvc_plaatsen (postcode, gemeente) values ('".$postcode."',".$gemeente ."')";
        $dbc = new \PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbc->exec($sql);
        $plaatsId = $dbc->lastInsertId();
        $dbc = null;
        $plaatsDao = new PlaatsDao();
        $plaats = $plaatsDao->getPlaatsById($id);
        $plaats = Plaats::create($id, $postcode, $gemeente);
        return $plaats;
    }
}