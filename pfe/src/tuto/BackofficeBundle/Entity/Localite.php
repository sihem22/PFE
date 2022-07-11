<?php

namespace tuto\BackofficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Localite
 *
 * @ORM\Table(name="localite")
 * @ORM\Entity(repositoryClass="tuto\BackofficeBundle\Repository\LocaliteRepository")
 */
class Localite
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
     * @ORM\Column(name="Libelle", type="string", length=100)
     */
    private $libelle;

    /**
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\Delegation", inversedBy="Localite")
     * @ORM\JoinColumn(name="Delegation_id", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $Delegation;

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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Localite
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
     * Set delegation
     *
     * @param \tuto\BackofficeBundle\Entity\Delegation $delegation
     *
     * @return Localite
     */
 public function setDelegation(\tuto\BackofficeBundle\Entity\Delegation $delegation = null)
    {
        $this->Delegation = $delegation;

        return $this;
    }

    /**
     * Get delegation
     *
     * @return \tuto\BackofficeBundle\Entity\Delegation
     */
    public function getDelegation()
    {
        return $this->Delegation;
    }
    public function __toString() {
        return $this->libelle;
    }

}
