<?php

require_once __DIR__.'/../vendor/autoload.php';

use App\Models\Post;

/**
 * @var \Doctrine\ORM\EntityManager $entityManager
 */
$entityManager = require_once __DIR__.'/../config/bootstrap.php';

$postId = 1; // Remplacez par l'ID du post que vous souhaitez supprimer

$post = $entityManager->find(Post::class, $postId);

if ($post) {
    $entityManager->remove($post);
    $entityManager->flush();
    echo "Le post a été supprimé avec succès.";
} else {
    echo "Aucun post trouvé avec l'ID $postId.";
}

