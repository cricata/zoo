<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Cage
 *
 * @ORM\Table(name="cage")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class Cage {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * 
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="material", type="string")
     */
    private $material;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string")
     */
    private $location;
    
     /**
     * @var integer
     *
     * @ORM\Column(name="number", type="integer",nullable=true)
     * @Assert\Regex(
     *     pattern="/^[\d+]+$/",
     *     match=true,
     *     message="Number must be positive"
     * )
     */ 
    private $number;
    
    
     /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Animal", inversedBy="cages")
     * @ORM\JoinColumn(name="animal_id", referencedColumnName="id", onDelete="SET NULL")
     * 
     */ 
    private $animal;   

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dat_cre", type="datetime")
     */
    private $datCre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dat_upd", type="datetime")
     */
    private $datUpd;

}
