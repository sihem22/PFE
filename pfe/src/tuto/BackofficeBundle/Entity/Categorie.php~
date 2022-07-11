<?php

namespace tuto\BackofficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Categorie
 *
 * @ORM\Table(name="categorie")
 * @ORM\Entity(repositoryClass="tuto\BackofficeBundle\Repository\CategorieRepository")
 * @ORM\HasLifecycleCallbacks 
 */
class Categorie {

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
    public $categorieImage;
    /**
     * @ORM\OneToMany(targetEntity="tuto\BackofficeBundle\Entity\Service", mappedBy="Categorie")
     * @ORM\JoinColumn(name="Service_id", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $Service;

    public function getUploadRootDir() {
        return __Dir__ . '/../../../../web/uploads/categories';
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
        if (null !== $this->categorieImage)
            $this->path = sha1(uniqid(mt_rand(), TRUE)) . '.' . $this->categorieImage->guessExtension();
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function Upload() {
        if (null !== $this->categorieImage) {
            $this->categorieImage->move($this->getUploadRootDir(), $this->path);
            unset($this->categorieImage);
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
    public function getAssetPath(){
        return 'uploads/categories/'.$this->path;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload() {
        if (file_exists($this->tempFile))
            unlink($this->tempFile);
    }

   

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="text")
     */
    private $description;

    

   

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
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
     * @return Categorie
     */
    public function setNom($nom) {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom() {
        return $this->nom;
    }

    

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Categorie
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    
    public function __toString() {
        return $this->nom;
    }


    /**
     * Set path
     *
     * @param string $path
     * @return Categorie
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Categorie = new \Doctrine\Common\Collections\ArrayCollection();
    }

 

    /**
     * Add Service
     *
     * @param \tuto\BackofficeBundle\Entity\Service $service
     * @return Categorie
     */
    public function addService(\tuto\BackofficeBundle\Entity\Service $service)
    {
        $this->Service[] = $service;

        return $this;
    }

    /**
     * Remove Service
     *
     * @param \tuto\BackofficeBundle\Entity\Service $service
     */
    public function removeService(\tuto\BackofficeBundle\Entity\Service $service)
    {
        $this->Service->removeElement($service);
    }

    /**
     * Get Service
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getService()
    {
        return $this->Service;
    }

    /**
     * Set updateAt
     *
     * @param \DateTime $updateAt
     * @return Categorie
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
