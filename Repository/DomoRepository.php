<?php

namespace Interactions\FormBundle\Repository;

use Interactions\FormBundle\Entity\Domo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Domo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Domo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Domo[]    findAll()
 * @method Domo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DomoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Domo::class);
    }

//    /**
//     * @return Domo[] Returns an array of Domo objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Domo
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
