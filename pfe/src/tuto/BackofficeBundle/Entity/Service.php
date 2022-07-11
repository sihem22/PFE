<?php

namespace tuto\BackofficeBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Service
 *
 * @ORM\Table(name="service")
 * @ORM\Entity(repositoryClass="tuto\BackofficeBundle\Repository\ServiceRepository")
 * @ORM\HasLifecycleCallbacks 
 */
class Service
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
     * @ORM\Column(name="Nom", type="string", length=255)
     * @Assert\NotBlank
     */
    private $nom;
    /**
     * @var \DateTime
     * 
     * @ORM\COlumn(name="updated_at",type="datetime", nullable=true) 
     */
    private $updateAt;
    
    /**
     * @ORM\PostLoad()
     */
    public function postLoad()
    {
        $this->updateAt = new \DateTime();
    }
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path;
    public $image;

    public function getUploadRootDir() {
        return __Dir__ . '/../../../../web/uploads/testes';
    }

    public function getAbsolutePath() {
        return null === $this->path ? null : $this->getUploadRootDir() . '/' . $this->path;
    }
    
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload() {
        $this->tempfile = $this->getAbsolutePath();
        $this->oldfile = $this->getPath();
        if (null !== $this->image)
            $this->path = sha1(uniqid(mt_rand(), TRUE)) . '.' . $this->image->guessExtension();
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function Upload() {
        if (null !== $this->image) {
            $this->image->move($this->getUploadRootDir(), $this->path);
            unset($this->image);
            if ($this->oldfile != null)
                unlink($this->tempfile);
        }
    }

    /**
     * @ORM\PreRemove()
     */
    public function preRemoveUpload() {
        $this->tempFile = $this->getAbsolutePath();
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload() {
        if (file_exists($this->tempFile))
            unlink($this->tempFile);
    }

    
    public function getAssetPath(){
        return 'uploads/testes/'.$this->path;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="text", nullable=true)
     */
    private $description;

    

     /**
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\Categorie", inversedBy="Categorie")
     * @ORM\JoinColumn(name="Categorie_id", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $Categorie;
    
    
    /**
    * @ORM\OrderBy({"ordre" = "asc"}) 
    * @ORM\OneToMany(targetEntity="tuto\BackofficeBundle\Entity\QuestionService", mappedBy="service")
    */
      protected $questionservices;
      
      
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    public function getPath() {
        return $this->path;
    }
    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Service
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Service
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
     * Set categorie
     *
     * @param \tuto\BackofficeBundle\Entity\Categorie $categorie
     *
     * @return Service
     */
    public function setCategorie(\tuto\BackofficeBundle\Entity\categorie $categorie = null)
    {
        $this->Categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \tuto\BackofficeBundle\Entity\Categorie
     */
    public function getCategorie()
    {
        return $this->Categorie;
    }
    public function __toString() {
        return $this->nom;
       
    }


    /**
     * Set path
     *
     * @param string $path
     * @return Service
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Set questionservices
     *
     * @param \tuto\BackofficeBundle\Entity\QuestionService $questionservices
     * @return Service
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->questionservices = new \Doctrine\Common\Collections\ArrayCollection();
        $this->question = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add questionservices
     *
     * @param \tuto\BackofficeBundle\Entity\QuestionService $questionservices
     * @return Service
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
 
  

    /**
     * Set updateAt
     *
     * @param \DateTime $updateAt
     * @return Service
     */
    public function setUpdateAt($updateAt)
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    /**
     * Get updateAt
     *
     * @return \DateTime 
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }
}
