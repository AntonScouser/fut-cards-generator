<?php

namespace FUTCardGeneratorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="image")
 */
class Image
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     */
    private $id;

    /**
     * @var int
     * @ORM\Column(name="storage", type="integer")
     */
    private $storage;

    /**
     * @var string
     * @ORM\Column(name="file_name", type="string")
     */
    private $fileName;

    /**
     * @var int
     * @ORM\Column(name="size", type="integer")
     */
    private $size;

    /**
     * @var string
     * @ORM\Column(name="file_type", type="string")
     */
    private $fileType;

    /**
     * @var int
     * @ORM\Column(name="width", type="integer")
     */
    private $width;

    /**
     * @var int
     * @ORM\Column(name="height", type="integer")
     */
    private $height;

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
    public function getStorage()
    {
        return $this->storage;
    }

    /**
     * @param int $storage
     */
    public function setStorage($storage)
    {
        $this->storage = $storage;
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
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
    public function getFileType()
    {
        return $this->fileType;
    }

    /**
     * @param string $fileType
     */
    public function setFileType($fileType)
    {
        $this->fileType = $fileType;
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
}
