<?php

namespace App\Entity;

use App\Repository\EmpruntRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\User;

#[ORM\Entity(repositoryClass: EmpruntRepository::class)]
class Emprunt
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateEmprunt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateRetourPrevu = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateRetourReel = null;

    #[ORM\Column(length: 255)]
    private ?string $etat = null;

    #[ORM\ManyToOne(inversedBy: 'emprunts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?user $appUser = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateEmprunt(): ?\DateTimeInterface
    {
        return $this->dateEmprunt;
    }

    public function setDateEmprunt(\DateTimeInterface $dateEmprunt): static
    {
        $this->dateEmprunt = $dateEmprunt;

        return $this;
    }

    public function getDateRetourPrevu(): ?\DateTimeInterface
    {
        return $this->dateRetourPrevu;
    }

    public function setDateRetourPrevu(\DateTimeInterface $dateRetourPrevu): static
    {
        $this->dateRetourPrevu = $dateRetourPrevu;

        return $this;
    }

    public function getDateRetourReel(): ?\DateTimeInterface
    {
        return $this->dateRetourReel;
    }

    public function setDateRetourReel(?\DateTimeInterface $dateRetourReel): static
    {
        $this->dateRetourReel = $dateRetourReel;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): static
    {
        $this->etat = $etat;

        return $this;
    }

    public function getAppUser(): ?User
    {
        return $this->appUser;
    }

    public function setAppUser(?user $appUser): static
    {
        $this->appUser = $appUser;

        return $this;
    }
}
