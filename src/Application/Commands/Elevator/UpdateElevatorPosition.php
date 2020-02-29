<?php

namespace App\Application\Commands\Elevator;

use App\Domain\Entity\Elevator\Elevator;
use App\Domain\Entity\Elevator\ElevatorRepository;
use App\Domain\Entity\Floor\FloorRepository;

class UpdateElevatorPosition
{
    private $elevatorRepository;
    private $floorRepository;

    /**
     * UpdateElevatorPosition constructor.
     * @param ElevatorRepository $elevatorRepository
     * @param FloorRepository $floorRepository
     */
    public function __construct(
        ElevatorRepository $elevatorRepository,
        FloorRepository $floorRepository
    )
    {
        $this->elevatorRepository = $elevatorRepository;
        $this->floorRepository = $floorRepository;
    }

    /**
     * @param Elevator $elevator
     * @param int $position
     * @throws \Exception
     */
    public function execute(Elevator $elevator, int $position)
    {
        $floor = $this->floorRepository->findById($position);
        try{
            $this->elevatorRepository->updatePosition($elevator,$floor->getValue());
        } catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }
}