<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * AnimalHabitat
 *
 * @ORM\Table(name="animal_habitat")
 * @ORM\Entity
 * @UniqueEntity("name")
 * @ORM\HasLifecycleCallbacks()
 */
class AnimalHabitat {

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
     * @ORM\ManyToOne(targetEntity="AnimalBreed")
     * @ORM\JoinColumn(name="animal_habitat_id", referencedColumnName="id", onDelete="SET NULL")
     * 
     */ 
    private $animalBreed; 

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
     * @return AnimalHabitat
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
     * @return AnimalHabitat
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
     * @return AnimalHabitat
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
     * @return AnimalHabitat
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
     * Set animalBreed
     *
     * @param \AppBundle\Entity\AnimalBreed $animalBreed
     *
     * @return AnimalHabitat
     */
    public function setAnimalBreed(\AppBundle\Entity\AnimalBreed $animalBreed = null)
    {
        $this->animalBreed = $animalBreed;

        return $this;
    }

    /**
     * Get animalBreed
     *
     * @return \AppBundle\Entity\AnimalBreed
     */
    public function getAnimalBreed()
    {
        return $this->animalBreed;
    }
}
