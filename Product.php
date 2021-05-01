<?php
class Product
{
  private $title;
  private $description;
  private $price;
  private $image;
  /**
     * En konstruktor
     * förväntar sig firstName, lastName, gender, age
     */
    public function __construct($title, $description, $price, $image)
    {
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
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
        "image" => $this->image
    );
    return $array;
  }
}