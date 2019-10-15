<?php
namespace App\Entity;

/* Doctrine */
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
     * @ORM\Column(name="nom", type="string", length=45)
     */
    private $nom;

    /**
     * @ORM\Column(name="localisation", type="string", length=45)
     */
    private $localisation;

    /**
     * @ORM\Column(name="capteur_defaut_ampoule", type="boolean")
     */
    private $capteurDefautAmpoule;

    /**
     * @ORM\Column(name="capteur_luminosite", type="float")
     */
    private $capteurLuminosite;

    /**
     * @ORM\Column(name="statut", type="boolean")
     */
    private $statut;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Jardin", inversedBy="")
     * @ORM\JoinColumn(name="jardin", referencedColumnName="jardin_id", nullable=true)
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
