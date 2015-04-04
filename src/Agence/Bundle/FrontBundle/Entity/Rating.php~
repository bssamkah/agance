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
    
 
  

}
