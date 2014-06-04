<?php
namespace Bookshop\Business;


use Bookshop\Data\UserDao;


class userService {
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
    public function RegisterNewUser($mgr, $naam, $voornaam, $mail, $adres, $password, $postcode, $gemeente){
        $user = UserDao::RegisterNewUser($mgr, $naam, $voornaam, $mail, $adres, $password, $postcode, $gemeente);
    }
    public static function validateUser($mail, $paswoord){
        $user = UserDao::validateUser($mgr, $mail, $password);
        return $user;
    }
}

?>
