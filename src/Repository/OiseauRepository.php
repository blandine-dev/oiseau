<?php

namespace App\Repository;

use App\Entity\Oiseau;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Oiseau|null find($id, $lockMode = null, $lockVersion = null)
 * @method Oiseau|null findOneBy(array $criteria, array $orderBy = null)
 * @method Oiseau[]    findAll()
 * @method Oiseau[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OiseauRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Oiseau::class);
    }

    public function getOiseauxParPropriete($propriete, $signe, $lieu) {
        return $this->createQueryBuilder('o')
        ->andWhere('o.'.$propriete.' ' .$signe. ':val')
        ->setParameter('val', $lieu)
        ->orderBy('o.id', 'DESC')
        ->getQuery()
        ->getResult()
    ;
    }

    // /**
    //  * @return Oiseau[] Returns an array of Oiseau objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Oiseau
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
