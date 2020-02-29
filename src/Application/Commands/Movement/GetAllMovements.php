<?php

namespace App\Application\Commands\Movement;

use App\Domain\Entity\Movement\MovementRepository;

class GetAllMovements
{
    private $movementRepository;

    /**
     * GetAllMovements constructor.
     * @param MovementRepository $movementRepository
     */
    public function __construct(
        MovementRepository $movementRepository
    )
    {
        $this->movementRepository = $movementRepository;
    }

    /**
     * @return mixed
     */
    public function execute()
    {
        return $this->movementRepository->findAll();
    }
}