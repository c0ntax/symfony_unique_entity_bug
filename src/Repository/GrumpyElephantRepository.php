<?php

namespace App\Repository;

use App\Entity\GrumpyElephant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method GrumpyElephant|null find($id, $lockMode = null, $lockVersion = null)
 * @method GrumpyElephant|null findOneBy(array $criteria, array $orderBy = null)
 * @method GrumpyElephant[]    findAll()
 * @method GrumpyElephant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GrumpyElephantRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GrumpyElephant::class);
    }

    // /**
    //  * @return GrumpyElephant[] Returns an array of GrumpyElephant objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GrumpyElephant
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
