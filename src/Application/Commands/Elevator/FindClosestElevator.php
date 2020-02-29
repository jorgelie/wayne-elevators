<?php

namespace App\Application\Commands\Elevator;

use App\Domain\Entity\Elevator\ElevatorRepository;
use App\Domain\Entity\Floor\Floor;
use App\Infrastructe\Service\CalculateClosestElevator;

class FindClosestElevator
{
    private $elevatorRepository;

    /**
     * FindClosestElevator constructor.
     * @param ElevatorRepository $elevatorRepository
     */
    public function __construct(
        ElevatorRepository $elevatorRepository
    )
    {
        $this->elevatorRepository = $elevatorRepository;
    }

    /**
     * @param Floor $originFloor
     * @return mixed
     */
    public function execute(Floor $originFloor)
    {
        $elevators = $this->elevatorRepository->findAll();
        return CalculateClosestElevator::calculate($elevators,$originFloor->getValue());
    }
}