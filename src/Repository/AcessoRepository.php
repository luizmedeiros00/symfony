<?php

namespace App\Repository;

use App\Entity\Acesso;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Acesso|null find($id, $lockMode = null, $lockVersion = null)
 * @method Acesso|null findOneBy(array $criteria, array $orderBy = null)
 * @method Acesso[]    findAll()
 * @method Acesso[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AcessoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Acesso::class);
    }

    // /**
    //  * @return Acesso[] Returns an array of Acesso objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Acesso
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
