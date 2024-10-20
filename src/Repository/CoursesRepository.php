<?php

namespace App\Repository;

use App\Entity\Courses;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Courses>
 */
class CoursesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Courses::class);
    }

    /**
     * @return Courses[] Returns an array of Courses objects
     */
    public function Find6CoursesForMainPage(): array
    {
        return $this->createQueryBuilder('c')
            ->orderBy('RAND()')
            ->setMaxResults(6)
            ->getQuery()
            ->getResult()
        ;
    }
}
