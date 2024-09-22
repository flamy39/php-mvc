<?php

require_once __DIR__.'/../vendor/autoload.php';

use App\Models\Post;

/**
 * @var \Doctrine\ORM\EntityManager $entityManager
 */
$entityManager = require_once __DIR__.'/../config/bootstrap.php';

// Récupérer tous les posts
$posts = $entityManager->getRepository(Post::class)->findAll();

/** @var Post $post */
foreach ($posts as $post) {
    echo $post->getTitre() . "\n";

}   

// Rechercher un post par son id
$post = $entityManager->getRepository(Post::class)->find(2);
echo $post->getTitre() . "\n";

// Rechercher un post par son titre
$post = $entityManager->getRepository(Post::class)->findOneBy(['titre' => 'Mon premier post']);
if (!$post) {
    echo "Aucun post trouvé avec le titre 'Mon premier post'.";
} else {
    echo $post->getTitre() . "\n";
}

// Rechercher tous les posts dont la date de création est inférieure à une date donnée
// Utiliser le Créateur de requête
echo "Posts créés avant le 21 septembre 2024 :\n";
$dateLimite = new \DateTime('2024-09-22');
$posts = $entityManager->getRepository(Post::class)->createQueryBuilder('p')
    ->where('p.createdAt < :dateLimite')
    ->setParameter('dateLimite', $dateLimite)
    ->getQuery()
    ->getResult();
/** @var Post $post */
foreach ($posts as $post) {
    echo $post->getTitre() . "\n";
}

// Rechercher tous les posts datant de moins de 15 jours
echo "Posts datant de moins de 15 jours :\n";
$dateLimite = new \DateTime('-15 days');
$posts = $entityManager->getRepository(Post::class)->createQueryBuilder('p')
    ->where('p.createdAt > :dateLimite')
    ->setParameter('dateLimite', $dateLimite)
    ->getQuery()
    ->getResult();
/** @var Post $post */
foreach ($posts as $post) {
    echo $post->getTitre() . "\n";
}


// Rechercher tous les posts dont la date de création est inférieure à une date donnée
// Utiliser le DQL
echo "Posts créés avant le 21 septembre 2024 :\n";
$dateLimite = new \DateTime('2024-09-22');
$posts = $entityManager->createQuery('SELECT p FROM App\Models\Post p WHERE p.createdAt < :dateLimite')
    ->setParameter('dateLimite', $dateLimite)
    ->getResult();
/** @var Post $post */
foreach ($posts as $post) {
    echo $post->getTitre() . "\n";
}   

// Rechercher les 3 posts les plus récents
echo "Les 3 posts les plus récents :\n";
$posts = $entityManager->getRepository(Post::class)->createQueryBuilder('p')
    ->orderBy('p.createdAt', 'DESC')
    ->setMaxResults(3)
    ->getQuery()
    ->getResult();
/** @var Post $post */
foreach ($posts as $post) {
    echo $post->getTitre() . "\n";
}


// Recherhcher les posts par ordre de date de création
echo "Les posts par ordre de date de création :\n";
/**
 * @var PostRepository $postRepository
 */
$postRepository = $entityManager->getRepository(Post::class);
$posts = $postRepository->findAllOrderedByDate();
/** @var Post $post */
foreach ($posts as $post) {
    echo $post->getTitre() . "\n";
}


