<?php

namespace App\Domain\Entity\Movement;

interface MovementRepository
{
    public function findAll();
    public function findByElevator(int $elevator_id);
    public function persist(Movement $movement);
}