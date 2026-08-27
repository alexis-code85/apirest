<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\StagiaireRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: StagiaireRepository::class)]
#[ApiResource(normalizationContext: ['groups' => ['get_stagiaires_info']])]
class Stagiaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['get_stagiaires_info'])]
    private ?int $id = null;
    
    #[ORM\Column(length: 255)]
    #[Groups(['get_stagiaires_info'])]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    #[Groups(['get_stagiaires_info'])]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    #[Groups(['get_stagiaires_info'])]
    private ?string $dateNaissance = null;

    #[ORM\ManyToOne(inversedBy: 'stagiaires')]
    private ?Formation $formation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaissance(): ?string
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(string $dateNaissance): static
    {
        $this->dateNaissance = $dateNaissance;

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
