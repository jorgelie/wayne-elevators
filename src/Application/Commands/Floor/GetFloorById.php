<?php

namespace App\Application\Commands\Floor;

use App\Domain\Entity\Floor\Floor;
use App\Domain\Entity\Floor\FloorRepository;

class GetFloorById
{
    private $floorRepository;

    /**
     * GetFloorById constructor.
     * @param FloorRepository $floorRepository
     */
    public function __construct(
        FloorRepository $floorRepository
    )
    {
        $this->floorRepository = $floorRepository;
    }

    /**
     * @param int $id
     * @return Floor
     */
    public function execute(int $id):Floor
    {
        return $this->floorRepository->findById($id);
    }
}