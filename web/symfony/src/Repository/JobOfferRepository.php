<?php

namespace App\Repository;

use App\Entity\JobOffer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method JobOffer|null find($id, $lockMode = null, $lockVersion = null)
 * @method JobOffer|null findOneBy(array $criteria, array $orderBy = null)
 * @method JobOffer[]    findAll()
 * @method JobOffer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobOfferRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JobOffer::class);
    }

    public function all(int $page, int $itemPerPage, array $filters) {
        $query = $this->createQueryBuilder('jo');
        $query->orderBy('jo.publicationDate', 'DESC');
        $query->setMaxResults($itemPerPage);
        $query->setFirstResult($itemPerPage * ($page - 1));

        $query->andWhere('jo.deleted = :deleted');
        $query->setParameter('deleted', 0);

        if (true === isset($filters['q'])) {
            $query->andWhere('jo.name LIKE :q OR jo.description LIKE :q');
            $query->setParameter('q', '%' . trim($filters['q']) . '%');
        }

        return $query->getQuery()->getResult();
    }
}
