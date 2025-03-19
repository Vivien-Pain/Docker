<?php

namespace App\Entity;

use App\Repository\LegoCollectionRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: LegoCollectionRepository::class)]
class LegoCollection
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    // Propriété pour récupérer tous les Legos d'une collection
    #[ORM\OneToMany(mappedBy: 'collection', targetEntity: Lego::class)]
    private Collection $legos;

    public function __construct()
    {
        $this->legos = new ArrayCollection();  // Initialisation de la collection vide
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    // Méthodes pour accéder aux Legos associés à cette collection

    /**
     * @return Collection<int, Lego>
     */
    public function getLegos(): Collection
    {
        return $this->legos;
    }

    public function addLego(Lego $lego): static
    {
        if (!$this->legos->contains($lego)) {
            $this->legos->add($lego);
            $lego->setCollection($this);  // Associer le Lego à cette collection
        }

        return $this;
    }

    public function removeLego(Lego $lego): static
    {
        if ($this->legos->removeElement($lego)) {
            // Déassocier le Lego de cette collection
            if ($lego->getCollection() === $this) {
                $lego->setCollection(null);
            }
        }

        return $this;
    }
}
