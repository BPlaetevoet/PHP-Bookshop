<?php
//test.php
require_once 'bootstrap.php';
use Bookshop\Data\PlaatsDao;
use Bookshop\Data\UserDao;
use Bookshop\Entities\User;
use Bookshop\Data\BoekDao;

$naam = "Diaz";
$voornaam = "Cameron";
$mail = "Cameron.Diaz@Telenet.be";
$adres = "Hollywood Blvd 23";
$password = "wachtwoord";
$postcode = 1000;
$gemeente = "Brussel";


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
print_r ($newuser);
print '</pre>';