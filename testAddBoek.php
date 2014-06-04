<?php
require_once 'bootstrap.php';
use Bookshop\Entities\Boek;
$titel = 'De Kansmachine';
$prijs = '19.99';
$auteur = 'Tom Kenis';
$genreId = '8';
$genre = $mgr->getRepository('Bookshop\\Entities\\Genre')->find($genreId);
$boek = new Bookshop\Entities\Boek($titel, $prijs, $auteur, $genre);
$mgr->persist($boek);
$mgr->flush();


