<?php

namespace App\Infrastructe\Service;

abstract class CalculateClosestElevator
{
    public static function calculate($elevators,$position)
    {
        $closest = $elevators[rand(0,sizeof($elevators ) - 1)];
        $closeness = abs($closest->getPosition() - $position);
        foreach ($elevators as $elevator){
            if($closeness == 0)
                break;
            if(abs($elevator->getPosition() - $position) < $closeness){
                $closeness = abs($elevator->getPosition() - $position);
                $closest = $elevator;
            }
        }

        return $closest;
    }
}