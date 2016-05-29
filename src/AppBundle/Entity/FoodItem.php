<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * FoodItem
 *
 * @ORM\Table(name="food_item")
 * @ORM\Entity
 * @UniqueEntity("name")
 * @ORM\HasLifecycleCallbacks()
 */
class FoodItem {

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
     * @var integer
     *
     * @ORM\Column(name="code", type="integer")
     */
    private $code;

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
     *
     * @ORM\ManyToMany(targetEntity="AnimalBreed", mappedBy="foodItems")
     *
     */
    private $animalBreeds;
     /**
     * 
     *
     * @ORM\ManyToMany(targetEntity="Animal", mappedBy="foodItems")
     *
     */
    private $animals;
   
     /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="FoodCategory")
     * @ORM\JoinColumn(name="food_category_id", referencedColumnName="id", onDelete="SET NULL")
     * 
     */ 
    private $foodCategories;      
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
        $this->animalBreeds = new \Doctrine\Common\Collections\ArrayCollection();
        $this->animals = new \Doctrine\Common\Collections\ArrayCollection();
        $this->foodCategories = new \Doctrine\Common\Collections\ArrayCollection();
    }
    /**
     * @inheritDoc
     */
    public function __toString() {
        return $this->name;
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
     * Set code
     *
     * @param integer $code
     *
     * @return FoodItem
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return integer
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return FoodItem
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
     * @return FoodItem
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
     * Set datCre
     * @ORM\PrePersist
     * @param \DateTime $datCre
     *
     * @return Category
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
     * @ORM\PrePersist
     * @ORM\PreUpdate
     * @param \DateTime $datUpd
     *
     * @return Category
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
     * Add animalBreed
     *
     * @param \AppBundle\Entity\AnimalBreed $animalBreed
     *
     * @return FoodItem
     */
    public function addAnimalBreed(\AppBundle\Entity\AnimalBreed $animalBreed)
    {
        $this->animalBreeds[] = $animalBreed;

        return $this;
    }

    /**
     * Remove animalBreed
     *
     * @param \AppBundle\Entity\AnimalBreed $animalBreed
     */
    public function removeAnimalBreed(\AppBundle\Entity\AnimalBreed $animalBreed)
    {
        $this->animalBreeds->removeElement($animalBreed);
    }

    /**
     * Get animalBreeds
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnimalBreeds()
    {
        return $this->animalBreeds;
    }

    /**
     * Add animal
     *
     * @param \AppBundle\Entity\Animal $animal
     *
     * @return FoodItem
     */
    public function addAnimal(\AppBundle\Entity\Animal $animal)
    {
        $this->animals[] = $animal;

        return $this;
    }

    /**
     * Remove animal
     *
     * @param \AppBundle\Entity\Animal $animal
     */
    public function removeAnimal(\AppBundle\Entity\Animal $animal)
    {
        $this->animals->removeElement($animal);
    }

    /**
     * Get animals
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnimals()
    {
        return $this->animals;
    }

    /**
     * Add foodCategory
     *
     * @param \AppBundle\Entity\FoodCategory $foodCategory
     *
     * @return FoodItem
     */
    public function addFoodCategory(\AppBundle\Entity\FoodCategory $foodCategory)
    {
        $this->foodCategories[] = $foodCategory;

        return $this;
    }

    /**
     * Remove foodCategory
     *
     * @param \AppBundle\Entity\FoodCategory $foodCategory
     */
    public function removeFoodCategory(\AppBundle\Entity\FoodCategory $foodCategory)
    {
        $this->foodCategories->removeElement($foodCategory);
    }

    /**
     * Get foodCategories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFoodCategories()
    {
        return $this->foodCategories;
    }

    /**
     * Set foodCategories
     *
     * @param \AppBundle\Entity\FoodCategory $foodCategories
     *
     * @return FoodItem
     */
    public function setFoodCategories(\AppBundle\Entity\FoodCategory $foodCategories = null)
    {
        $this->foodCategories = $foodCategories;

        return $this;
    }
}
