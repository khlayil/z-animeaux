<?php

namespace AccessoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Accessory
 *
 * @ORM\Table(name="accessory")
 * @ORM\Entity(repositoryClass="AccessoryBundle\Repository\AccessoryRepository")
 */
class Accessory
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="image_url", type="string", length=255)
     * @Assert\NotBlank(message="Please, upload the product brochure as a PNG file.")
     *
     */
    private $imageUrl;
    /**
     * @ORM\OneToMany(targetEntity="AccessoryBundle\Entity\Image", mappedBy="accessoryId")
     */
    private $images;

    /**
     * @return mixed
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param mixed $images
     */
    public function setImages($images)
    {
        $this->images = $images;
    }

    /**
     * @var int
     *
     * @ORM\Column(name="stock", type="integer")
     */
    private $stock;

    /**
     * @var int
     *
     * @ORM\Column(name="rate", type="integer")
     */
    private $rate;

    /**
     * @var int
     *
     * @ORM\Column(name="promo", type="integer")
     */
    private $promo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="inserted", type="date")
     */
    private $inserted;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modificated", type="date")
     */
    private $modificated;


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
     * Set name
     *
     * @param string $name
     *
     * @return Accessory
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Accessory
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Accessory
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Accessory
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set imageUrl
     *
     * @param string $imageUrl
     *
     * @return Accessory
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * Get imageUrl
     *
     * @return string
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * Set stock
     *
     * @param integer $stock
     *
     * @return Accessory
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return int
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set rate
     *
     * @param integer $rate
     *
     * @return Accessory
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get rate
     *
     * @return int
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set promo
     *
     * @param integer $promo
     *
     * @return Accessory
     */
    public function setPromo($promo)
    {
        $this->promo = $promo;

        return $this;
    }

    /**
     * Get promo
     *
     * @return int
     */
    public function getPromo()
    {
        return $this->promo;
    }

    /**
     * Set inserted
     *
     * @param \DateTime $inserted
     *
     * @return Accessory
     */
    public function setInserted($inserted)
    {
        $this->inserted = $inserted;

        return $this;
    }

    /**
     * Get inserted
     *
     * @return \DateTime
     */
    public function getInserted()
    {
        return $this->inserted;
    }

    /**
     * Set modificated
     *
     * @param \DateTime $modificated
     *
     * @return Accessory
     */
    public function setModificated($modificated)
    {
        $this->modificated = $modificated;

        return $this;
    }

    /**
     * Get modificated
     *
     * @return \DateTime
     */
    public function getModificated()
    {
        return $this->modificated;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add image
     *
     * @param \AccessoryBundle\Entity\Image $image
     *
     * @return Accessory
     */
    public function addImage(\AccessoryBundle\Entity\Image $image)
    {
        $this->images[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param \AccessoryBundle\Entity\Image $image
     */
    public function removeImage(\AccessoryBundle\Entity\Image $image)
    {
        $this->images->removeElement($image);
    }
}
