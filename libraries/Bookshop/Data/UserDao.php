<?php
namespace Bookshop\Data;

use Bookshop\Entities\User;
use Bookshop\Entities\Plaats;


class UserDao {
    public function getUserList(){
        $lijst = array();
        $dbc = new \PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select id, naam, voornaam, mail, adres, plaats, postcode, gemeente from mvc_users a1, mvc_plaatsen a2 where a1.plaats = a2.id";
        $resultset = $dbc->query($sql);
        foreach ($resultset as $rij){
            $plaats = Plaats::__create($rij["plaats"], $rij["postcode"], $rij["gemeente"]);
            $user = User::__construct($rij["id"], $rij["naam"], $rij["voornaam"], $rij["mail"], $rij["adres"], $plaats);
            array_push($lijst, $user);                    
        }
        $dbc = null;
        return $lijst;
    }
    public function getUserById($id){
        $dbc = new \PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select id, naam, voornaam, mail, adres, plaats, isadmin, password, postcode, gemeente from mvc_users a1, mvc_plaatsen a2 where a1.plaats = a2.id and id=".$id;
        $resultset = $dbc->query($sql);
        $rij = $resultset->fetch();
        $plaats = Plaats::__create($rij["plaats"], $rij["postcode"], $rij["gemeente"]);
        $user = User::__construct($rij["id"], $rij["naam"], $rij["voornaam"], $rij["mail"], $rij["adres"], $rij["isadmin"], $rij["password"], $plaats);
        $dbc = null;
        return $user;
    }
    public function getUserByNaam ($naam, $voornaam){
        $dbc = new \PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select id, naam, voornaam, mail, adres, isadmin, password, plaats, postcode, gemeente from mvc_users a1, mvc_plaatsen a2 where a1.plaats = a2.id and naam =".$naam." and voornaam=".$voornaam ;
        $result = $dbc->query($sql);
        if ($result){
           $plaats = Plaats::__create($rij["plaats"], $rij["postcode"], $rij["gemeente"]);
            $user = User::__construct($rij["id"], $rij["naam"], $rij["voornaam"], $rij["mail"], $rij["adres"], $rij["isadmin"], $rij["password"], $plaats);
        }else {
            $user = null;
        }
        $dbc = null;
        return $user;
    }
    public function getUserByMail($mail){
        $dbc = new \PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select id, naam, voornaam, mail, adres, isadmin, password, plaats, postcode, gemeente from mvc_users a1, mvc_plaatsen a2
            where a1.plaats = a2.id and mail =".$mail;
        $result = $dbc->query($sql);
        if ($result){
            $plaats = Plaats::__create($rij["plaats"], $rij["postcode"], $rij["gemeente"]);
            $user = User::__construct($rij["id"], $rij["naam"], $rij["voornaam"], $rij["mail"], $rij["adres"], $rij["isadmin"], $rij["password"], $plaats);
        }else {
            $user = null;
        }
        $dbc = null;
        return $user;
        
    }    
    public function RegisterNewUser($naam, $voornaam, $mail, $adres, $plaats, $password){
        $userBestaat = $this->getByMail($mail);
        if(isset($userBestaat))throw new UserBestaatException();
        $sql = "insert into mvc_users (naam, voornaam, mail, adres, plaats, password) values ('" .$naam. "', ".$voornaam. "', ".$mail. "', ".$adres. "', ".$plaats."', ".$password."')";
        $dbc = new \PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbc->exec($sql);
    }
    public function deleteUser($id){
        $sql = "delete from mvc_users where id=".$id;
        $dbc = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbc->exec($sql);
        $dbc = null;
    }
    public function updateUser($id,$naam, $voornaam, $mail, $adres, $plaats, $isadmin, $password){
        $sql = "update mvc_users set naam= $naam , voornaam = $voornaam , mail= $mail , adres= $adres, plaats= $plaats, isadmin= $isadmin, password= $password where id= $id";
        $dbc = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbc->exec($sql);
        $dbc = null;
    }
}

?>
