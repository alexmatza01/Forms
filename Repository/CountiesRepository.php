<?php

namespace Interactions\ValidationBundle\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Interactions\FormBundle\Entity\Counties;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Counties|null find($id, $lockMode = null, $lockVersion = null)
 * @method Counties|null findOneBy(array $criteria, array $orderBy = null)
 * @method Counties[]    findAll()
 * @method Counties[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CountiesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Counties::class);
    }

//    /**
//     * @return Counties[] Returns an array of Counties objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Counties
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
