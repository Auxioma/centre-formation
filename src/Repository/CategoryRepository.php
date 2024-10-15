<?php

namespace App\Repository;

use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Category>
 */
class CategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Category::class);
    }

    /**
     * Get the top 6 most popular categories at level 3.
     *
     * @return array
     */
    public function findTopLevel3Categories(): array
    {
        return $this->createQueryBuilder('c')
        ->leftJoin('c.parent', 'p')
        ->leftJoin('p.parent', 'pp') // Jointure sur le grand-parent
        ->andWhere('p IS NOT NULL')  // Niveau 2: parent existe
        ->andWhere('pp IS NOT NULL') // Niveau 3: parent du parent existe
        ->orderBy('pp.popular', 'DESC')
        ->setMaxResults(6)
        ->getQuery()
        ->getResult();
    }
}
