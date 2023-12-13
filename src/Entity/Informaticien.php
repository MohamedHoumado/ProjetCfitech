<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\InformaticienRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InformaticienRepository::class)]
#[ORM\Table(name:"informaticiens")]
#[ApiResource]
class Informaticien
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_informaticien = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom_informaticien = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_naissance = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse_informaticien = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $telephone = null;

    #[ORM\Column]
    private ?int $experience_annee = null;

    #[ORM\Column(length: 255)]
    private ?string $niveau_etude = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $certification = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_embauche = null;

    #[ORM\Column]
    private ?bool $statut = null;

    #[ORM\ManyToOne(inversedBy: 'informaticiens')]
    private ?Service $service = null;

  


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomInformaticien(): ?string
    {
        return $this->nom_informaticien;
    }

    public function setNomInformaticien(string $nom_informaticien): static
    {
        $this->nom_informaticien = $nom_informaticien;

        return $this;
    }

    public function getPrenomInformaticien(): ?string
    {
        return $this->prenom_informaticien;
    }

    public function setPrenomInformaticien(string $prenom_informaticien): static
    {
        $this->prenom_informaticien = $prenom_informaticien;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(\DateTimeInterface $date_naissance): static
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getAdresseInformaticien(): ?string
    {
        return $this->adresse_informaticien;
    }

    public function setAdresseInformaticien(string $adresse_informaticien): static
    {
        $this->adresse_informaticien = $adresse_informaticien;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getExperienceAnnee(): ?int
    {
        return $this->experience_annee;
    }

    public function setExperienceAnnee(int $experience_annee): static
    {
        $this->experience_annee = $experience_annee;

        return $this;
    }

    public function getNiveauEtude(): ?string
    {
        return $this->niveau_etude;
    }

    public function setNiveauEtude(string $niveau_etude): static
    {
        $this->niveau_etude = $niveau_etude;

        return $this;
    }

    public function getCertification(): ?string
    {
        return $this->certification;
    }

    public function setCertification(string $certification): static
    {
        $this->certification = $certification;

        return $this;
    }

    public function getDateEmbauche(): ?\DateTimeInterface
    {
        return $this->date_embauche;
    }

    public function setDateEmbauche(\DateTimeInterface $date_embauche): static
    {
        $this->date_embauche = $date_embauche;

        return $this;
    }

    public function isStatut(): ?bool
    {
        return $this->statut;
    }

    public function setStatut(bool $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getService(): ?Service
    {
        return $this->service;
    }

    public function setService(?Service $service): static
    {
        $this->service = $service;

        return $this;
    }



    
}
