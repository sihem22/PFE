<?php

namespace tuto\BackofficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Misd\PhoneNumberBundle\Validator\Constraints\PhoneNumber as AssertPhoneNumber;

/**
 * proposition
 *
 * @ORM\Table(name="proposition")
 * @ORM\Entity(repositoryClass="tuto\BackofficeBundle\Repository\PropositionRepository")
 */
class Proposition
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
     * @ORM\Column(name="dateProposition", type="datetime" , nullable=true)
     */
    private $dateProposition;

    

   /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     * @Assert\GreaterThan(value=0, message="Please enter an amount higher than 0.")
     */
     
    private $prix;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     * @Assert\GreaterThan(value=0, message="Please enter an amount higher than 0.")
     */
     
    private $fprix;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text" , nullable=true)
     */
    private $message;

   

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateModif", type="datetime", nullable=true)
     */
    private $dateModif;

   

        /**
     
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\User", inversedBy="Proposition")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\Demande", inversedBy="propositions")
     * @ORM\JoinColumn(name="demande_id", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $demande;

        /**
     
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\Etat", inversedBy="Proposition")
     * @ORM\JoinColumn(name="IdEtatProposition", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $etat;
     


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
     * Set dateProposition
     *
     * @param \DateTime $dateProposition
     *
     * @return proposition
     */
    public function setDateProposition($dateProposition)
    {
        $this->dateProposition = $dateProposition;

        return $this;
    }

    /**
     * Get dateProposition
     *
     * @return \DateTime
     */
    public function getDateProposition()
    {
        return $this->dateProposition;
    }

    

    

    


    /**
     * Set prix
     *
     * @param string $prix
     *
     * @return proposition
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
     * Set fprix
     *
     * @param string $fprix
     *
     * @return proposition
     */
    public function setFprix($fprix)
    {
        $this->fprix = $fprix;

        return $this;
    }

    /**
     * Get fprix
     *
     * @return string
     */
    public function getFprix()
    {
        return $this->fprix;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return proposition
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    

   


    

    /**
     * Set dateModif
     *
     * @param \DateTime $dateModif
     *
     * @return proposition
     */
    public function setDateModif($dateModif)
    {
        $this->dateModif = $dateModif;

        return $this;
    }

    /**
     * Get dateModif
     *
     * @return \DateTime
     */
    public function getDateModif()
    {
        return $this->dateModif;
    }

    

    /**
     * Set user
     *
     * @param \tuto\BackofficeBundle\Entity\User $user
     *
     * @return proposition
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
     * Set demande
     *
     * @param \tuto\BackofficeBundle\Entity\Demande $demande
     *
     * @return proposition
     */
    public function setDemande(\tuto\BackofficeBundle\Entity\Demande $demande = null)
    {
        $this->demande = $demande;

        return $this;
    }

    /**
     * Get demande
     *
     * @return \tuto\BackofficeBundle\Entity\Demande
     */
    public function getDemande()
    {
        return $this->demande;
    }

    /**
     * Set etat
     *
     * @param \tuto\BackofficeBundle\Entity\Etat $etat
     *
     * @return proposition
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

}
