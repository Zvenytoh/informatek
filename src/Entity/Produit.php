<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 70)]
    private ?string $libelle = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 50)]
    private ?string $marque = null;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'produitsAdorer')]
    private Collection $userAdorer;

    #[ORM\OneToMany(targetEntity: Vouloir::class, mappedBy: 'produit')]
    private Collection $vouloirs;

    #[ORM\ManyToOne(inversedBy: 'produits')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ProduitType $produitType = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    public function __construct()
    {
        $this->userAdorer = new ArrayCollection();
        $this->vouloirs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

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

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): static
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUserAdorer(): Collection
    {
        return $this->userAdorer;
    }

    public function addUserAdorer(User $userAdorer): static
    {
        if (!$this->userAdorer->contains($userAdorer)) {
            $this->userAdorer->add($userAdorer);
        }

        return $this;
    }

    public function removeUserAdorer(User $userAdorer): static
    {
        $this->userAdorer->removeElement($userAdorer);

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
            $vouloir->setProduit($this);
        }

        return $this;
    }

    public function removeVouloir(Vouloir $vouloir): static
    {
        if ($this->vouloirs->removeElement($vouloir)) {
            // set the owning side to null (unless already changed)
            if ($vouloir->getProduit() === $this) {
                $vouloir->setProduit(null);
            }
        }

        return $this;
    }

    public function getProduitType(): ?ProduitType
    {
        return $this->produitType;
    }

    public function setProduitType(?ProduitType $produitType): static
    {
        $this->produitType = $produitType;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }
}
