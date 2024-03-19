<?php

namespace models;

/**
 * @package models
 * @author CalinNicolai
 */
class Product
{
    /** @var string @id Product id */
    public string $id;
    /** @var string @name Product name */
    public string $name;
    /** @var string @description Product description */
    public string $description;
    /** @var string @image Product category */
    public string $category;
    /** @var float @price Product price */
    public float $price;
    /** @var string @image Product image */
    public string $image;

    /**
     * @param string $id Product id
     * @param string $name Product name
     * @param float $price Product price
     * @param string $description Product description
     * @param string $image Product image
     * @param string $category Product category
     */
    public function __construct(string $id, string $name, float $price, string $description, string $image, string $category)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->image = $image;
        $this->category = $category;
    }
}
