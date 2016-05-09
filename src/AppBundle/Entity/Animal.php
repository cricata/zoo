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

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->breedCodes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->foodItems = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return Animal
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set dateOfBirth
     *
     * @param \DateTime $dateOfBirth
     *
     * @return Animal
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * Get dateOfBirth
     *
     * @return \DateTime
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * Set details
     *
     * @param string $details
     *
     * @return Animal
     */
    public function setDetails($details)
    {
        $this->details = $details;

        return $this;
    }

    /**
     * Get details
     *
     * @return string
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Set dailyFoodAmount
     *
     * @param integer $dailyFoodAmount
     *
     * @return Animal
     */
    public function setDailyFoodAmount($dailyFoodAmount)
    {
        $this->dailyFoodAmount = $dailyFoodAmount;

        return $this;
    }

    /**
     * Get dailyFoodAmount
     *
     * @return integer
     */
    public function getDailyFoodAmount()
    {
        return $this->dailyFoodAmount;
    }

    /**
     * Set datCre
     *
     * @param \DateTime $datCre
     *
     * @return Animal
     */
    public function setDatCre()
    {
        $this->datCre = new \DateTime();

        return $this;
    }

    /**
     * Get datCre
     *
     * @return \DateTime
     */
    public function getDatCre()
    {
        return $this->datCre;
    }

    /**
     * Set datUpd
     *
     * @param \DateTime $datUpd
     *
     * @return Animal
     */
    public function setDatUpd()
    {
        $this->datUpd = new \DateTime();

        return $this;
    }

    /**
     * Get datUpd
     *
     * @return \DateTime
     */
    public function getDatUpd()
    {
        return $this->datUpd;
    }

    /**
     * Set unitMeasure
     *
     * @param \AppBundle\Entity\UnitMeasure $unitMeasure
     *
     * @return Animal
     */
    public function setUnitMeasure(\AppBundle\Entity\UnitMeasure $unitMeasure = null)
    {
        $this->unitMeasure = $unitMeasure;

        return $this;
    }

    /**
     * Get unitMeasure
     *
     * @return \AppBundle\Entity\UnitMeasure
     */
    public function getUnitMeasure()
    {
        return $this->unitMeasure;
    }

    /**
     * Add cage
     *
     * @param \AppBundle\Entity\Cage $cage
     *
     * @return Animal
     */
    public function addCage(\AppBundle\Entity\Cage $cage)
    {
        $this->cages[] = $cage;

        return $this;
    }

    /**
     * Remove cage
     *
     * @param \AppBundle\Entity\Cage $cage
     */
    public function removeCage(\AppBundle\Entity\Cage $cage)
    {
        $this->cages->removeElement($cage);
    }

    /**
     * Get cages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCages()
    {
        return $this->cages;
    }

    /**
     * Add breedCode
     *
     * @param \AppBundle\Entity\AnimalBreed $breedCode
     *
     * @return Animal
     */
    public function addBreedCode(\AppBundle\Entity\AnimalBreed $breedCode)
    {
        $this->breedCodes[] = $breedCode;

        return $this;
    }

    /**
     * Remove breedCode
     *
     * @param \AppBundle\Entity\AnimalBreed $breedCode
     */
    public function removeBreedCode(\AppBundle\Entity\AnimalBreed $breedCode)
    {
        $this->breedCodes->removeElement($breedCode);
    }

    /**
     * Get breedCodes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBreedCodes()
    {
        return $this->breedCodes;
    }

    /**
     * Add foodItem
     *
     * @param \AppBundle\Entity\FoodItem $foodItem
     *
     * @return Animal
     */
    public function addFoodItem(\AppBundle\Entity\FoodItem $foodItem)
    {
        $this->foodItems[] = $foodItem;

        return $this;
    }

    /**
     * Remove foodItem
     *
     * @param \AppBundle\Entity\FoodItem $foodItem
     */
    public function removeFoodItem(\AppBundle\Entity\FoodItem $foodItem)
    {
        $this->foodItems->removeElement($foodItem);
    }

    /**
     * Get foodItems
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFoodItems()
    {
        return $this->foodItems;
    }
}
