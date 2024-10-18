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
    public function findByLevel($n1, $n2 = null, $n3 = null): array
    {
        $db = $this->createQueryBuilder('c')
                   ->join('c.Category', 'n1');
    
        // Handle case for {n1}/{n2}/{n3}
        if ($n3) {
            $db->join('n1.parent', 'n2')
               ->join('n2.parent', 'n3')
               ->andWhere('n3.Slug = :n3Slug')
               ->setParameter('n3Slug', $n3);
        }
        // Handle case for {n1}/{n2}
        elseif ($n2) {
            $db->join('n1.parent', 'n2')
               ->andWhere('n2.Slug = :n2Slug')
               ->setParameter('n2Slug', $n2);
        }
        // Handle case for {n1}
        else {
            $db->andWhere('n1.Slug = :n1Slug')
               ->setParameter('n1Slug', $n1);
        }
    
        return $db->getQuery()->getResult();
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

    //    public function findOneBySomeField($value): ?Courses
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
