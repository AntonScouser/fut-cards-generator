<?php

namespace FUTCardGeneratorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class BackgroundImage
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     */
    private $id;

    /**
     * @var Image
     * @ORM\OneToMany(targetEntity="FUTCardGeneratorBundle\Entity\Image")
     */
    private $image;

    /**
     * @var GraphicObjectDetails
     * @ORM\OneToOne(targetEntity="FUTCardGeneratorBundle\Entity\GraphicObjectDetails")
     */
    private $graphicDetails;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param Image $image
     */
    public function setImage(Image $image)
    {
        $this->image = $image;
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
    public function setGraphicDetails(GraphicObjectDetails $graphicDetails)
    {
        $this->graphicDetails = $graphicDetails;
    }
}
