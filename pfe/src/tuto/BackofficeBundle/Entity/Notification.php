<?php

namespace tuto\BackofficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * notification
 *
 * @ORM\Table(name="notification")
 * @ORM\Entity(repositoryClass="tuto\BackofficeBundle\Repository\NotificationRepository")
 */
class Notification
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
     * @ORM\Column(name="dateNotif", type="datetime")
     */
    private $dateNotif;

       /**
     
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\User", inversedBy="Notification")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $user;

       /**
     
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\Demande", inversedBy="Notification")
     * @ORM\JoinColumn(name="demande_id", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $demande;
      /**
     
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\Proposition", inversedBy="Notification")
     * @ORM\JoinColumn(name="proposition_id", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $proposition;
    
    
      /**
     * @var boolean
     *
     * @ORM\Column(name="lu", type="boolean")
     */
    private $lu;
    
    


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
     * Set dateNotif
     *
     * @param datetime $dateNotif
     *
     * @return notification
     */
    public function setDateNotif($dateNotif)
    {
        $this->dateNotif = $dateNotif;

        return $this;
    }

    /**
     * Get dateNotif
     *
     * @return datetime
     */
    public function getDateNotif()
    {
        return $this->dateNotif;
    }

    /**
     * Set user
     *
     * @param \tuto\BackofficeBundle\Entity\User $user
     *
     * @return notification
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
     * @return notification
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
     * Set lu
     *
     * @param \boolean $lu
     * @return Notification
     */
    public function setLu( $lu)
    {
        $this->lu = $lu;

        return $this;
    }

    /**
     * Get lu
     *
     * @return \boolean 
     */
    public function getLu()
    {
        return $this->lu;
    }

    

    /**
     * Set proposition
     *
     * @param \tuto\BackofficeBundle\Entity\Proposition $proposition
     * @return Notification
     */
    public function setProposition(\tuto\BackofficeBundle\Entity\Proposition $proposition = null)
    {
        $this->proposition = $proposition;

        return $this;
    }

    /**
     * Get proposition
     *
     * @return \tuto\BackofficeBundle\Entity\Proposition 
     */
    public function getProposition()
    {
        return $this->proposition;
    }
}
