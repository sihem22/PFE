<?php

namespace tuto\BackofficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuestionService
 *
 * @ORM\Table(name="question_service")
 * @ORM\Entity(repositoryClass="tuto\BackofficeBundle\Repository\QuestionServiceRepository")
 */
class QuestionService {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="ordre", type="integer")
     */
    private $ordre;

    /**

     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\Question", inversedBy="QuestionService")
     */
    protected $question;

    /**
     
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\Service", inversedBy="QuestionService")
     */
    protected $service;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set ordre
     *
     * @param integer $ordre
     * @return QuestionService
     */
    public function setOrdre($ordre) {
        $this->ordre = $ordre;

        return $this;
    }

    /**
     * Get ordre
     *
     * @return integer 
     */
    public function getOrdre() {
        return $this->ordre;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->question = new \Doctrine\Common\Collections\ArrayCollection();
        $this->service = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add question
     *
     * @param \tuto\BackofficeBundle\Entity\Question $question
     * @return QuestionService
     */
    public function addQuestion(\tuto\BackofficeBundle\Entity\Question $question) {
        $this->question[] = $question;

        return $this;
    }

    /**
     * Remove question
     *
     * @param \tuto\BackofficeBundle\Entity\Question $question
     */
    public function removeQuestion(\tuto\BackofficeBundle\Entity\Question $question) {
        $this->question->removeElement($question);
    }

    /**
     * Get question
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQuestion() {
        return $this->question;
    }

    /**
     * Add service
     *
     * @param \tuto\BackofficeBundle\Entity\Service $service
     * @return QuestionService
     */
    public function addService(\tuto\BackofficeBundle\Entity\Service $service) {
        $this->service[] = $service;

        return $this;
    }

    /**
     * Remove service
     *
     * @param \tuto\BackofficeBundle\Entity\Service $service
     */
    public function removeService(\tuto\BackofficeBundle\Entity\Service $service) {
        $this->service->removeElement($service);
    }

    /**
     * Get service
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getService() {
        return $this->service;
    }

    /**
     * Set question
     *
     * @param \tuto\BackofficeBundle\Entity\Question $question
     * @return QuestionService
     */
    public function setQuestion(\tuto\BackofficeBundle\Entity\Question $question = null) {
        $this->question = $question;

        return $this;
    }

    /**
     * Set service
     *
     * @param \tuto\BackofficeBundle\Entity\Service $service
     * @return QuestionService
     */
    public function setService(\tuto\BackofficeBundle\Entity\Service $service = null) {
        $this->service = $service;

        return $this;
    }
    

}
