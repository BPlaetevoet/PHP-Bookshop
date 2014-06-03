<?php
//bootstrap.php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

//referentie naar autoload.php (aangemaakt door composer)
require_once 'vendor/autoload.php';

$isDevMode = true;
$paths = array(__DIR__.'/libraries/Bookshop/Entities/', __DIR__.'/libraries/Bookshop/Business/');
$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$loader = new Twig_Loader_Filesystem("libraries/Bookshop/Presentation");
$twig = new Twig_Environment($loader);
/* SQL logger */
//$logger = new Doctrine\DBAL\Logging\EchoSQLLogger();
// $config->setSQLLogger($logger);

$conn = array(
    'driver'=>'pdo_mysql',
    'user'=>'cursusgebruiker',
    'password'=>'cursuspwd',
    'dbname'=>'bookshop'
);

// de entitymanager aanmaken
$mgr = EntityManager::create($conn, $config);