<?php

namespace App\Entity;

use App\Repository\LegoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LegoRepository::class)]
class Lego
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $collection = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column]
    private ?int $pieces = null;

    #[ORM\Column(length: 255)]
    private ?string $boximage = null;

    #[ORM\Column(length: 255)]
    private ?string $legoimage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getCollection(): ?string
    {
        return $this->collection;
    }

    public function setCollection(string $collection): static
    {
        $this->collection = $collection;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getPieces(): ?int
    {
        return $this->pieces;
    }

    public function setPieces(int $pieces): static
    {
        $this->pieces = $pieces;

        return $this;
    }

    public function getBoximage(): ?string
    {
        return $this->boximage;
    }

    public function setBoximage(string $boximage): static
    {
        $this->boximage = $boximage;

        return $this;
    }

    public function getLegoimage(): ?string
    {
        return $this->legoimage;
    }

    public function setLegoimage(string $legoimage): static
    {
        $this->legoimage = $legoimage;

        return $this;
    }
}
