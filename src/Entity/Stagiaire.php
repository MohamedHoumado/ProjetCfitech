<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\StagiaireRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StagiaireRepository::class)]
#[ORM\Table(name:"stagiaires")]
#[ApiResource]
class Stagiaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_stagiaire = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom_stagiaire = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_naissance = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $telephone = null;

    #[ORM\Column(length: 255)]
    private ?string $niveau_etude = null;

    #[ORM\Column(length: 255)]
    private ?string $numero_national_stagiaire = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_inscription = null;

    #[ORM\Column(length: 255)]
    private ?string $compte_bancaire_stagiaire = null;

    #[ORM\ManyToOne(inversedBy: 'stagiaires')]
    private ?Formation $formation = null;

  


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomStagiaire(): ?string
    {
        return $this->nom_stagiaire;
    }

    public function setNomStagiaire(string $nom_stagiaire): static
    {
        $this->nom_stagiaire = $nom_stagiaire;

        return $this;
    }

    public function getPrenomStagiaire(): ?string
    {
        return $this->prenom_stagiaire;
    }

    public function setPrenomStagiaire(string $prenom_stagiaire): static
    {
        $this->prenom_stagiaire = $prenom_stagiaire;

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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

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

    public function getNiveauEtude(): ?string
    {
        return $this->niveau_etude;
    }

    public function setNiveauEtude(string $niveau_etude): static
    {
        $this->niveau_etude = $niveau_etude;

        return $this;
    }

    public function getNumeroNationalStagiaire(): ?string
    {
        return $this->numero_national_stagiaire;
    }

    public function setNumeroNationalStagiaire(string $numero_national_stagiaire): static
    {
        $this->numero_national_stagiaire = $numero_national_stagiaire;

        return $this;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->date_inscription;
    }

    public function setDateInscription(\DateTimeInterface $date_inscription): static
    {
        $this->date_inscription = $date_inscription;

        return $this;
    }

    public function getCompteBancaireStagiaire(): ?string
    {
        return $this->compte_bancaire_stagiaire;
    }

    public function setCompteBancaireStagiaire(string $compte_bancaire_stagiaire): static
    {
        $this->compte_bancaire_stagiaire = $compte_bancaire_stagiaire;

        return $this;
    }

    public function getFormation(): ?Formation
    {
        return $this->formation;
    }

    public function setFormation(?Formation $formation): static
    {
        $this->formation = $formation;

        return $this;
    }



}
