<?php

namespace App\Repository;

use App\Entity\Album;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Album|null find($id, $lockMode = null, $lockVersion = null)
 * @method Album|null findOneBy(array $criteria, array $orderBy = null)
 * @method Album[]    findAll()
 * @method Album[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AlbumRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Album::class);
    }

    // /**
    //  * @return Album[] Returns an array of Album objects
    //  */

    public function findByArtist2($query)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.artist = :val')
            ->setParameter('val', $query)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findByArtist($artiste): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT a
            FROM App\Entity\Album a
            WHERE a.artist > :artiste
            ORDER BY p.price ASC'
        )->setParameter('artiste', $artiste);

        // returns an array of album objects
        return $query->getResult();
    }


    /*
    public function findOneBySomeField($value): ?Album
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
