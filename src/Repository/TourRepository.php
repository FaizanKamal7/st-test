<?php

namespace App\Repository;

use App\Entity\Tour;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Tour>
 */
class TourRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tour::class);
    }

       /**
        * @return Tour[] Returns an array of Tour objects
        */
       public function getLastThreeTour(): array
       {
           return $this->createQueryBuilder('t')
               ->orderBy('t.endDate', 'ASC')
               ->setMaxResults(3)
               ->getQuery()
               ->getResult()
           ;
       }

}
