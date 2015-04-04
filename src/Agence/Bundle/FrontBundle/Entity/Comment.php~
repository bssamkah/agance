<?php

namespace Agence\Bundle\FrontBundle\Entity;
/**
 * Description of Comment
 *
 */
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="Agence\Bundle\FrontBundle\Repository\CommentRepository")
 * @ORM\ChangeTrackingPolicy("DEFERRED_EXPLICIT")
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="comment")
 */
class Comment 
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
   private $id;
  
    /**
     * 
     *
     * @var commenteur
     * @ORM\ManyToOne(targetEntity="Agence\Bundle\FrontBundle\Entity\User")
     */
    protected $commenteur;
    /**
     * 
     *
     * @var offre
     * @ORM\ManyToOne(targetEntity="Agence\Bundle\FrontBundle\Entity\Offre", inversedBy="comments")
     */
    protected $offre;
   
    
   /**
    *@var commentaire
    * @ORM\Column(type="text")
    */
    
    private $Commentaire;
    
    /**
     *@var createdat
     * @ORM\Column(type="datetime")
     */
    private $createdat;
 

    
    /**
     * @ORM\PrePersist
     */
    
    public function creationDate() {
        
        $this->setCreatedat(new \Datetime());
       
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
     * Set Commentaire
     *
     * @param string $commentaire
     * @return Comment
     */
    public function setCommentaire($commentaire)
    {
        $this->Commentaire = $commentaire;

        return $this;
    }

    /**
     * Get Commentaire
     *
     * @return string 
     */
    public function getCommentaire()
    {
        return $this->Commentaire;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     * @return Comment
     */
    public function setCreatedat($createdat)
    {
        $this->createdat = $createdat;

        return $this;
    }

    /**
     * Get createdat
     *
     * @return \DateTime 
     */
    public function getCreatedat()
    {
        return $this->createdat;
    }

    /**
     * Set commenteur
     *
     * @param \Agence\Bundle\FrontBundle\Entity\User $commenteur
     * @return Comment
     */
    public function setCommenteur(\Agence\Bundle\FrontBundle\Entity\User $commenteur = null)
    {
        $this->commenteur = $commenteur;

        return $this;
    }

    /**
     * Get commenteur
     *
     * @return \Agence\Bundle\FrontBundle\Entity\User 
     */
    public function getCommenteur()
    {
        return $this->commenteur;
    }

    

    /**
     * Set offre
     *
     * @param \FrontOffice\OptimusBundle\Entity\Offre $offre
     * @return Comment
     */
    public function setOffre(\Agence\Bundle\FrontBundle\Entity\Offre $offre = null)
    {
        $this->offre = $offre;

        return $this;
    }

    /**
     * Get offre
     *
     * @return \Agence\Bundle\FrontBundle\Entity\Offre
     */
    public function getClub()
    {
        return $this->offre;
    }

 
   
}