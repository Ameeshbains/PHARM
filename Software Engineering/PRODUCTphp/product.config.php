<?php

class Product {
    private $name;
    private $price;

    private $category;

    private $description;


    private $IMG;

    public function __construct($name, $price, $category,$description,$IMG) {
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
        $this->description = $description;
        $this->IMG = $IMG;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getCategory() {

        return $this->category;
    }

    public function getDescription() {

        return $this->description;
    }

    public function getIMG() {

        return $this->IMG;
    }

   


}





?>