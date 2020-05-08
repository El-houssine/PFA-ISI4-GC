<?php

namespace App\Repository;

use App\Entity\FiliereEtudiant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FiliereEtudiant|null find($id, $lockMode = null, $lockVersion = null)
 * @method FiliereEtudiant|null findOneBy(array $criteria, array $orderBy = null)
 * @method FiliereEtudiant[]    findAll()
 * @method FiliereEtudiant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FiliereEtudiantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FiliereEtudiant::class);
    }

    // /**
    //  * @return FiliereEtudiant[] Returns an array of FiliereEtudiant objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FiliereEtudiant
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
