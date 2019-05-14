<?php

namespace App\Repository;

use App\Entity\TinyPuppy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TinyPuppy|null find($id, $lockMode = null, $lockVersion = null)
 * @method TinyPuppy|null findOneBy(array $criteria, array $orderBy = null)
 * @method TinyPuppy[]    findAll()
 * @method TinyPuppy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TinyPuppyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TinyPuppy::class);
    }

    // /**
    //  * @return TinyPuppy[] Returns an array of TinyPuppy objects
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
    public function findOneBySomeField($value): ?TinyPuppy
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
