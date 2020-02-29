<?php

namespace App\Application\Commands\Movement;

use App\Domain\Entity\Elevator\Elevator;
use App\Domain\Entity\ElevatorCall\ElevatorCall;
use App\Domain\Entity\Floor\FloorRepository;
use App\Domain\Entity\Movement\Movement;
use App\Domain\Entity\Movement\MovementRepository;
use App\Infrastructe\Service\CalculateSequence;

class CreateMovement
{
    private $movementRepository;
    private $floorRepository;

    /**
     * CreateMovement constructor.
     * @param MovementRepository $movementRepository
     * @param FloorRepository $floorRepository
     */
    public function __construct(
        MovementRepository $movementRepository,
        FloorRepository $floorRepository
    )
    {
        $this->movementRepository = $movementRepository;
        $this->floorRepository = $floorRepository;
    }

    /**
     * @param Elevator $elevator
     * @param ElevatorCall $elevatorCall
     * @return bool
     * @throws \Exception
     */
    public function execute(Elevator $elevator, ElevatorCall $elevatorCall)
    {
        $originFloor = $this->floorRepository->findById($elevatorCall->getOrigin());
        $destinyFloor = $this->floorRepository->findById($elevatorCall->getDestiny());
        $sequence = CalculateSequence::calculate($elevator,$originFloor,$destinyFloor);

        $movement = new Movement($elevator->getId(),$elevatorCall->getId(),$sequence);
        try {
            $this->movementRepository->persist($movement);
        } catch (\Exception $e){
            throw new \Exception('Unable to create movement');
        }

        return true;
    }
}