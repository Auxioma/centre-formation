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

    /**
     * find the lession with the given level
     * n1/n2/n3
     * n1/n2
     * n1.
     */
    public function findByLevel(string $n1, ?string $n2 = null, ?string $n3 = null): array
    {
        $db = $this->createQueryBuilder('c');

        // Si n1, n2 et n3 sont définis et non null
        if (null !== $n1 && null !== $n2 && null !== $n3) {
            $db->andWhere('c.Slug = :n3')
                ->setParameter('n3', $n3);
        }

        // Si n1 et n2 sont définis et non null
        elseif (null !== $n1 && null !== $n2) {
            $db->andWhere('c.Slug = :n2')
                ->setParameter('n2', $n2)
            ;
        }
        // Si seulement n1 est défini et non null
        elseif (null !== $n1) {
            $db->andWhere('c.Slug = :n1')
                ->setParameter('n1', $n1)
            ;
        }

        return $db->getQuery()->getResult();
    }
}
