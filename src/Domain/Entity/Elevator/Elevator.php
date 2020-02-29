<?php

namespace App\Domain\Entity\Elevator;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DoctrineElevatorRepository")
 */
class Elevator
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $position;

    /**
     * Elevator constructor.
     * @param string $name
     * @param int $position
     */
    public function __construct(
        string $name,
        int $position = 0
    )
    {
        $this->name = $name;
        $this->position = $position;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;
        return $this;
    }

    /**
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}
