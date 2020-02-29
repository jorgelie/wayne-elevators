<?php

namespace App\Domain\Entity\ElevatorCall;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ElevatorCallRepository")
 */
class ElevatorCall
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $call_time;

    /**
     * @ORM\Column(type="integer")
     */
    private $origin;

    /**
     * @ORM\Column(type="integer")
     */
    private $destiny;

    /**
     * ElevatorCall constructor.
     * @param $call_time
     * @param int $origin
     * @param int $destiny
     */
    public function __construct(
        $call_time,
        int $origin,
        int $destiny
    )
    {
        $this->call_time = $call_time;
        $this->origin = $origin;
        $this->destiny = $destiny;
    }

    /**
     * @return int
     */
    public function getOrigin():int
    {
        return $this->origin;
    }

    /**
     * @return int
     */
    public function getDestiny():int
    {
        return $this->destiny;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}
