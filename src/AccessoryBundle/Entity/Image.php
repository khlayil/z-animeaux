<?php

namespace AccessoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Image
 *
 * @ORM\Table(name="image")
 * @ORM\Entity(repositoryClass="AccessoryBundle\Repository\ImageRepository")
 */
class Image
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *

     * @ORM\ManyToOne(targetEntity="AccessoryBundle\Entity\Accessory", inversedBy="Image")
     * @ORM\JoinColumn(name="accessory_id", referencedColumnName="id" , onDelete="CASCADE")
     */

    private $accessoryId;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set accessoryId
     *
     * @param integer $accessoryId
     *
     * @return Image
     */
    public function setAccessoryId($accessoryId)
    {
        $this->accessoryId = $accessoryId;

        return $this;
    }

    /**
     * Get accessoryId
     *
     * @return int
     */
    public function getAccessoryId()
    {
        return $this->accessoryId;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Image
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}

