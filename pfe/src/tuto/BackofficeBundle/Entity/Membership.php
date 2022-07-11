<?php

namespace tuto\BackofficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * membership
 *
 * @ORM\Table(name="membership")
 * @ORM\Entity(repositoryClass="tuto\BackofficeBundle\Repository\MembershipRepository")
 */
class Membership
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
     * @ORM\Column(name="dateDebut", type="date")
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFin", type="date")
     */
    private $dateFin;

    /**
     * @var string
     *
     * @ORM\Column(name="creerPar", type="string", length=50)
     */
    private $creerPar;

    /**
     * @var string
     *
     * @ORM\Column(name="totalPoints", type="string", length=50)
     */
    private $totalPoints;

        /**
     
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\User", inversedBy="Membership")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $user;

        /**
     
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\Etat", inversedBy="Membership")
     * @ORM\JoinColumn(name="etat_id", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $etat;

        /**
     
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\TypeAbonnement", inversedBy="Membership")
     * @ORM\JoinColumn(name="typeAbonnement_id", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $typeAbonnement;


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
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return membership
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return membership
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set creerPar
     *
     * @param string $creerPar
     *
     * @return membership
     */
    public function setCreerPar($creerPar)
    {
        $this->creerPar = $creerPar;

        return $this;
    }

    /**
     * Get creerPar
     *
     * @return string
     */
    public function getCreerPar()
    {
        return $this->creerPar;
    }

    /**
     * Set totalPoints
     *
     * @param string $totalPoints
     *
     * @return membership
     */
    public function setTotalPoints($totalPoints)
    {
        $this->totalPoints = $totalPoints;

        return $this;
    }

    /**
     * Get totalPoints
     *
     * @return string
     */
    public function getTotalPoints()
    {
        return $this->totalPoints;
    }

    /**
     * Set user
     *
     * @param \tuto\BackofficeBundle\Entity\User $user
     *
     * @return membership
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
     * @param \tuto\BackofficeBundle\Entity\etat $etat
     *
     * @return membership
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
     * Set typeAbonnement
     *
     * @param \tuto\BackofficeBundle\Entity\TypeAbonnement $TypeAbonnement
     *
     * @return membership
     */
    public function setTypeAbonnement(\tuto\BackofficeBundle\Entity\TypeAbonnement $TypeAbonnement = null)
    {
        $this->TypeAbonnement = $TypeAbonnement;

        return $this;
    }

    /**
     * Get typeAbonnement
     *
     * @return \tuto\BackofficeBundle\Entity\TypeAbonnement
     */
    public function getTypeAbonnement()
    {
        return $this->typeAbonnement;
    }
}
