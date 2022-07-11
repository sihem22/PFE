<?php

namespace tuto\BackofficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * typeAbonnement
 *
 * @ORM\Table(name="type_abonnement")
 * @ORM\Entity(repositoryClass="tuto\BackofficeBundle\Repository\TypeAbonnementRepository")
 */
class TypeAbonnement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="codeTypeAbonnement", type="string", length=50)
     */
    private $codeTypeAbonnement;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=50)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="duree", type="string", length=50)
     */
    private $duree;

    /**
     * @var string
     *
     * @ORM\Column(name="prix", type="string", length=50)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set codeTypeAbonnement
     *
     * @param string $codeTypeAbonnement
     *
     * @return TypeAbonnement
     */
    public function setCodeTypeAbonnement($codeTypeAbonnement)
    {
        $this->codeTypeAbonnement = $codeTypeAbonnement;

        return $this;
    }

    /**
     * Get codeTypeAbonnement
     *
     * @return string
     */
    public function getCodeTypeAbonnement()
    {
        return $this->codeTypeAbonnement;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return typeAbonnement
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set duree
     *
     * @param string $duree
     *
     * @return typeAbonnement
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return string
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set prix
     *
     * @param string $prix
     *
     * @return TypeAbonnement
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return string
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return TypeAbonnement
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
