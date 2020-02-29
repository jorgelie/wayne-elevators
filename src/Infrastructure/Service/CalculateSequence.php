<?php


namespace App\Infrastructe\Service;

use App\Domain\Entity\Elevator\Elevator;
use App\Domain\Entity\ElevatorCall\ElevatorCall;
use App\Domain\Entity\Floor\Floor;

abstract class CalculateSequence
{
    public static function calculate(Elevator $elevator, Floor $originFloor, Floor $destinyFloor)
    {
        $sequence = '';
        if($elevator->getPosition() != $originFloor->getValue())
        {
            $sequence .= self::mapPositionForSequence($elevator->getPosition()) . '->' . $originFloor->getName() . ' / ';
        }

        $sequence .= $originFloor->getName() . '->' . $destinyFloor->getName();

        return $sequence;
    }

    private static function mapPositionForSequence($value)
    {
        $array = [
            0 => 'PB',
            1 => 'P1',
            2 => 'P2',
            3 => 'P3'
        ];

        return $array[$value];
    }
}