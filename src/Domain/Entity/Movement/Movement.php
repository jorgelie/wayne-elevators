<?php

namespace App\Domain\Entity\Movement;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DoctrineMovementRepository")
 */
class Movement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $elevator_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $elevator_call_id;

    /**
     * @ORM\Column(type="string")
     */
    private $sequence;

    /**
     * Movement constructor.
     * @param int $elevator_id
     * @param int $elevator_call_id
     * @param string $sequence
     */
    public function __construct(
        int $elevator_id,
        int $elevator_call_id,
        string $sequence
    )
    {
        $this->elevator_id = $elevator_id;
        $this->elevator_call_id = $elevator_call_id;
        $this->sequence = $sequence;
    }
}
