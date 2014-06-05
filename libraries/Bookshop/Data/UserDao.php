<?php
namespace Bookshop\Data;

use Bookshop\Entities\User;
use Bookshop\Data\PlaatsDao;


class UserDao {
    public function getUserList($mgr){
        $lijst = $mgr->getRepository('Bookshop\\Entities\\User')->findAll();
        return $lijst;
    }
    public function getById($mgr, $id){
        $user = $mgr->getRepository('Bookshop\\Entities\\User')->find($id);
        return $user;
    }
    public function getUserByNaam ($mgr, $naam, $voornaam){
        $user = $mgr->getRepository('Bookshop\\Entities\\User')->findBy(array('naam'=>$naam, 'voornaam'=>$voornaam));
        return $user;
    }
    public function getByMail($mgr, $mail){
        $user = $mgr->getRepository('Bookshop\\Entities\\User')->findBy(array('mail'=>$mail));
        return $user;
    }    
    public function RegisterNewUser($mgr, $naam, $voornaam, $mail, $adres, $postcode, $gemeente, $password){
        $userbestaat = $mgr->getRepository('Bookshop\\Entities\\User')->findOneByMail($mail);
        if (!$userbestaat){
            $plaats = PlaatsDao::voegPlaatsToe($mgr, $postcode, $gemeente);
            $user = new User($plaats, $naam, $voornaam, $mail, $adres, $password);
            $mgr->persist($user);
            $mgr->flush();
            return $user;
        }else {
            return $userbestaat;
        }
        
    }
    public function validateUser($mgr, $mail, $password){
        $user = $mgr->getRepository('Bookshop\\Entities\\User')->findBy(array('mail'=>$mail, 'password'=>$password));
        if($user){
            return $user;
        }else {
            return null;
        }
    }
}