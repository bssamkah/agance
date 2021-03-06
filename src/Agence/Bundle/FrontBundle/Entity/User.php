<?php

namespace Agence\Bundle\FrontBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Agence\Bundle\FrontBundle\Repository\UserRepository")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="user")
 */
class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $nom;

    /**
     * @ORM\Column(type="string")
     */
    protected $prenom;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $adresse;

    /**
     * @ORM\Column(type="string", nullable=true)
     * 
     */
    protected $tel;
    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", name="date_creation")
     */
    protected $createdAt;
    /**
     * @ORM\Column(type="string")
     * @Assert\Choice(choices = {"Client","Responsable"})
     */
    protected $profil;
    /**
     * @ORM\ManyToOne(targetEntity="Agence\Bundle\FrontBundle\Entity\Agence",inversedBy="responsables")
     * @ORM\JoinColumn(nullable=true)
     */
    private $agence;
    /**
     * @ORM\OneToMany(targetEntity="Agence\Bundle\FrontBundle\Entity\Offre", mappedBy="responsable", cascade={"persist","remove"})
     */
    protected $offres;
      /**
     * @ORM\OneToMany(targetEntity="Agence\Bundle\FrontBundle\Entity\OffreFavoris", mappedBy="client", cascade={"persist","remove"})
     */
    protected $clientfavoris;

    public function __construct() {
        parent::__construct();
        // your own logic
    }

    /**
     * @return string
     */
    public function getRolesAsString() {
        $roles = array();
        foreach ($this->getRoles() as $role) {
            $role = explode('_', $role);
            array_shift($role);
            $roles[] = ucfirst(strtolower(implode(' ', $role)));
        }

        return implode(', ', $roles);
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
     * @return User
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
     * Set prenom
     *
     * @param string $prenom
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    
        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return User
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
     * Set tel
     *
     * @param string $tel
     * @return User
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    
        return $this;
    }

    /**
     * Get tel
     *
     * @return string 
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set agence
     *
     * @param \Agence\Bundle\FrontBundle\Entity\Agence $agence
     * @return User
     */
    public function setAgence(\Agence\Bundle\FrontBundle\Entity\Agence $agence = null)
    {
        $this->agence = $agence;
    
        return $this;
    }

    /**
     * Get agence
     *
     * @return \Agence\Bundle\FrontBundle\Entity\Agence 
     */
    public function getAgence()
    {
        return $this->agence;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return User
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
     * Set profil
     *
     * @param string $profil
     * @return User
     */
    public function setProfil($profil)
    {
        $this->profil = $profil;
    
        return $this;
    }

    /**
     * Get profil
     *
     * @return string 
     */
    public function getProfil()
    {
        return $this->profil;
    }

    /**
     * Add offres
     *
     * @param \Agence\Bundle\FrontBundle\Entity\Offre $offres
     * @return User
     */
    public function addOffre(\Agence\Bundle\FrontBundle\Entity\Offre $offres)
    {
        $this->offres[] = $offres;
    
        return $this;
    }

    /**
     * Remove offres
     *
     * @param \Agence\Bundle\FrontBundle\Entity\Offre $offres
     */
    public function removeOffre(\Agence\Bundle\FrontBundle\Entity\Offre $offres)
    {
        $this->offres->removeElement($offres);
    }

    /**
     * Get offres
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOffres()
    {
        return $this->offres;
    }

    /**
     * Add clientfavoris
     *
     * @param \Agence\Bundle\FrontBundle\Entity\OffreFavoris $clientfavoris
     * @return User
     */
    public function addClientfavori(\Agence\Bundle\FrontBundle\Entity\OffreFavoris $clientfavoris)
    {
        $this->clientfavoris[] = $clientfavoris;
    
        return $this;
    }

    /**
     * Remove clientfavoris
     *
     * @param \Agence\Bundle\FrontBundle\Entity\OffreFavoris $clientfavoris
     */
    public function removeClientfavori(\Agence\Bundle\FrontBundle\Entity\OffreFavoris $clientfavoris)
    {
        $this->clientfavoris->removeElement($clientfavoris);
    }

    /**
     * Get clientfavoris
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getClientfavoris()
    {
        return $this->clientfavoris;
    }
}