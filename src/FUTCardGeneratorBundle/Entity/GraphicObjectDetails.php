<?php

namespace FUTCardGeneratorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class GraphicObjectDetails
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     */
    private $id;

    /**
     * @var int
     * @ORM\Column(name="position_x", type="integer")
     */
    private $positionX;

    /**
     * @var int
     * @ORM\Column(name="position_y", type="integer")
     */
    private $positionY;

    /**
     * @var int
     * @ORM\Column(name="height", type="integer")
     */
    private $height;

    /**
     * @var int
     * @ORM\Column(name="width", type="integer")
     */
    private $width;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getPositionX()
    {
        return $this->positionX;
    }

    /**
     * @param int $positionX
     */
    public function setPositionX($positionX)
    {
        $this->positionX = $positionX;
    }

    /**
     * @return int
     */
    public function getPositionY()
    {
        return $this->positionY;
    }

    /**
     * @param int $positionY
     */
    public function setPositionY($positionY)
    {
        $this->positionY = $positionY;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param int $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param int $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }
}
