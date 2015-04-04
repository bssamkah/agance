<?php
namespace Agence\Bundle\FrontBundle\Entity;

use DCS\RatingBundle\Entity\Rating as BaseRating;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\ChangeTrackingPolicy("DEFERRED_EXPLICIT")
 * @ORM\Table(name="rating")
 */
class Rating extends BaseRating
{
   /**
     * @ORM\Id
     * @ORM\Column(type="string")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Agence\Bundle\FrontBundle\Entity\Vote", mappedBy="rating")
     */
    protected $votes;
    
    public function __construct()
    {
        parent::__construct();
       
    }
    
 
  


    /**
     * Set id
     *
     * @param string $id
     * @return Rating
     */
    public function setId($id)
    {
        $this->id = $id;
    
        return $this;
    }

    /**
     * Get id
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add votes
     *
     * @param \Agence\Bundle\FrontBundle\Entity\Vote $votes
     * @return Rating
     */
    public function addVote(\Agence\Bundle\FrontBundle\Entity\Vote $votes)
    {
        $this->votes[] = $votes;
    
        return $this;
    }

    /**
     * Remove votes
     *
     * @param \Agence\Bundle\FrontBundle\Entity\Vote $votes
     */
    public function removeVote(\Agence\Bundle\FrontBundle\Entity\Vote $votes)
    {
        $this->votes->removeElement($votes);
    }

    /**
     * Get votes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVotes()
    {
        return $this->votes;
    }
}