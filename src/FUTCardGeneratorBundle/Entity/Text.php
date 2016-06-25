<?php

namespace FUTCardGeneratorBundle\Entity;

class Text
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var GraphicObjectDetails
     */
    private $graphicDetails;

    /**
     * @var int
     */
    private $size;

    /**
     * @var string
     */
    private $color;

    /**
     * @var string
     */
    private $font;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return GraphicObjectDetails
     */
    public function getGraphicDetails()
    {
        return $this->graphicDetails;
    }

    /**
     * @param GraphicObjectDetails $graphicDetails
     */
    public function setGraphicDetails($graphicDetails)
    {
        $this->graphicDetails = $graphicDetails;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param int $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param string $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function getFont()
    {
        return $this->font;
    }

    /**
     * @param string $font
     */
    public function setFont($font)
    {
        $this->font = $font;
    }
}

