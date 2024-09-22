<?php

namespace App\Models;

use Doctrine\ORM\EntityRepository;

class PostRepository extends EntityRepository
{
    public function findAllOrderedByDate(): array
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
}

