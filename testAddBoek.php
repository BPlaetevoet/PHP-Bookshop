<?php
require_once 'bootstrap.php';
use Bookshop\Entities\Boek;
$titel = 'Zondig hart';
$prijs = '14.50';
$auteur = 'A.W. Bruna';
$omschrijving = '';
$genreId = '1';
$genre = $mgr->getRepository('Bookshop\\Entities\\Genre')->find($genreId);
$boek = new Bookshop\Entities\Boek($titel, $prijs, $auteur, $genre);
print '<pre>';
print_r($genre);
print '<br /> en boek is : <br />';
print_r($boek);
print '</pre>';
$mgr->persist($boek);
$mgr->flush();



