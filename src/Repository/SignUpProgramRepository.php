<?php

namespace App\Repository;

use App\Entity\SignUpProgram;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SignUpProgram|null find($id, $lockMode = null, $lockVersion = null)
 * @method SignUpProgram|null findOneBy(array $criteria, array $orderBy = null)
 * @method SignUpProgram[]    findAll()
 * @method SignUpProgram[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SignUpProgramRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SignUpProgram::class);
    }

    // /**
    //  * @return SignUpProgram[] Returns an array of SignUpProgram objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SignUp
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
