<?php

namespace App\Repository;

use App\Entity\Machinery;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Machinery|null find($id, $lockMode = null, $lockVersion = null)
 * @method Machinery|null findOneBy(array $criteria, array $orderBy = null)
 * @method Machinery[]    findAll()
 * @method Machinery[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MachineryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Machinery::class);
    }
}
