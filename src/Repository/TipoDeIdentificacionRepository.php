<?php

namespace App\Repository;

use App\Entity\TipoDeIdentificacion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TipoDeIdentificacion|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoDeIdentificacion|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoDeIdentificacion[]    findAll()
 * @method TipoDeIdentificacion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoDeIdentificacionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TipoDeIdentificacion::class);
    }

    // /**
    //  * @return TipoDeIdentificacion[] Returns an array of TipoDeIdentificacion objects
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
    public function findOneBySomeField($value): ?TipoDeIdentificacion
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
