<?php
require_once 'bootstrap.php';
use Bookshop\Entities\Film;
$titel = 'Iron Man 3';
$prijs = '19.5';
$speelduur = '100';
$genreId = '10';
$genre = $mgr->getRepository('Bookshop\\Entities\\Genre')->find($genreId);
$film = new Bookshop\Entities\Film($titel, $prijs, $speelduur, $genre);
$mgr->persist($film);
$mgr->flush();


