<?php

namespace App\Domain\Entity\ElevatorCall;

interface ElevatorCallRepository
{
    public function findAll():array;
}