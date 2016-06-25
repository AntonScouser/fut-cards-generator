<?php

namespace FUTCardGeneratorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class MOTMCardTemplate
{
    private $id;

    private $user;

    /**
     * @var BackgroundImage
     */
    private $backgroundImage;

    /**
     * @var Image
     */
    private $logoImage;

    /**
     * @var GraphicObjectDetails
     */
    private $logoGraphicDetails;
}