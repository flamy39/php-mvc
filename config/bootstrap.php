<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\Tools\Setup;
use Doctrine\DBAL\DriverManager;
// Chargement automatique des classes via Composer
require_once __DIR__ . '/../vendor/autoload.php';


// Configuration pour les entités
$isDevMode = true;
$paths = [__DIR__ . '/../src/Models']; // Chemin vers les entités
$config = ORMSetup::createAttributeMetadataConfiguration($paths, $isDevMode);

// Paramètres de connexion à la base de données
$connParams = [
    'driver' => 'pdo_mysql',
    'user' => 'root',
    'password' => '',
    'dbname' => 'db_posts_2024',
    'host' => 'localhost'
];

try {
    $conn = DriverManager::getConnection($connParams, $config);
} catch (Exception $e) {
    echo $e->getMessage();
}



// Création de l'EntityManager
$entityManager = new EntityManager($conn, $config);

// Retourne l'EntityManager pour être utilisé dans d'autres parties de l'application
return $entityManager;