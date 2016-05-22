<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * AnimalBreed
 *
 * @ORM\Table(name="animal_breed")
 * @ORM\Entity
 * @UniqueEntity("animal_breeds")
 * @ORM\HasLifecycleCallbacks()
 */
class AnimalBreed {

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
     * @var string
     *
     * @ORM\Column(name="description", type="string")
     */
    private $description;

    /**
     * 
     * @ORM\OneToMany(targetEntity="AnimalHabitat", mappedBy="animalBreed")
     * 
     *  
     */
    private $AnimalHabitats;

    /**
     * @var string
     *
     * @ORM\Column(name="daily_requirements", type="string")
     */
    private $dailyRequirements;

    /**
     * @var string
     *
     * @ORM\Column(name="details", type="string")
     */
    private $details;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_of_birth", type="datetime")
     */
    private $dateOfBirth;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="UnitMeasure")
     * 
     */
    private $unitMeasure;

    /**
     * 
     * @ORM\ManyToMany(targetEntity="Animal", inversedBy="breedCodes", cascade={"persist"})
     * 
     */
    private $animal;

    /**
     * 
     * @ORM\ManyToMany(targetEntity="FoodItem", inversedBy="animalBreeds", cascade={"persist"})
     * 
     */
    private $foodItems;

    /**
     * 
     * @ORM\OneToMany(targetEntity="AnimalCategory", mappedBy="animalBreed")
     * 
     * 
     */
    private $AnimalCategories;

    /**
     * 
     * @ORM\OneToMany(targetEntity="AnimalPhoto", mappedBy="animalBreed", cascade={"persist"}))
     * 
     * 
     */
    private $photoss;

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
        $this->AnimalHabitats = new \Doctrine\Common\Collections\ArrayCollection();
        $this->animal = new \Doctrine\Common\Collections\ArrayCollection();
        $this->foodItems = new \Doctrine\Common\Collections\ArrayCollection();
        $this->AnimalCategories = new \Doctrine\Common\Collections\ArrayCollection();
        $this->photoss = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return AnimalBreed
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
     * Set description
     *
     * @param string $description
     *
     * @return AnimalBreed
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set dailyRequirements
     *
     * @param string $dailyRequirements
     *
     * @return AnimalBreed
     */
    public function setDailyRequirements($dailyRequirements)
    {
        $this->dailyRequirements = $dailyRequirements;

        return $this;
    }

    /**
     * Get dailyRequirements
     *
     * @return string
     */
    public function getDailyRequirements()
    {
        return $this->dailyRequirements;
    }

    /**
     * Set details
     *
     * @param string $details
     *
     * @return AnimalBreed
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
     * Set dateOfBirth
     *
     * @param \DateTime $dateOfBirth
     *
     * @return AnimalBreed
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
     * Set datCre
     *
     * @param \DateTime $datCre
     *
     * @return AnimalBreed
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
     * @return AnimalBreed
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
     * Add animalHabitat
     *
     * @param \AppBundle\Entity\AnimalHabitat $animalHabitat
     *
     * @return AnimalBreed
     */
    public function addAnimalHabitat(\AppBundle\Entity\AnimalHabitat $animalHabitat)
    {
        $this->AnimalHabitats[] = $animalHabitat;

        return $this;
    }

    /**
     * Remove animalHabitat
     *
     * @param \AppBundle\Entity\AnimalHabitat $animalHabitat
     */
    public function removeAnimalHabitat(\AppBundle\Entity\AnimalHabitat $animalHabitat)
    {
        $this->AnimalHabitats->removeElement($animalHabitat);
    }

    /**
     * Get animalHabitats
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnimalHabitats()
    {
        return $this->AnimalHabitats;
    }

    /**
     * Set unitMeasure
     *
     * @param \AppBundle\Entity\UnitMeasure $unitMeasure
     *
     * @return AnimalBreed
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
     * Add animal
     *
     * @param \AppBundle\Entity\Animal $animal
     *
     * @return AnimalBreed
     */
    public function addAnimal(\AppBundle\Entity\Animal $animal)
    {
        $this->animal[] = $animal;

        return $this;
    }

    /**
     * Remove animal
     *
     * @param \AppBundle\Entity\Animal $animal
     */
    public function removeAnimal(\AppBundle\Entity\Animal $animal)
    {
        $this->animal->removeElement($animal);
    }

    /**
     * Get animal
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnimal()
    {
        return $this->animal;
    }

    /**
     * Add foodItem
     *
     * @param \AppBundle\Entity\FoodItem $foodItem
     *
     * @return AnimalBreed
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

    /**
     * Add animalCategory
     *
     * @param \AppBundle\Entity\AnimalCategory $animalCategory
     *
     * @return AnimalBreed
     */
    public function addAnimalCategory(\AppBundle\Entity\AnimalCategory $animalCategory)
    {
        $this->AnimalCategories[] = $animalCategory;

        return $this;
    }

    /**
     * Remove animalCategory
     *
     * @param \AppBundle\Entity\AnimalCategory $animalCategory
     */
    public function removeAnimalCategory(\AppBundle\Entity\AnimalCategory $animalCategory)
    {
        $this->AnimalCategories->removeElement($animalCategory);
    }

    /**
     * Get animalCategories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnimalCategories()
    {
        return $this->AnimalCategories;
    }

    /**
     * Add photoss
     *
     * @param \AppBundle\Entity\AnimalPhoto $photoss
     *
     * @return AnimalBreed
     */
    public function addPhotoss(\AppBundle\Entity\AnimalPhoto $photoss)
    {
        $this->photoss[] = $photoss;

        return $this;
    }

    /**
     * Remove photoss
     *
     * @param \AppBundle\Entity\AnimalPhoto $photoss
     */
    public function removePhotoss(\AppBundle\Entity\AnimalPhoto $photoss)
    {
        $this->photoss->removeElement($photoss);
    }

    /**
     * Get photoss
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPhotoss()
    {
        return $this->photoss;
    }
}
