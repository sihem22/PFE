<?php

namespace tuto\BackofficeBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Delegation
 *
 * @ORM\Table(name="delegation")
 * @ORM\Entity(repositoryClass="tuto\BackofficeBundle\Repository\DelegationRepository")
 */
class Delegation 
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
     * @ORM\Column(name="Libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="text")
     */
    private $description;
    
   /**
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\Gouvernorat", inversedBy="Delegation")
     * @ORM\JoinColumn(name="Gouvernorat_id", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $Gouvernorat;
    
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
     * @return Delegation
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
     * Set description
     *
     * @param string $description
     *
     * @return Delegation
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

    /**
     * Set gouvernorat
     *
     * @param \tuto\BackofficeBundle\Entity\Gouvernorat $gouvernorat
     *
     * @return Delegation
     */
 public function setDelegation(\tuto\BackofficeBundle\Entity\Delegation $delegation = null)
    {
        $this->Gouvernorat = $gouvernorat;

        return $this;
    }


    /**
     * Get gouvernorat
     *
     * @return \tuto\BackofficeBundle\Entity\Gouvernorat
     */
    public function getGouvernorat()
    {
        return $this->Gouvernorat;
    }

    /**
     * Set Gouvernorat
     *
     * @param \tuto\BackofficeBundle\Entity\Gouvernorat $gouvernorat
     * @return Delegation
     */
    public function setGouvernorat(\tuto\BackofficeBundle\Entity\Gouvernorat $gouvernorat = null)
    {
        $this->Gouvernorat = $gouvernorat;

        return $this;
    }
    
public function __toString() {
        return $this->libelle;
    }

}
