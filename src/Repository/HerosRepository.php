<?php

namespace App\Repository;

use App\Entity\Heros;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Heros|null find($id, $lockMode = null, $lockVersion = null)
 * @method Heros|null findOneBy(array $criteria, array $orderBy = null)
 * @method Heros[]    findAll()
 * @method Heros[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HerosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Heros::class);
    }

    // /**
    //  * @return Heros[] Returns an array of Heros objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Heros
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
