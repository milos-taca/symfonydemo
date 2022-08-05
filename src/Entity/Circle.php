<?php

namespace App\Entity;

use App\Repository\CircleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CircleRepository::class)]
class Circle extends Shape
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?float $radius = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRadius(): ?float
    {
        return $this->radius;
    }

    public function setRadius(?float $radius): self
    {
        $this->radius = $radius;

        return $this;
    }

    public function getSurface()
    {
        return $this->radius * $this->radius * pi();
    }

    public function getCircumference()
    {
        return $this->radius * 2 * pi();
    }
}
