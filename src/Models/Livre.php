<?php

namespace App\Models;

class Livre {
    private int $id;
    private string $titre;
    private int $nombrePages;
    private string $auteur;

    public function getId(): int {
        return $this->id;
    }

    public function getTitre(): string {
        return $this->titre;
    }

    public function setTitre(string $titre): void {
        $this->titre = $titre;
    }

    public function getNombrePages(): int {
        return $this->nombrePages;
    }

    public function setNombrePages(int $nombrePages): void {
        $this->nombrePages = $nombrePages;
    }

    public function getAuteur(): string {
        return $this->auteur;
    }

    public function setAuteur(string $auteur): void {
        $this->auteur = $auteur;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

}