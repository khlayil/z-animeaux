<?php

namespace AccessoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rate
 *
 * @ORM\Table(name="rate")
 * @ORM\Entity(repositoryClass="AccessoryBundle\Repository\RateRepository")
 */
class Rate
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
     * @ORM\Column(name="user_id", type="integer")
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="string", length=255)
     */
    private $note;

    /**
     * @var int
     *
     *  @ORM\ManyToOne(targetEntity="AccessoryBundle\Entity\Accessory", inversedBy="Rate")
     * @ORM\JoinColumn(name="accessory_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $accessoryId;


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
     * Set userId
     *
     * @param integer $userId
     *
     * @return Rate
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return Rate
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set accessoryId
     *
     * @param integer $accessoryId
     *
     * @return Rate
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
}

