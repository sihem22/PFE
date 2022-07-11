<?php

namespace tuto\BackofficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * demande
 *
 * @ORM\Table(name="demande")
 * @ORM\Entity(repositoryClass="tuto\BackofficeBundle\Repository\DemandeRepository")
 */
class Demande
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateDemande", type="datetime")
     */
    private $dateDemande;

       /**
     
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\User", inversedBy="Demande")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $user;

       /**
     
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\Etat")
     * @ORM\JoinColumn(name="IdEtatDemande", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $etat;

       /**
     
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\Service")
     * @ORM\JoinColumn(name="service_id", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $service;

       /**
     
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\Localite")
     * @ORM\JoinColumn(name="localite_id", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $localite;
     

    
    /**
     * @ORM\OneToMany(targetEntity="tuto\BackofficeBundle\Entity\Proposition", mappedBy="demande")
     */
    private $propositions;


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
     * Set dateDemande
     *
     * @param \DateTime $dateDemande
     *
     * @return demande
     */
    public function setDateDemande($dateDemande)
    {
        $this->dateDemande = $dateDemande;

        return $this;
    }

    /**
     * Get dateDemande
     *
     * @return \DateTime
     */
    public function getDateDemande()
    {
        return $this->dateDemande;
    }

    /**
     * Set user
     *
     * @param \tuto\BackofficeBundle\Entity\User $user
     *
     * @return demande
     */
    public function setUser(\tuto\BackofficeBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \tuto\BackofficeBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set etat
     *
     * @param \tuto\BackofficeBundle\Entity\Etat $etat
     *
     * @return demande
     */
    public function setEtat(\tuto\BackofficeBundle\Entity\Etat $etat = null)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return \tuto\BackofficeBundle\Entity\Etat
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set service
     *
     * @param \tuto\BackofficeBundle\Entity\Service $service
     *
     * @return demande
     */
    public function setService(\tuto\BackofficeBundle\Entity\Service $service = null)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get service
     *
     * @return \tuto\BackofficeBundle\Entity\Service
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * Set localite
     *
     * @param \tuto\BackofficeBundle\Entity\Localite $localite
     *
     * @return demande
     */
    public function setLocalite(\tuto\BackofficeBundle\Entity\Localite $localite = null)
    {
        $this->localite = $localite;

        return $this;
    }

    /**
     * Get localite
     *
     * @return \tuto\BackofficeBundle\Entity\Localite
     */
    public function getLocalite()
    {
        return $this->localite;
    }
 

   
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->propositions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add propositions
     *
     * @param \tuto\BackofficeBundle\Entity\Proposition $propositions
     * @return Demande
     */
    public function addProposition(\tuto\BackofficeBundle\Entity\Proposition $propositions)
    {
        $this->propositions[] = $propositions;

        return $this;
    }

    /**
     * Remove propositions
     *
     * @param \tuto\BackofficeBundle\Entity\Proposition $propositions
     */
    public function removeProposition(\tuto\BackofficeBundle\Entity\Proposition $propositions)
    {
        $this->propositions->removeElement($propositions);
    }

    /**
     * Get propositions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPropositions()
    {
        return $this->propositions;
    }
}
