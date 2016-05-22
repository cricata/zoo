<?php

namespace AppBundle\Entity;

use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * FileUpload
 *
 * @ORM\Table(name="file_upload")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class FileUpload
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    private $id;

    private $temp;

    /**
     * @ORM\Column(name="tip", type="string", length=255)
     *
     */
    private $tip;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_used", type="boolean", nullable=true)
     */
    private $isUsed;

    /**
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     * 
     * 
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * 
     */
    public $path;

    /**
     * @Assert\File(maxSize="6000000",
     *     mimeTypes= {"text/plain", "text/csv", "application/csv", "text/excel", "application/excel"},
     *     mimeTypesMessage = "Please upload a valid CSV | excel file")
     */
    private $file;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dat_cre", type="datetime")
     */
    private $datCre;

   


}
