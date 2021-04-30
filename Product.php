<?php
class Product
{
  /***
  * En instansmetod!
  * Konverterar objekt till array
  */
  public function toArray()
  {
    $array = array(
        "firstName" => $this->firstName,
        "lastName" => $this->lastName,
        "gender" => $this->gender,
        "age" => $this->age,
        "email" => $this->email,
    );
    return $array;
  }
}