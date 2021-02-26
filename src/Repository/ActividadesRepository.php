<?php

namespace App\Repository;

use App\Entity\Actividades;
use Doctrine\Persistence\ManagerRegistry;
use \Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Actividades|null find($id, $lockMode = null, $lockVersion = null)
 * @method Actividades|null findOneBy(array $criteria, array $orderBy = null)
 * @method Actividades[]    findAll()
 * @method Actividades[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActividadesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Actividades::class);
    }

    public function findAllActive(){
        return $this->getEntityManager()
            ->createQuery(
                "SELECT o FROM App:Actividades o ORDER BY o.fecha ASC"
            )
            ->getResult();
    }
    
    public function findActividadesFromUsuario($log_name){
        $query = $this->getEntityManager()
                ->createQuery(
                        'SELECT o, c FROM App:Actividades o'
                        . 'JOIN o.categoria c'
                        . 'WHERE e.nombre = :nombre'
                        )->setParameter('nombre', $log_name);
        return $query->getResult();
    }
    
    
    // /**
    //  * @return Actividades[] Returns an array of Actividades objects
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
    public function findOneBySomeField($value): ?Actividades
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
