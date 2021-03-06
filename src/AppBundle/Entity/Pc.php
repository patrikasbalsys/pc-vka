<?php
/**
 * Created by PhpStorm.
 * User: patrikas
 * Date: 16.11.12
 * Time: 17.51
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PcRepository")
 * @ORM\Table(name="pc")
 */
class Pc
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $model;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Processor")
     * @ORM\JoinColumn(nullable=false)
     */
    private $processor;

    /**
     * @ORM\Column(type="integer", length=100)
     */
    private $ram;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GraphicsCard")
     * @ORM\JoinColumn(nullable=false)
     */
    private $graphicsCard;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $diskSpace;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $system;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }


    /**
     * @return mixed
     */
    public function getRam()
    {
        return $this->ram;
    }

    /**
     * @param mixed $ram
     */
    public function setRam($ram)
    {
        $this->ram = $ram;
    }



    /**
     * @return mixed
     */
    public function getDiskSpace()
    {
        return $this->diskSpace;
    }

    /**
     * @param mixed $diskSpace
     */
    public function setDiskSpace($diskSpace)
    {
        $this->diskSpace = $diskSpace;
    }

    /**
     * @return mixed
     */
    public function getSystem()
    {
        return $this->system;
    }

    /**
     * @param mixed $system
     */
    public function setSystem($system)
    {
        $this->system = $system;
    }


    /**
     * Set processor
     *
     * @param \AppBundle\Entity\Processor $processor
     *
     * @return Pc
     */
    public function setProcessor(\AppBundle\Entity\Processor $processor)
    {
        $this->processor = $processor;

        return $this;
    }

    /**
     * Get processor
     *
     * @return \AppBundle\Entity\Processor
     */
    public function getProcessor()
    {
        return $this->processor;
    }

    /**
     * Set graphicsCard
     *
     * @param \AppBundle\Entity\GraphicsCard $graphicsCard
     *
     * @return Pc
     */
    public function setGraphicsCard(\AppBundle\Entity\GraphicsCard $graphicsCard)
    {
        $this->graphicsCard = $graphicsCard;

        return $this;
    }

    /**
     * Get graphicsCard
     *
     * @return \AppBundle\Entity\GraphicsCard
     */
    public function getGraphicsCard()
    {
        return $this->graphicsCard;
    }
}
