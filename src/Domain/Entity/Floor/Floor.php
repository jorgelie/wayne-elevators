<?php

namespace App\Domain\Entity\Floor;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DoctrineFloorRepository")
 */
class Floor
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
    private $value;

    /**
     * Floor constructor.
     * @param string $name
     * @param int $value
     */
    public function __construct(
        string $name,
        int $value
    )
    {
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getValue():int
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getName():string
    {
        return $this->name;
    }

}
