<?php
namespace Bookshop\Data;

use Bookshop\Entities\User;
use Bookshop\Entities\Plaats;


class UserDao {
    public function getUserList($mgr){
        $lijst = $mgr->getRepository('Bookshop\\Entities\\User')->findAll();
        return $lijst;
    }
    public function getUserById($mgr, $id){
        $user = $mgr->getRepository('Bookshop\\Entities\\User')->find($id);
    }
    public function getUserByNaam ($mgr, $naam, $voornaam){
        $user = $mgr->getRepository('Bookshop\\Entities\\User')->findBy(array("naam"=>$naam, "voornaam"=>$voornaam));
        return $user;
    }
    public function getUserByMail($mgr, $mail){
        $user = $mgr->getRepository('Bookshop\\Entities\\User')->findBy(array("mail"=>$mail));
        return $user;
    }    
    public function RegisterNewUser($mgr, $naam, $voornaam, $mail, $adres, $postcode, $gemeente, $password){
        $plaats = PlaatsDao::voegPlaatsToe($mgr, $postcode, $gemeente);
        $user = new User($naam, $voornaam, $mail, $adres, $password, 0, $plaats);
        $mgr->persist($user);
        $mgr->flush();
    }
    public function validateUser($mgr, $mail, $password){
        $user = $mgr->getRepository('Bookshop\\Entities\\User')->findBy(array("mail"=>$mail, "password"=>$password));
        if (!$user){
            return null;
            exit;
        }
        return $user;
    }
}