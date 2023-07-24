<?php

namespace App\Repository;

use App\Entity\Category;
use App\Entity\Paint;
use Doctrine\Bundle\DoctrineBundle\Repository\LazyServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 *
 *
 * @method Paint|null find($id, $lockMode = null, $lockVersion = null)
 * @method Paint|null findOneBy(array $criteria, array $orderBy = null)
 * @method Paint[]    findAll()
 * @method Paint[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PaintRepository extends LazyServiceEntityRepository
{
    /**
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Paint::class);
    }

    /**
     * @param Paint $entity
     * @param bool $flush
     * @return void
     */
    public function save(Paint $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @param Paint $entity
     * @param bool $flush
     * @return void
     */
    public function remove(Paint $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @param Category|null $category
     * @return Query
     */
    public function findForPagination(?Category $category = null): Query
    {
        $qb = $this->createQueryBuilder('a')
            ->orderBy('a.paintName', 'DESC');

        if ($category) {
            $qb->leftJoin('a.category', 'c')
                ->where($qb->expr()->eq('c.id', ':id'))
                ->setParameter('id', $category->getId());
        }

        return $qb->getQuery();
    }

}

   /* public function paginatioQuery()
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
        ;
    }*/

//    public function findOneBySomeField($value): ?Paint
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

