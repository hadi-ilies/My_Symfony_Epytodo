<?php

namespace App\Repository;

use App\Entity\UserHasTask;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UserHasTask|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserHasTask|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserHasTask[]    findAll()
 * @method UserHasTask[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserHasTaskRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UserHasTask::class);
    }

//    /**
//     * @return UserHasTask[] Returns an array of UserHasTask objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserHasTask
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
