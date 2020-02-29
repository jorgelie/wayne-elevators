<?php

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Domain\Entity\ElevatorCall\ElevatorCall;
use App\Domain\Entity\ElevatorCall\ElevatorCallRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class DoctrineElevatorCallRepository extends ServiceEntityRepository implements ElevatorCallRepository
{
    /**
     * DoctrineElevatorCallRepository constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ElevatorCall::class);
    }

    /**
     * @return array
     */
    public function findAll():array
    {
        return $this->createQueryBuilder('ec')
            ->orderBy('ec.call_time', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
