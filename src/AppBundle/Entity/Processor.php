<?php
/**
 * Created by PhpStorm.
 * User: patrikas
 * Date: 16.11.12
 * Time: 19.36
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProcessorRepository")
 * @ORM\Table(name="processor")
 */
class Processor
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $processorModel;

    /**
     * @ORM\Column(type="string")
     */
    private $manufacturer;

    /**
     * @return mixed
     */
    public function getProcessorModel()
    {
        return $this->processorModel;
    }

    /**
     * @param mixed $processorModel
     */
    public function setProcessorModel($processorModel)
    {
        $this->processorModel = $processorModel;
    }

    /**
     * @return mixed
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * @param mixed $manufacturer
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function __toString()
    {
        return $this->getProcessorModel();
    }
}