<?php
class Product
{
  private $title;
  private $description;
  private $price;
  /**
     * En konstruktor
     * förväntar sig firstName, lastName, gender, age
     */
    public function __construct($title, $description, $price)
    {
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
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
        "price" => $this->price
    );
    return $array;
  }
}