<?php

namespace App\Repository;

use App\Entity\TypeDeTransaction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeDeTransaction|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeDeTransaction|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeDeTransaction[]    findAll()
 * @method TypeDeTransaction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeDeTransactionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeDeTransaction::class);
    }

    // /**
    //  * @return TypeDeTransaction[] Returns an array of TypeDeTransaction objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeDeTransaction
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
