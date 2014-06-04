<?php
//test.php
require_once 'bootstrap.php';
use Bookshop\Entities\Boek;
$titel = "Pijn";
$prijs = "21.99";
$auteur = "Pieter Aspe";
$genre = $mgr->getRepository('Bookshop\\Entities\\Genre')->find(1);
$boek = new Bookshop\Entities\Boek($titel, $prijs, $auteur, $genre);
$mgr->persist($boek);        
$mgr->flush();
