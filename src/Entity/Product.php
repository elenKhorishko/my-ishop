<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Product
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @var string
     * @ORM\Column(type="string", length=250)
     */
    private $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Product
     */
    public function setName(string $name): Product
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrice(): string
    {
        return $this->price;
    }

    /**
     * @param string $price
     * @return Product
     */
    public function setPrice(string $price): Product
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Product
     */
    public function setDescription(string $description): Product
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @var string
     * @ORM\Column(type="decimal", scale=2)
     */
    private $price;

    /**
     * @var string
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @var Category
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="products")
     * @ORM\JoinColumn(name="category_id", onDelete="CASCADE")
     */
    private $category;

    /**
     * @return Category
     */
    public function getCategory(): Category
    {
        return $this->category;
    }

    /**
     * @param Category $category
     * @return Product
     */
    public function setCategory(Category $category): Product
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @var bool
     * @ORM\Column(type="boolean", options={"default" : false})
     */
    private $isTop;

    public function __construct()
    {
        $this->isTop = false;
    }

    /**
     * @return bool
     */
    public function isTop(): bool
    {
        return $this->isTop;
    }

    /**
     * @param bool $isTop
     * @return Product
     */
    public function setIsTop(bool $isTop): Product
    {
        $this->isTop = $isTop;
        return $this;
    }


}
