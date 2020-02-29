<?php

namespace App\Application\Commands\Movement;

use App\Domain\Entity\Movement\MovementRepository;

class GetAllMovementsByElevator
{
    private $movementRepository;

    /**
     * GetAllMovementsByElevator constructor.
     * @param MovementRepository $movementRepository
     */
    public function __construct(
        MovementRepository $movementRepository
    )
    {
        $this->movementRepository = $movementRepository;
    }

    /**
     * @param $elevator_id
     * @return mixed
     */
    public function execute($elevator_id)
    {
        return $this->movementRepository->findByElevator($elevator_id);
    }
}