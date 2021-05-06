<?php
class Product
{
  private $title;
  private $description;
  private $price;
  private $image;
  private $category;
  private $id;
  /***************************************************
     * Constructor for creating object from a class 'Product'
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
  /***************************************************
  * Instance method to conversion
  * object to array
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