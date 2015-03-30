<?php

namespace Agence\Bundle\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Agence\Bundle\FrontBundle\Repository\AgenceRepository")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="agence")
 */
class Agence {
    
   /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(type="string")
     */
    protected $nom;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $adresse;
    /**
     * @ORM\OneToMany(targetEntity="Agence\Bundle\FrontBundle\Entity\User", mappedBy="agence", cascade={"persist","remove"})
     */
    protected $responsables;
    
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
     * Set nom
     *
     * @param string $nom
     * @return Agence
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
     * Set adresse
     *
     * @param string $adresse
     * @return Agence
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    
        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Add responsables
     *
     * @param \Agence\Bundle\FrontBundle\Entity\User $responsables
     * @return Agence
     */
    public function addResponsable(\Agence\Bundle\FrontBundle\Entity\User $responsables)
    {
        $this->responsables[] = $responsables;
    
        return $this;
    }

    /**
     * Remove responsables
     *
     * @param \Agence\Bundle\FrontBundle\Entity\User $responsables
     */
    public function removeResponsable(\Agence\Bundle\FrontBundle\Entity\User $responsables)
    {
        $this->responsables->removeElement($responsables);
    }

    /**
     * Get responsables
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getResponsables()
    {
        return $this->responsables;
    }
}