<?php
class Product
{
  private $title;
  private $description;
  private $price;
  private $image;
  private $category;
  private $id;
  /**
     * En konstruktor
     * förväntar sig firstName, lastName, gender, age
     */
    public function __construct($title, $description, $price, $image, $category, $id)
    {
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
        $this->category = $category;
        $this->id = $id;
    }
  /***
  * En instansmetod!
  * Konverterar objekt till array
  */
  public function toArray()
  {
    $array = array(
        "title" => $this->title,
        "description" => $this->description,
        "price" => $this->price,
        "image" => $this->image,
        "category" => $this->category,
        "id" => $this->id
    );
    return $array;
  }
}