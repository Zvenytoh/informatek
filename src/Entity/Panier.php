<?php

namespace App\Entity;

use App\Repository\PanierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PanierRepository::class)]
class Panier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $datePanier = null;

    #[ORM\OneToMany(targetEntity: Vouloir::class, mappedBy: 'panier')]
    private Collection $vouloirs;

    #[ORM\OneToOne(mappedBy: 'panier', cascade: ['persist', 'remove'])]
    private ?User $user = null;

    public function __construct()
    {
        $this->vouloirs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatePanier(): ?\DateTimeInterface
    {
        return $this->datePanier;
    }

    public function setDatePanier(?\DateTimeInterface $datePanier): static
    {
        $this->datePanier = $datePanier;

        return $this;
    }

    /**
     * @return Collection<int, Vouloir>
     */
    public function getVouloirs(): Collection
    {
        return $this->vouloirs;
    }

    public function addVouloir(Vouloir $vouloir): static
    {
        if (!$this->vouloirs->contains($vouloir)) {
            $this->vouloirs->add($vouloir);
            $vouloir->setPanier($this);
        }

        return $this;
    }

    public function removeVouloir(Vouloir $vouloir): static
    {
        if ($this->vouloirs->removeElement($vouloir)) {
            // set the owning side to null (unless already changed)
            if ($vouloir->getPanier() === $this) {
                $vouloir->setPanier(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        // unset the owning side of the relation if necessary
        if ($user === null && $this->user !== null) {
            $this->user->setPanier(null);
        }

        // set the owning side of the relation if necessary
        if ($user !== null && $user->getPanier() !== $this) {
            $user->setPanier($this);
        }

        $this->user = $user;

        return $this;
    }
}
