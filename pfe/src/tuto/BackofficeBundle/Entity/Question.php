<?php

namespace tuto\BackofficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="question")
 * @ORM\Entity(repositoryClass="tuto\BackofficeBundle\Repository\QuestionRepository")
 */
class Question {

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
     * @ORM\Column(name="Libelle", type="string", length=150)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="TypeQuestion", type="string", length=150)
     */
    protected $TypeQuestion;


    /**
     
     * @ORM\OrderBy({"ordre" = "asc"})
     * @ORM\ManyToMany(targetEntity="tuto\BackofficeBundle\Entity\ValeursDefault")
     
     */
    protected $ValeursDefault;
    
    
    
    /**
    * @ORM\OneToMany(targetEntity="tuto\BackofficeBundle\Entity\QuestionService", mappedBy="Question")
    */
    protected $questionservices;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Question
     */
    public function setLibelle($libelle) {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle() {
        return $this->libelle;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->Service = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add Service
     *
     * @param \tuto\BackofficeBundle\Entity\Service $service
     * @return Question
     */
    public function addService(\tuto\BackofficeBundle\Entity\Service $service) {
        $this->Service[] = $service;

        return $this;
    }

    /**
     * Remove Service
     *
     * @param \tuto\BackofficeBundle\Entity\Service $service
     */
    public function removeService(\tuto\BackofficeBundle\Entity\Service $service) {
        $this->Service->removeElement($service);
    }

    /**
     * Get Service
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getService() {
        return $this->Service;
    }

    /**
     * Add ValeursDefault
     *
     * @param \tuto\BackofficeBundle\Entity\ValeursDefault $valeursDefault
     * @return Question
     */
    public function addValeursDefault(\tuto\BackofficeBundle\Entity\ValeursDefault $valeursDefault) {
        $this->ValeursDefault[] = $valeursDefault;

        return $this;
    }

    /**
     * Remove ValeursDefault
     *
     * @param \tuto\BackofficeBundle\Entity\ValeursDefault $valeursDefault
     */
    public function removeValeursDefault(\tuto\BackofficeBundle\Entity\ValeursDefault $valeursDefault) {
        $this->ValeursDefault->removeElement($valeursDefault);
    }

    /**
     * Get ValeursDefault
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getValeursDefault() {
        return $this->ValeursDefault;
    }

    /**
     * Set TypeQuestion
     *
     * @param string $typeQuestion
     * @return Question
     */
    public function setTypeQuestion($typeQuestion) {
        $this->TypeQuestion = $typeQuestion;

        return $this;
    }

    /**
     * Get TypeQuestion
     *
     * @return string 
     */
    public function getTypeQuestion() {
        return $this->TypeQuestion;
    }


    /**
     * Set questionservices
     *
     * @param \tuto\BackofficeBundle\Entity\QuestionService $questionservices
     * @return Question
     */
    public function setQuestionservices(\tuto\BackofficeBundle\Entity\QuestionService $questionservices = null)
    {
        $this->questionservices = $questionservices;

        return $this;
    }

    /**
     * Get questionservices
     *
     * @return \tuto\BackofficeBundle\Entity\QuestionService 
     */
    public function getQuestionservices()
    {
        return $this->questionservices;
    }
     public function __toString() {
        return $this->libelle;
    }

   
    /**
     * Add questionservices
     *
     * @param \tuto\BackofficeBundle\Entity\QuestionService $questionservices
     * @return Question
     */
    public function addQuestionservice(\tuto\BackofficeBundle\Entity\QuestionService $questionservices)
    {
        $this->questionservices[] = $questionservices;

        return $this;
    }

    /**
     * Remove questionservices
     *
     * @param \tuto\BackofficeBundle\Entity\QuestionService $questionservices
     */
    public function removeQuestionservice(\tuto\BackofficeBundle\Entity\QuestionService $questionservices)
    {
        $this->questionservices->removeElement($questionservices);
    }
}
