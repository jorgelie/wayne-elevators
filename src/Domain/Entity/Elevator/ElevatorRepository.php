<?php

namespace App\Domain\Entity\Elevator;

interface ElevatorRepository
{
    public function findAll(): array;
    public function findOneById(int $id): Elevator;
    public function updatePosition(Elevator $elevator, int $position): void;
}