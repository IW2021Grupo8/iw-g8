<?php

namespace App\Repository;

use App\Entity\Gang;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Gang|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gang|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gang[]    findAll()
 * @method Gang[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GangRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gang::class);
    }
}
