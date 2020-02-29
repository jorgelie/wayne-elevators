<?php

namespace App\Application\Commands\Elevator;

use App\Domain\Entity\Elevator\ElevatorRepository;

class GetAllElevators
{
    private $elevatorRepository;

    /**
     * GetAllElevators constructor.
     * @param ElevatorRepository $elevatorRepository
     */
    public function __construct(
        ElevatorRepository $elevatorRepository
    )
    {
        $this->elevatorRepository = $elevatorRepository;
    }

    /**
     * @return array
     */
    public function execute():array
    {
        return $this->elevatorRepository->findAll();
    }
}