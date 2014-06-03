<?php
namespace Bookshop\Business;

require_once 'Bookshop/Data/userdao.clas.php';

use Bookshop\Data\userdao;


class userService {
    public function getUserList(){
        $dao = new \userdao();
        $lijst = $dao->getUserList();
        return $lijst;
    }
    public function getUserById($id){
        $dao = new \userdao;
        $user = $dao->getUserById($id);
        return $user;
    }
    public function getUserByNaam($naam, $voornaam){
        $dao = new \userdao();
        $user = $dao->getUserByNaam($naam, $voornaam);
        return $user;
    }
    public function getUserByMail($mail){
        $dao = new \userdao();
        $user = $dao->getUserByMail($mail);
        return $user;
    }
    public function RegisterNewUser($naam, $voornaam, $mail, $adres, $plaats){
        $dao = new \userdao();
        $dao->RegisterNewUser($naam, $voornaam, $mail, $adres, $plaats);
    }
    public static function validateUser($mail, $paswoord){
        $dao = new \userdao();
        $user = $dao->getUserByMail($mail);
        if ($user){
            if ($user->getPassword == $paswoord){
                return true;
            }
            else return false;
        } else {
            return false;
        }
    }
}

?>
