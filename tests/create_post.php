<?php

require_once __DIR__.'/../vendor/autoload.php';

use App\Models\Post;

/**
 * @var \Doctrine\ORM\EntityManager $entityManager
 */
$entityManager = require_once __DIR__.'/../config/bootstrap.php';

$post = new Post();
$post->setTitre('Mon premier post');
$post->setContenu('Contenu du premier post');
$post->setCreatedAt(new \DateTime());

$entityManager->persist($post);
$entityManager->flush();