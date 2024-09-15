<?php

require_once __DIR__ . '/../vendor/autoload.php';

$dbConfig = require_once __DIR__ . '/../config/database.php';
$db = new PDO("mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']}", $dbConfig['user'], $dbConfig['password']);

$livreDAO = new App\Models\LivreDAO($db);
$livreController = new App\Controllers\LivreController($livreDAO);
$homeController = new App\Controllers\HomeController();

$route = $_GET['route'] ?? 'home';

switch ($route) {
    case 'home':
        $homeController->index();
        break;
    case 'livre/create':
        $livreController->create();
        break;
    case 'livre/list':
        $livreController->list();
        break;
    case 'livre/details':
        $id = $_GET['id'] ?? null;
        if ($id !== null) {
            $livreController->details($id);
        } else {
            echo "ID du livre manquant";
        }
        break;
    // Ajoutez d'autres cas ici si nécessaire, en suivant le même modèle
    default:
        // Gérer les erreurs 404
        echo "Page non trouvée";
        break;
}
