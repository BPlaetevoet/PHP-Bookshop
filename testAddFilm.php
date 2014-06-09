<?php
require_once 'bootstrap.php';
use Bookshop\Entities\Film;
$titel = 'City of Angels';
$prijs = '12.95';
$speelduur = '120';
$genreId = '15';
$genre = $mgr->getRepository('Bookshop\\Entities\\Genre')->find($genreId);
$film = new Bookshop\Entities\Film($titel, $prijs, $speelduur, $genre);
$mgr->persist($film);
$mgr->flush();


