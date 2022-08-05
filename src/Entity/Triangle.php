<?php

namespace App\Entity;

use App\Repository\TriangleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TriangleRepository::class)]
class Triangle extends Shape
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $a = null;

    #[ORM\Column(nullable: true)]
    private ?float $b = null;

    #[ORM\Column(nullable: true)]
    private ?float $c = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getA(): ?float
    {
        return $this->a;
    }

    public function setA(float $a): self
    {
        $this->a = $a;

        return $this;
    }

    public function getB(): ?float
    {
        return $this->b;
    }

    public function setB(?float $b): self
    {
        $this->b = $b;

        return $this;
    }

    public function getC(): ?float
    {
        return $this->c;
    }

    public function setC(?float $c): self
    {
        $this->c = $c;

        return $this;
    }

    public function getSurface()
    {
        if ($this->a < 0 or $this->b < 0 or
            $this->c < 0 or ($this->a + $this->b <= $this->c) or
            $this->a + $this->c <= $this->b or $this->b + $this->c <= $this->a)
        {
            echo "Not a valid triangle";
            exit(0);
        }
        $s = ($this->a + $this->b + $this->c) / 2;
        return sqrt($s * ($s - $this->a) *
            ($s - $this->b) * ($s - $this->c));
    }

    public function getCircumference()
    {
        return $this->a + $this->b + $this->c;
    }
}
