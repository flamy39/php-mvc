<?php


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;

// Inclure ton fichier de bootstrap

/**
 * @var EntityManager $entityManager
 */
echo __DIR__;
$entityManager = require_once __DIR__.'/../config/bootstrap.php';

return ConsoleRunner::run(new SingleManagerProvider($entityManager));