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
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Agence\Bundle\FrontBundle\Entity\offre", inversedBy="participations")
     */
    private $offre;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Agence\Bundle\FrontBundle\Entity\User", inversedBy="participations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_paticipation", type="datetime")
     */
    private $datefavoris;

}
