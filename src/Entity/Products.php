<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductsRepository")
 */
class Products
{
    public function __construct(){
        $this->$price= 2.99;
        $this->$count = 20;
        $this->$soldOut = true;
        $this->$Description = "super product";
        $this->$Discount = true;
        $this->$ProcentDiscount = 0.25;
        $this->$NeedProduct = true;
    }
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $count;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $soldOut;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Description;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $Discount;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $ProcentDiscount;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $NeedProduct;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCount(): ?int
    {
        return $this->count;
    }

    public function setCount(?int $count): self
    {
        $this->count = $count;

        return $this;
    }

    public function getSoldOut(): ?bool
    {
        return $this->soldOut;
    }

    public function setSoldOut(?bool $soldOut): self
    {
        $this->soldOut = $soldOut;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getDiscount(): ?bool
    {
        return $this->Discount;
    }

    public function setDiscount(?string $Discount): self
    {
        $this->Discount = $Discount;

        return $this;
    }

    public function getProcentDiscount(): ?float
    {
        return $this->ProcentDiscount;
    }

    public function setProcentDiscount(?string $ProcentDiscount): self
    {
        $this->ProcentDiscount = $ProcentDiscount;

        return $this;
    }

    public function getNeedProduct(): ?bool
    {
        return $this->NeedProduct;
    }

    public function setNeedProduct(?string $NeedProduct): self
    {
        $this->NeedProduct = $NeedProduct;

        return $this;
    }
}
