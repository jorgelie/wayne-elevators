<?php

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Domain\Entity\Elevator\Elevator;
use App\Domain\Entity\ElevatorCall\ElevatorCall;
use App\Domain\Entity\Movement\Movement;
use App\Domain\Entity\Movement\MovementRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\Query\Expr\Join;

class DoctrineMovementRepository extends ServiceEntityRepository implements MovementRepository
{
    private $entityManager;

    /**
     * DoctrineMovementRepository constructor.
     * @param ManagerRegistry $registry
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(ManagerRegistry $registry, EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        parent::__construct($registry, Movement::class);
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        return $this->createQueryBuilder('m')
            ->select('ec.call_time,e.name,m.sequence')
            ->leftJoin(Elevator::class, 'e', Join::WITH, 'e.id = m.elevator_id' )
            ->leftJoin(ElevatorCall::class, 'ec', Join::WITH, 'ec.id = m.elevator_call_id' )
            ->orderBy('ec.call_time,e.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @param Movement $movement
     * @throws \Exception
     */
    public function persist(Movement $movement)
    {
        try {
            $this->entityManager->persist($movement);
            $this->entityManager->flush();
        } catch (ORMException $e) {
            throw new \Exception("Unable to persist Object");
        }
    }

    /**
     * @param int $elevator_id
     * @return mixed
     */
    public function findByElevator(int $elevator_id)
    {
        return $this->createQueryBuilder('m')
            ->select('ec.call_time,e.name,m.sequence')
            ->leftJoin(Elevator::class, 'e', Join::WITH, 'e.id = m.elevator_id' )
            ->leftJoin(ElevatorCall::class, 'ec', Join::WITH, 'ec.id = m.elevator_call_id' )
            ->where("m.elevator_id = :elevator_id")
            ->orderBy('ec.call_time,e.name', 'ASC')
            ->setParameter('elevator_id',$elevator_id)
            ->getQuery()
            ->getResult();
    }
}
