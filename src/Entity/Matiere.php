<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\MatiereRepository")
 */
class Matiere
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomMatiere;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Professeur", inversedBy="matieres")
     */
    private $prefesseur;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Projet", mappedBy="matiere")
     */
    private $projets;

    public function __construct()
    {
        $this->prefesseur = new ArrayCollection();
        $this->projets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMatiere(): ?string
    {
        return $this->nomMatiere;
    }

    public function setNomMatiere(string $nomMatiere): self
    {
        $this->nomMatiere = $nomMatiere;

        return $this;
    }

    /**
     * @return Collection|Professeur[]
     */
    public function getPrefesseur(): Collection
    {
        return $this->prefesseur;
    }

    public function addPrefesseur(Professeur $prefesseur): self
    {
        if (!$this->prefesseur->contains($prefesseur)) {
            $this->prefesseur[] = $prefesseur;
        }

        return $this;
    }

    public function removePrefesseur(Professeur $prefesseur): self
    {
        if ($this->prefesseur->contains($prefesseur)) {
            $this->prefesseur->removeElement($prefesseur);
        }

        return $this;
    }

    /**
     * @return Collection|Projet[]
     */
    public function getProjets(): Collection
    {
        return $this->projets;
    }

    public function addProjet(Projet $projet): self
    {
        if (!$this->projets->contains($projet)) {
            $this->projets[] = $projet;
            $projet->setMatiere($this);
        }

        return $this;
    }

    public function removeProjet(Projet $projet): self
    {
        if ($this->projets->contains($projet)) {
            $this->projets->removeElement($projet);
            // set the owning side to null (unless already changed)
            if ($projet->getMatiere() === $this) {
                $projet->setMatiere(null);
            }
        }

        return $this;
    }
}
