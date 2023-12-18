<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiceRepository::class)]
#[ORM\Table(name: "services")]
#[ApiResource]
class Service
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_service = null;

    #[ORM\Column(length: 255)]
    private ?string $description_service = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_creation = null;

    #[ORM\Column]
    private ?int $effectif_max = null;

    #[ORM\Column]
    private ?bool $statut_actif = null;

    #[ORM\OneToMany(mappedBy: 'service', targetEntity: Informaticien::class)]
    private Collection $informaticiens;

    public function __construct()
    {
        $this->informaticiens = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->nom_service;
    }






    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomService(): ?string
    {
        return $this->nom_service;
    }

    public function setNomService(string $nom_service): static
    {
        $this->nom_service = $nom_service;

        return $this;
    }

    public function getDescriptionService(): ?string
    {
        return $this->description_service;
    }

    public function setDescriptionService(string $description_service): static
    {
        $this->description_service = $description_service;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->date_creation;
    }

    public function setDateCreation(\DateTimeInterface $date_creation): static
    {
        $this->date_creation = $date_creation;

        return $this;
    }

    public function getEffectifMax(): ?int
    {
        return $this->effectif_max;
    }

    public function setEffectifMax(int $effectif_max): static
    {
        $this->effectif_max = $effectif_max;

        return $this;
    }

    public function isStatutActif(): ?bool
    {
        return $this->statut_actif;
    }

    public function setStatutActif(bool $statut_actif): static
    {
        $this->statut_actif = $statut_actif;

        return $this;
    }

    /**
     * @return Collection<int, Informaticien>
     */
    public function getInformaticiens(): Collection
    {
        return $this->informaticiens;
    }

    public function addInformaticien(Informaticien $informaticien): static
    {
        if (!$this->informaticiens->contains($informaticien)) {
            $this->informaticiens->add($informaticien);
            $informaticien->setService($this);
        }

        return $this;
    }

    public function removeInformaticien(Informaticien $informaticien): static
    {
        if ($this->informaticiens->removeElement($informaticien)) {
            // set the owning side to null (unless already changed)
            if ($informaticien->getService() === $this) {
                $informaticien->setService(null);
            }
        }

        return $this;
    }




}
