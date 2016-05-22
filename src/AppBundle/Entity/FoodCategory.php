<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * FoodCategory
 *
 * @ORM\Table(name="food_category")
 * @ORM\Entity
 * @UniqueEntity("name")
 * @ORM\HasLifecycleCallbacks()
 */
class FoodCategory {

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
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="FoodCategory")
     * @ORM\JoinColumn(name="food_category_id", referencedColumnName="id", onDelete="SET NULL")
     * 
     */ 
    private $foodItem;   

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
     * @return FoodCategory
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
     * @return FoodCategory
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
     *
     * @param \DateTime $datCre
     *
     * @return FoodCategory
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
     * @return FoodCategory
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
     * Set foodItem
     *
     * @param \AppBundle\Entity\FoodCategory $foodItem
     *
     * @return FoodCategory
     */
    public function setFoodItem(\AppBundle\Entity\FoodCategory $foodItem = null)
    {
        $this->foodItem = $foodItem;

        return $this;
    }

    /**
     * Get foodItem
     *
     * @return \AppBundle\Entity\FoodCategory
     */
    public function getFoodItem()
    {
        return $this->foodItem;
    }
}
