<?php
//test.php
require_once 'bootstrap.php';
use Bookshop\Data\PlaatsDao;
use Bookshop\Data\UserDao;
use Bookshop\Entities\User;
use Bookshop\Data\BoekDao;

$naam = "Plaetevoet";
$voornaam = "Jason";
$mail = "Jason.Plaetevoet@Telenet.be";
$adres = "Dekemelelaan 29";
$password = "wachtwoord";
$postcode = 8904;
$gemeente = "Boezinge";


// $plaats = PlaatsDao::voegPlaatsToe($mgr, $postcode, $gemeente);
// $plaats = $mgr->getrepository('Bookshop\\Entities\\Plaats')->findOneByGemeente($gemeente);

     $newuser = UserDao::RegisterNewUser($mgr, $naam, $voornaam, $mail, $adres, $postcode, $gemeente, $password );
     print '<pre>';
     print_r ($newuser);
     print '<br /> en plaats is<br />';
     print_r($plaats);
    
     print '</pre>';
     
            $mgr->persist($newuser);
     
           // $mgr->flush();
            
            //$user2 = UserDao::GetUserByMail($mgr, $mail);
            //return $user2;


print '<pre>';
print_r ($user);
print '</pre>';
