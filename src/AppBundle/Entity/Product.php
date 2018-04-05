<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="tblProductData", uniqueConstraints={@ORM\UniqueConstraint(name="strProductCode", columns={"strProductCode"})})
 * @ORM\Entity
 */
class Product
{
    /**
     * @var string
     *
     * @ORM\Column(name="strProductName", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="strProductDesc", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="strProductCode", type="string", length=10, nullable=false)
     */
    private $code;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dtmAdded", type="datetime", nullable=true)
     */
    private $addedDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dtmDiscontinued", type="datetime", nullable=true)
     */
    private $discontinuedDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="stmTimestamp", type="datetime", nullable=false, options={"default" : 0})
     */
    private $timestamp;

    /**
     * @var integer
     *
     * @ORM\Column(name="intProductDataId", type="integer", options={"unsigned" : true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return \DateTime
     */
    public function getAddedDate(): \DateTime
    {
        return $this->addedDate;
    }

    /**
     * @return \DateTime
     */
    public function getDiscontinuedDate(): \DateTime
    {
        return $this->discontinuedDate;
    }

    /**
     * @return \DateTime
     */
    public function getTimestamp(): \DateTime
    {
        return $this->timestamp;
    }

    /**
     * @param int $id
     *
     * @return Product
     */
    public function setId(int $id): Product
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $name
     *
     * @return Product
     */
    public function setName(string $name): Product
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param string $description
     *
     * @return Product
     */
    public function setDescription(string $description): Product
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param string $code
     *
     * @return Product
     */
    public function setCode(string $code): Product
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @param \DateTime $addedDate
     *
     * @return Product
     */
    public function setAddedDate(\DateTime $addedDate): Product
    {
        $this->addedDate = $addedDate;

        return $this;
    }

    /**
     * @param \DateTime $discontinuedDate
     *
     * @return Product
     */
    public function setDiscontinuedDate(\DateTime $discontinuedDate): Product
    {
        $this->discontinuedDate = $discontinuedDate;

        return $this;
    }

    /**
     * @param \DateTime $timestamp
     *
     * @return Product
     */
    public function setTimestamp(\DateTime $timestamp): Product
    {
        $this->timestamp = $timestamp;

        return $this;
    }
}
