<?php

namespace App\Controllers;

class HomeController {
    // public function index() {
    //     require_once 'views/home/index.php';
    // }
    public function index() {
        $viewPath = __DIR__ . '/../../views/home/index.php';
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            echo "Erreur : La vue index.php n'a pas été trouvée.";
        }
    }
}