<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\FormationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormationRepository::class)]
#[ORM\Table(name:"formations")]
#[ApiResource]
class Formation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $intitule_formation = null;

    #[ORM\Column(length: 500)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_debut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_fin = null;

    #[ORM\Column]
    private ?int $duree = null;

    #[ORM\Column(length: 255)]
    private ?string $lieu_formation = null;

    #[ORM\Column]
    private ?int $nombre_participants_max = null;

    #[ORM\Column]
    private ?bool $inscription_ouvertes = null;

    #[ORM\OneToMany(mappedBy: 'formation', targetEntity: Stagiaire::class)]
    private Collection $stagiaires;

    public function __construct()
    {
        $this->stagiaires = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntituleFormation(): ?string
    {
        return $this->intitule_formation;
    }

    public function setIntituleFormation(string $intitule_formation): static
    {
        $this->intitule_formation = $intitule_formation;

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

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTimeInterface $date_debut): static
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(\DateTimeInterface $date_fin): static
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): static
    {
        $this->duree = $duree;

        return $this;
    }

    public function getLieuFormation(): ?string
    {
        return $this->lieu_formation;
    }

    public function setLieuFormation(string $lieu_formation): static
    {
        $this->lieu_formation = $lieu_formation;

        return $this;
    }

    public function getNombreParticipantsMax(): ?int
    {
        return $this->nombre_participants_max;
    }

    public function setNombreParticipantsMax(int $nombre_participants_max): static
    {
        $this->nombre_participants_max = $nombre_participants_max;

        return $this;
    }

    public function isInscriptionOuvertes(): ?bool
    {
        return $this->inscription_ouvertes;
    }

    public function setInscriptionOuvertes(bool $inscription_ouvertes): static
    {
        $this->inscription_ouvertes = $inscription_ouvertes;

        return $this;
    }

    /**
     * @return Collection<int, Stagiaire>
     */
    public function getStagiaires(): Collection
    {
        return $this->stagiaires;
    }

    public function addStagiaire(Stagiaire $stagiaire): static
    {
        if (!$this->stagiaires->contains($stagiaire)) {
            $this->stagiaires->add($stagiaire);
            $stagiaire->setFormation($this);
        }

        return $this;
    }

    public function removeStagiaire(Stagiaire $stagiaire): static
    {
        if ($this->stagiaires->removeElement($stagiaire)) {
            // set the owning side to null (unless already changed)
            if ($stagiaire->getFormation() === $this) {
                $stagiaire->setFormation(null);
            }
        }

        return $this;
    }

    



   


}
