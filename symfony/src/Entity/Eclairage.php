<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EclairageRepository")
 */
class Eclairage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private $eclairageId;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $localisation;

    /**
     * @ORM\Column(type="boolean")
     */
    private $capteurDefautAmpoule;

    /**
     * @ORM\Column(type="integer")
     */
    private $capteurLuminosite;

    /**
     * @ORM\Column(type="boolean")
     */
    private $statut;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Jardin", inversedBy="")
     * @ORM\JoinColumn(name="jardin", referencedColumnName="jardin_id", nullable=false)
     */
    private $jardin;



    public function getEclairageId(): ?int
    {
        return $this->eclairageId;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getCapteurDefautAmpoule(): ?bool
    {
        return $this->capteurDefautAmpoule;
    }

    public function setCapteurDefautAmpoule(bool $capteurDefautAmpoule): self
    {
        $this->capteurDefautAmpoule = $capteurDefautAmpoule;

        return $this;
    }

    public function getCapteurLuminosite(): ?int
    {
        return $this->capteurLuminosite;
    }

    public function setCapteurLuminosite(int $capteurLuminosite): self
    {
        $this->capteurLuminosite = $capteurLuminosite;

        return $this;
    }

    public function getStatut(): ?bool
    {
        return $this->statut;
    }

    public function setStatut(bool $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getJardin(): ?Jardin
    {
        return $this->jardin;
    }

    public function setJardin(?Jardin $jardin): self
    {
        $this->jardin = $jardin;

        return $this;
    }
}
