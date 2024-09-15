<?php

namespace App\Models;

use PDO;

class LivreDAO {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function create(Livre $livre): bool {
        $stmt = $this->db->prepare("INSERT INTO livre (titre, nombre_pages, auteur) VALUES (:titre, :nombre_pages, :auteur)");
        return $stmt->execute([
            ':titre' => $livre->getTitre(),
            ':nombre_pages' => $livre->getNombrePages(),
            ':auteur' => $livre->getAuteur()
        ]);
    }

    public function getAll(): array {
        $stmt = $this->db->query("SELECT * FROM livre");
        $livres = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $livre = new Livre();
            $livre->setId($row['id']);
            $livre->setTitre($row['titre']);
            $livre->setNombrePages($row['nombre_pages']);
            $livre->setAuteur($row['auteur']);
            $livres[] = $livre;
        }
        return $livres;
    }

    public function getById(int $id): ?Livre {
        $stmt = $this->db->prepare("SELECT * FROM livre WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $livre = new Livre();
            $livre->setId($row['id']);
            $livre->setTitre($row['titre']);
            $livre->setNombrePages($row['nombre_pages']);
            $livre->setAuteur($row['auteur']);
            return $livre;
        }
        return null;
    }
}