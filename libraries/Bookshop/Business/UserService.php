<?php
namespace Bookshop\Business;


use Bookshop\Data\UserDao;


class UserService {
    public function getUserList($mgr){
        $lijst = UserDao::getUserList($mgr);
        return $lijst;
    }
    public function getUserById($mgr, $id){
        $user = UserDao::getById($mgr, $id);
        return $user;
    }
    public function getUserByNaam($mgr, $naam, $voornaam){
        $user = UserDao::getUserByNaam($mgr, $naam, $voornaam);
        return $user;
    }
    public function getUserByMail($mgr, $mail){
        $user = UserDao::getUserByMail($mgr, $mail);
        return $user;
    }
    public function RegisterNewUser($mgr, $naam, $voornaam, $mail, $adres, $postcode, $gemeente, $password){
        $user = UserDao::RegisterNewUser($mgr, $naam, $voornaam, $mail, $adres, $postcode, $gemeente, $password);
        return $user;        
    }
    public static function validateUser($mgr, $mail, $password){
        $user = UserDao::validateUser($mgr, $mail, $password);
        return $user;
    }
}

?>
