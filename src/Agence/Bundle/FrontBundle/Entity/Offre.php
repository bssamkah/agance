<?php

namespace Agence\Bundle\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Agence\Bundle\FrontBundle\Repository\OffreRepository")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="offre")
 */
class Offre {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=100)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=100)
     */
    private $lieu;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;
    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", name="date_creation")
     */
    protected $createdAt;
    /**
     * @var float
     *
     * @ORM\Column(name="surface", type="float")
     */
    private $surface;

    /**
     * @ORM\Column(type="string")
     * @Assert\Choice(choices = {"location","vente"})
     */
    protected $type;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="typeTerrain", type="text", nullable=true)
     */
    private $typeTerrain;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbrChambre", type="integer", nullable=true)
     */
    private $nbrChambre;

    /**
     * @var integer
     *
     * @ORM\Column(name="etage", type="integer", nullable=true)
     */
    private $etage;
    /**
     * @var float
     *
     * @ORM\Column(name="lat", type="float", nullable=true)
     */
    private $lat;

    /**
     * @var float
     *
     * @ORM\Column(name="lng", type="float", nullable=true)
     */
    private $lng;
   /**
    * @ORM\OneToMany(targetEntity="GaleriePhoto", mappedBy="offre", cascade={"persist","remove"})
    **/
    protected $photos;
    /**
    * @ORM\OneToMany(targetEntity="OffreFavoris", mappedBy="offre", cascade={"persist","remove"})
    **/
    protected $offrefavoris;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="Agence\Bundle\FrontBundle\Entity\User",inversedBy="offres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $responsable;
    
     /**
     * @ORM\OneToMany(targetEntity="Agence\Bundle\FrontBundle\Entity\Comment", mappedBy="offre" )
     *
     */
     protected $comments;
    
    public function __construct() {
       
    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set lieu
     *
     * @param string $lieu
     * @return Offre
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;
    
        return $this;
    }

    /**
     * Get lieu
     *
     * @return string 
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set prix
     *
     * @param float $prix
     * @return Offre
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    
        return $this;
    }

    /**
     * Get prix
     *
     * @return float 
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Offre
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Offre
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
     * Set typeTerrain
     *
     * @param string $typeTerrain
     * @return Offre
     */
    public function setTypeTerrain($typeTerrain)
    {
        $this->typeTerrain = $typeTerrain;
    
        return $this;
    }

    /**
     * Get typeTerrain
     *
     * @return string 
     */
    public function getTypeTerrain()
    {
        return $this->typeTerrain;
    }

    /**
     * Set nbrChambre
     *
     * @param integer $nbrChambre
     * @return Offre
     */
    public function setNbrChambre($nbrChambre)
    {
        $this->nbrChambre = $nbrChambre;
    
        return $this;
    }

    /**
     * Get nbrChambre
     *
     * @return integer 
     */
    public function getNbrChambre()
    {
        return $this->nbrChambre;
    }

    /**
     * Set etage
     *
     * @param integer $etage
     * @return Offre
     */
    public function setEtage($etage)
    {
        $this->etage = $etage;
    
        return $this;
    }

    /**
     * Get etage
     *
     * @return integer 
     */
    public function getEtage()
    {
        return $this->etage;
    }

    

    /**
     * Set responsable
     *
     * @param \Agence\Bundle\FrontBundle\Entity\User $responsable
     * @return Offre
     */
    public function setResponsable(\Agence\Bundle\FrontBundle\Entity\User $responsable)
    {
        $this->responsable = $responsable;
    
        return $this;
    }

    /**
     * Get responsable
     *
     * @return \Agence\Bundle\FrontBundle\Entity\User 
     */
    public function getResponsable()
    {
        return $this->responsable;
    }

    /**
     * Set surface
     *
     * @param float $surface
     * @return Offre
     */
    public function setSurface($surface)
    {
        $this->surface = $surface;
    
        return $this;
    }

    /**
     * Get surface
     *
     * @return float 
     */
    public function getSurface()
    {
        return $this->surface;
    }

    /**
     * Add photos
     *
     * @param \Agence\Bundle\FrontBundle\Entity\GaleriePhoto $photos
     * @return Offre
     */
    public function addPhoto(\Agence\Bundle\FrontBundle\Entity\GaleriePhoto $photos)
    {
        $this->photos[] = $photos;
    
        return $this;
    }

    /**
     * Remove photos
     *
     * @param \Agence\Bundle\FrontBundle\Entity\GaleriePhoto $photos
     */
    public function removePhoto(\Agence\Bundle\FrontBundle\Entity\GaleriePhoto $photos)
    {
        $this->photos->removeElement($photos);
    }

    /**
     * Get photos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Offre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    
        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set lat
     *
     * @param float $lat
     * @return Offre
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    
        return $this;
    }

    /**
     * Get lat
     *
     * @return float 
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set lng
     *
     * @param float $lng
     * @return Offre
     */
    public function setLng($lng)
    {
        $this->lng = $lng;
    
        return $this;
    }

    /**
     * Get lng
     *
     * @return float 
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Offre
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Add offrefavoris
     *
     * @param \Agence\Bundle\FrontBundle\Entity\OffreFavoris $offrefavoris
     * @return Offre
     */
    public function addOffrefavori(\Agence\Bundle\FrontBundle\Entity\OffreFavoris $offrefavoris)
    {
        $this->offrefavoris[] = $offrefavoris;
    
        return $this;
    }

    /**
     * Remove offrefavoris
     *
     * @param \Agence\Bundle\FrontBundle\Entity\OffreFavoris $offrefavoris
     */
    public function removeOffrefavori(\Agence\Bundle\FrontBundle\Entity\OffreFavoris $offrefavoris)
    {
        $this->offrefavoris->removeElement($offrefavoris);
    }

    /**
     * Get offrefavoris
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOffrefavoris()
    {
        return $this->offrefavoris;
    }
    
    /**
     * Add comments
     *
     * @param \Agence\Bundle\FrontBundle\Entity\Comment $comments
     * @return Offre
     */
    public function addComment(\Agence\Bundle\FrontBundle\Entity\Comment $comments)
    {
        $this->comments[] = $comments;

        return $this;
    }

    /**
     * Remove comments
     *
     * @param \Agence\Bundle\FrontBundle\Comment $comments
     */
    public function removeEventcomment(\Agence\Bundle\FrontBundle\Entity\Comment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }
}