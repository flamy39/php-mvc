<?php

namespace App\Models;

use Doctrine\ORM\Mapping as ORM;
use \DateTime;

#[ORM\Entity(repositoryClass:PostRepository::class)]
#[ORM\Table(name:"post")]

class Post
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type:"integer", name:"id_post")]
    private $id;

    #[ORM\Column(type:"string", length:255, nullable:false, name:"titre_post")]
    private $titre;

    #[ORM\Column(type:"text", nullable:false, name:"contenu_post")]
    private $contenu;

    #[ORM\Column(type:"datetime", nullable:false, name:"date_creation_post")]
    private $createdAt;
   

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    public function getContenu(): string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): void   
    {
        $this->contenu = $contenu;      
    }       

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;  
    }

 }