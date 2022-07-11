<?php

namespace tuto\BackofficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DemandeReponse
 *
 * @ORM\Table(name="demande_reponse")
 * @ORM\Entity(repositoryClass="tuto\BackofficeBundle\Repository\DemandeReponseRepository")
 */
class DemandeReponse {

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
     * @ORM\Column(name="reponse", type="text")
     */
    private $reponse;

    /**
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\Demande")
     */
    protected $demande;

     /**
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\Question")
     */
    protected $question;

    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set r�ponse
     *
     * @param string $reponse
     * @return DemandeReponse
     */
    public function setReponse($reponse) {
        $this->reponse = $reponse;

        return $this;
    }

    /**
     * Get r�ponse
     *
     * @return string 
     */
    public function getReponse() {
        return $this->reponse;
    }

    /**
     * Set demande
     *
     * @param \tuto\BackofficeBundle\Entity\Demande $demande
     * @return DemandeReponse
     */
    public function setDemande(\tuto\BackofficeBundle\Entity\Demande $demande = null) {
        $this->demande = $demande;

        return $this;
    }

    /**
     * Get demande
     *
     * @return \tuto\BackofficeBundle\Entity\Demande 
     */
    public function getDemande() {
        return $this->demande;
    }

   



    /**
     * Set question
     *
     * @param \tuto\BackofficeBundle\Entity\Question $question
     * @return DemandeReponse
     */
    public function setQuestion(\tuto\BackofficeBundle\Entity\Question $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \tuto\BackofficeBundle\Entity\Question 
     */
    public function getQuestion()
    {
        return $this->question;
    }
   
}
