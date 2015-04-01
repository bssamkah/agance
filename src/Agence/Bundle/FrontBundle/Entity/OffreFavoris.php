<?php

namespace Agence\Bundle\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Agence\Bundle\FrontBundle\Repository\OffreFavorisRepository")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="offrefavoris")
 */
class OffreFavoris {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     *
     * @ORM\ManyToOne(targetEntity="Agence\Bundle\FrontBundle\Entity\offre", inversedBy="offrefavoris")
     */
    private $offre;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="Agence\Bundle\FrontBundle\Entity\User", inversedBy="clientfavoris")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_paticipation", type="datetime")
     */
    private $datefavoris;


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
     * Set datefavoris
     *
     * @param \DateTime $datefavoris
     * @return OffreFavoris
     */
    public function setDatefavoris($datefavoris)
    {
        $this->datefavoris = $datefavoris;
    
        return $this;
    }

    /**
     * Get datefavoris
     *
     * @return \DateTime 
     */
    public function getDatefavoris()
    {
        return $this->datefavoris;
    }

    /**
     * Set offre
     *
     * @param \Agence\Bundle\FrontBundle\Entity\offre $offre
     * @return OffreFavoris
     */
    public function setOffre(\Agence\Bundle\FrontBundle\Entity\offre $offre = null)
    {
        $this->offre = $offre;
    
        return $this;
    }

    /**
     * Get offre
     *
     * @return \Agence\Bundle\FrontBundle\Entity\offre 
     */
    public function getOffre()
    {
        return $this->offre;
    }

    /**
     * Set client
     *
     * @param \Agence\Bundle\FrontBundle\Entity\User $client
     * @return OffreFavoris
     */
    public function setClient(\Agence\Bundle\FrontBundle\Entity\User $client)
    {
        $this->client = $client;
    
        return $this;
    }

    /**
     * Get client
     *
     * @return \Agence\Bundle\FrontBundle\Entity\User 
     */
    public function getClient()
    {
        return $this->client;
    }
}