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
     * Set material
     *
     * @param string $material
     *
     * @return Cage
     */
    public function setMaterial($material)
    {
        $this->material = $material;

        return $this;
    }

    /**
     * Get material
     *
     * @return string
     */
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * Set location
     *
     * @param string $location
     *
     * @return Cage
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set number
     *
     * @param integer $number
     *
     * @return Cage
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set datCre
     *
     * @param \DateTime $datCre
     *
     * @return Cage
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
     * @return Cage
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
     * Set animal
     *
     * @param \AppBundle\Entity\Animal $animal
     *
     * @return Cage
     */
    public function setAnimal(\AppBundle\Entity\Animal $animal = null)
    {
        $this->animal = $animal;

        return $this;
    }

    /**
     * Get animal
     *
     * @return \AppBundle\Entity\Animal
     */
    public function getAnimal()
    {
        return $this->animal;
    }
}
