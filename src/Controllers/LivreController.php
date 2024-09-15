<?php

namespace App\Controllers;

use App\Models\LivreDAO;
use App\Models\Livre;

class LivreController {
    private $livreDAO;

    public function __construct(LivreDAO $livreDAO) {
        $this->livreDAO = $livreDAO;
    }

    public function index() {
        $livres = $this->livreDAO->getAll();
        require __DIR__.'/../../views/livre/list.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $livre = new Livre();
            $livre->setTitre($_POST['titre']);
            $livre->setAuteur($_POST['auteur']);
            $livre->setNombrePages($_POST['nombre_pages']);

            if ($this->livreDAO->create($livre)) {
                echo "Creation du livre";
                
                header('Location: index.php?route=livre/list');
                
            } else {
                // Gérer l'erreur
                echo "Erreur lors de la création du livre";
            }
        } else {
            require __DIR__.'/../../views/livre/create.php';
        }
    }

    public function list() {
        $livres = $this->livreDAO->getAll();
        require __DIR__.'/../../views/livre/list.php';
    }

    public function details($id) {
        $livre = $this->livreDAO->getById($id);
        if ($livre) {
            require __DIR__.'/../../views/livre/details.php';
        } else {
            // Gérer le cas où le livre n'est pas trouvé
            header("HTTP/1.0 404 Not Found");
            echo "Livre non trouvé";
        }
    }
}