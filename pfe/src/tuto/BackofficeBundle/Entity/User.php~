<?php

// src/tuto/BackofficeBundle/Entity/User.php

namespace tuto\BackofficeBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Misd\PhoneNumberBundle\Validator\Constraints\PhoneNumber as AssertPhoneNumber;


/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 * @ORM\HasLifecycleCallbacks 
 */


/**
 * User
 *
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="tuto\BackofficeBundle\Repository\UserRepository")
 */

class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
/**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="veuillez entrer votre nom et votre prÃ©nom.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=3,
     *     max=255,
     *     minMessage="The name is too short.",
     *     maxMessage="The name is too long.",
     *     groups={"Registration", "Profile"}
     * )
     * @Assert\NotBlank
     */
    private $NomEtPrenom ;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $NomEntreprise;
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
        return __Dir__ . '/../../../../web/uploads/users';
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
        return 'uploads/users/'.$this->path;
    }


    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank(message="veuillez entrer votre date de naissance.", groups={"Registration", "Profile"})
     */
    private $DateNaissance;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="veuillez entrer votre genre.", groups={"Registration", "Profile"})
     */
    private $Genre;
 
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Telephone;

   

    /**
     * @ORM\Column(type="string",nullable=true)
     *@Assert\NotBlank(message="veuillez entrer votre site web.", groups={"Registration", "Profile"})
   
     * @Assert\Url()
     */
   
    private $SiteWeb;
    

   

   

   

    /**
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\Localite", inversedBy="User")
     * @ORM\JoinColumn(name="Localite_id", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $Localite;
    
    
    
    /**
    * @ORM\ManyToMany(targetEntity="tuto\BackofficeBundle\Entity\Service")
    */
    protected $services;
    

    
    
    
    public function __construct() {
        parent::__construct();
        // your own logic
    }

    /**
     * Set Nom
     *
     * @param string $nom
     * @return User
     */
    public function setNomEtPrenom($nometprenom) {
        $this->NomEtPrenom = $nometprenom;

        return $this;
    }

    /**
     * Get Nom
     *
     * @return string 
     */
    public function getNomEtPrenom() {
        return $this->NomEtPrenom;
    }
     public function getPath() {
        return $this->path;
    }


    /**
     * Set DateNaissance
     *
     * @param \DateTime $dateNaissance
     * @return User
     */
    public function setDateNaissance($dateNaissance) {
        $this->DateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get DateNaissance
     *
     * @return \DateTime 
     */
    public function getDateNaissance() {
        return $this->DateNaissance;
    }

    /**
     * Set Genre
     *
     * @param string $genre
     * @return User
     */
    public function setGenre($genre) {
        $this->Genre = $genre;

        return $this;
    }

    /**
     * Get Genre
     *
     * @return string 
     */
    public function getGenre() {
        return $this->Genre;
    }

    /**
     * Set Telephone
     *
     * @param string $telephone
     * @return User
     */
    public function setTelephone($telephone) {
        $this->Telephone = $telephone;

        return $this;
    }

    /**
     * Get Telephone
     *
     * @return string 
     */
    public function getTelephone() {
        return $this->Telephone;
    }

    

    /**
     * Set SiteWeb
     *
     * @param string $siteWeb
     * @return User
     */
    public function setSiteWeb($siteWeb) {
        $this->SiteWeb = $siteWeb;

        return $this;
    }

    /**
     * Get SiteWeb
     *
     * @return string 
     */
    public function getSiteWeb() {
        return $this->SiteWeb;
    }

   

    /**
     * Set Localite
     *
     * @param \tuto\BackofficeBundle\Entity\Localite $localite
     * @return User
     */
    public function setLocalite(\tuto\BackofficeBundle\Entity\Localite $localite) {
        $this->Localite = $localite;

        return $this;
    }

    /**
     * Get Localite
     *
     * @return \tuto\BackofficeBundle\Entity\Localite 
     */
    public function getLocalite() {
        return $this->Localite;
    }


    /**
     * Set path
     *
     * @param string $path
     * @return User
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

   

    /**
     * Set NomEntreprise
     *
     * @param string $nomEntreprise
     * @return User
     */
    public function setNomEntreprise($nomEntreprise)
    {
        $this->NomEntreprise = $nomEntreprise;

        return $this;
    }

    /**
     * Get NomEntreprise
     *
     * @return string 
     */
    public function getNomEntreprise()
    {
        return $this->NomEntreprise;
    }

    /**
     * Add services
     *
     * @param \tuto\BackofficeBundle\Entity\Service $services
     * @return User
     */
    public function addService(\tuto\BackofficeBundle\Entity\Service $services)
    {
        $this->services[] = $services;

        return $this;
    }

    /**
     * Remove services
     *
     * @param \tuto\BackofficeBundle\Entity\Service $services
     */
    public function removeService(\tuto\BackofficeBundle\Entity\Service $services)
    {
        $this->services->removeElement($services);
    }

    /**
     * Get services
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * Set updateAt
     *
     * @param \DateTime $updateAt
     * @return User
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
