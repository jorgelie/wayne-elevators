<?php

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Domain\Entity\Elevator\Elevator;
use App\Domain\Entity\Elevator\ElevatorRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\ORMException;

class DoctrineElevatorRepository extends ServiceEntityRepository implements ElevatorRepository
{
    private $entityManager;

    /**
     * DoctrineElevatorRepository constructor.
     * @param ManagerRegistry $registry
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(ManagerRegistry $registry, EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        parent::__construct($registry, Elevator::class);
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        return $this->createQueryBuilder('e')
            ->orderBy('e.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @param int $id
     * @return Elevator
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findOneById(int $id): Elevator
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @param Elevator $elevator
     * @param int $position
     * @throws \Exception
     */
    public function updatePosition(Elevator $elevator, int $position): void
    {
        $elevator->setPosition($position);

        try {
            $this->entityManager->persist($elevator);
            $this->entityManager->flush();
        } catch (ORMException $e) {
            throw new \Exception("Unable to persist Object");
        }
    }

}
