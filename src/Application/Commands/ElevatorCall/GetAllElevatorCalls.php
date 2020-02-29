<?php

namespace App\Application\Commands\ElevatorCall;

use App\Domain\Entity\ElevatorCall\ElevatorCallRepository;

class GetAllElevatorCalls
{
    private $elevatorCallRepository;

    /**
     * GetAllElevatorCalls constructor.
     * @param ElevatorCallRepository $elevatorCallRepository
     */
    public function __construct(
        ElevatorCallRepository $elevatorCallRepository
    )
    {
        $this->elevatorCallRepository = $elevatorCallRepository;
    }

    /**
     * @return array
     */
    public function execute():array
    {
        return $this->elevatorCallRepository->findAll();
    }
}