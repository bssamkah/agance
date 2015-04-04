<?php


namespace Agence\Bundle\FrontBundle\Entity;

use DCS\RatingBundle\Entity\Vote as BaseVote;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\ChangeTrackingPolicy("DEFERRED_EXPLICIT")
 * @ORM\Table(name="vote")
 */
class Vote extends BaseVote
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Agence\Bundle\FrontBundle\Entity\Rating", inversedBy="votes")
     * @ORM\JoinColumn(name="rating_id", referencedColumnName="id")
     */
    protected $rating;

    /**
     * @ORM\ManyToOne(targetEntity="Agence\Bundle\FrontBundle\Entity\User")
     */
    protected $voter;
   public function __construct()
    {
        parent::__construct();
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
     * Set rating
     *
     * @param \Agence\Bundle\FrontBundle\Entity\Rating $rating
     * @return Vote
     */
    public function setRating(\Agence\Bundle\FrontBundle\Entity\Rating $rating = null)
    {
        $this->rating = $rating;
    
        return $this;
    }

    /**
     * Get rating
     *
     * @return \Agence\Bundle\FrontBundle\Entity\Rating 
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set voter
     *
     * @param \Agence\Bundle\FrontBundle\Entity\User $voter
     * @return Vote
     */
    public function setVoter(\Agence\Bundle\FrontBundle\Entity\User $voter = null)
    {
        $this->voter = $voter;
    
        return $this;
    }

    /**
     * Get voter
     *
     * @return \Agence\Bundle\FrontBundle\Entity\User 
     */
    public function getVoter()
    {
        return $this->voter;
    }
}