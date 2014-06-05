<?php
require_once 'bootstrap.php';
use Bookshop\Entities\Boek;
$titel = 'De Kansmachine';
$prijs = '19.99';
$auteur = 'Tom Kenis';
$omschrijving = 'komedie';
$genreId = '8';
$genre = $mgr->getRepository('Bookshop\\Entities\\Genre')->find($genreId);
$boek = new Bookshop\Entities\Boek($titel, $prijs, $auteur, $genre);
print '<pre>';
print_r($genre);
print '<br /> en boek is : <br />';
print_r($boek);
print '</pre>';
$mgr->persist($boek);



