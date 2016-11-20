<?php
/**
 * Created by PhpStorm.
 * User: patrikas
 * Date: 16.11.12
 * Time: 19.44
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="graphics_card")
 */
class GraphicsCard
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
    private $graphicsCardModel;

    /**
     * @ORM\Column(type="string")
     */
    private $manufacturer;

    /**
     * @return mixed
     */
    public function getGraphicsCardModel()
    {
        return $this->graphicsCardModel;
    }

    /**
     * @param mixed $graphicsCardModel
     */
    public function setGraphicsCardModel($graphicsCardModel)
    {
        $this->graphicsCardModel = $graphicsCardModel;
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
        return $this->getGraphicsCardModel();
    }
}