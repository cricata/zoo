<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Cage
 *
 * @ORM\Table(name="animal")
 * @ORM\Entity
 * @UniqueEntity("name")
 * @ORM\HasLifecycleCallbacks()
 */
class Animal {

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
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_of_birth", type="datetime")
     */
    private $dateOfBirth;

    /**
     * @var string
     *
     * @ORM\Column(name="details", type="string")
     */
    private $details;

    /**
     * @var integer
     *
     * @ORM\Column(name="daily_food_amount", type="integer",nullable=true)
     * @Assert\Regex(
     *     pattern="/^[\d+]+$/",
     *     match=true,
     *     message="Number must be positive"
     * )
     */
    private $dailyFoodAmount;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="UnitMeasure")
     * 
     */
    private $unitMeasure;

    /**
     * 
     * @ORM\OneToMany(targetEntity="Cage", mappedBy="animal")
     * 
     * 
     */
    private $cages;
    
    /**
     * 
     * @ORM\OneToMany(targetEntity="AnimalBreed", mappedBy="animal")
     * 
     * 
     */
    
    private $breedCodes;
    
    /**
     * 
     * @ORM\ManyToMany(targetEntity="FoodItem", inversedBy="animals", cascade={"persist"})
     * 
     */
    private $foodItems;  

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
