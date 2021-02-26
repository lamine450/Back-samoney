<?php

namespace App\Repository;

use App\Entity\TypeTransactionClient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeTransactionClient|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeTransactionClient|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeTransactionClient[]    findAll()
 * @method TypeTransactionClient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeTransactionClientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeTransactionClient::class);
    }

    // /**
    //  * @return TypeTransactionClient[] Returns an array of TypeTransactionClient objects
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
    public function findOneBySomeField($value): ?TypeTransactionClient
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
