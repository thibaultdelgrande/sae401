<?php

namespace App\Entity;

use App\Repository\EscapeGameRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EscapeGameRepository::class)]
class EscapeGame
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TIME_IMMUTABLE)]
    private ?\DateTimeImmutable $duree = null;

    #[ORM\Column]
    private ?int $nombreJoueursMax = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column(length: 255)]
    private ?string $titreFR = null;

    #[ORM\Column(length: 255)]
    private ?string $titreDE = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $descriptionFR = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $descriptionDE = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDuree(): ?\DateTimeImmutable
    {
        return $this->duree;
    }

    public function setDuree(\DateTimeImmutable $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getNombreJoueursMax(): ?int
    {
        return $this->nombreJoueursMax;
    }

    public function setNombreJoueursMax(int $nombreJoueursMax): self
    {
        $this->nombreJoueursMax = $nombreJoueursMax;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getTitreFR(): ?string
    {
        return $this->titreFR;
    }

    public function setTitreFR(string $titreFR): self
    {
        $this->titreFR = $titreFR;

        return $this;
    }

    public function getTitreDE(): ?string
    {
        return $this->titreDE;
    }

    public function setTitreDE(string $titreDE): self
    {
        $this->titreDE = $titreDE;

        return $this;
    }

    public function getDescriptionFR(): ?string
    {
        return $this->descriptionFR;
    }

    public function setDescriptionFR(string $descriptionFR): self
    {
        $this->descriptionFR = $descriptionFR;

        return $this;
    }

    public function getDescriptionDE(): ?string
    {
        return $this->descriptionDE;
    }

    public function setDescriptionDE(string $descriptionDE): self
    {
        $this->descriptionDE = $descriptionDE;

        return $this;
    }
}
