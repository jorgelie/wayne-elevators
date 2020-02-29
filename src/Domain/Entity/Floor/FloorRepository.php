<?php

namespace App\Domain\Entity\Floor;

interface FloorRepository
{
    public function findAll();
    public function findById(int $id):Floor;
}