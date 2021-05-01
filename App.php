<?php

include_once "Product.php";

include_once "ProductsArray.php";

class App
{
  //private static $category = ["Roses", "Klematis"];
  //private static $rosesArray;
  //private static $roses_description = $rosesDescriptionArray;

  //private static $price = rand(170, 290);
  //private static $image = null;
  //private static $limit = isset($_GET["limit"]) ? $_GET["limit"] : 20;
  private static $limit = 20;
  private static $errors = array();

  /**
  * The Main Method
  */
  public static function main()
  {
    try {
        self::$limit = self::getLimit() ?? self::$limit;
    } catch (Exception $error) {
        array_push(self::$errors, array("Limit" => $error->getMessage()));
    }

    $products = self::getProducts(self::$limit);
    if (self::$errors) self::renderData(self::$errors);
    else self::renderData($products);
  }

  /**
   * En klassmetod för att hämta och filtrera query
   */
  private static function getQuery($var)
  {
      if (isset($_GET[$var])) {
          $query = filter_var($_GET[$var], FILTER_SANITIZE_STRING);//Удаляет теги и кодирует двойные и одинарные кавычки, при необходимости удаляет или кодирует специальные символы.
          return $query;
      }
  }

  /**
   * En klassmetod för att hämta limit
   */
  private static function getLimit()
  {
      $limit = self::getQuery("limit");
      if ($limit && (!is_numeric($limit) || $limit < 1 || $limit > 20)) {
          throw new Exception("Limit must be a number between 1-20!");
      }
      return $limit;
  }

  /**
   * En klassmetod för att hämta product
   */
  private static function getProducts()
  {
    global $rosesArray;
    global $rosesDescriptionArray;
    $products = array();
    for ($i = 0; $i < self::$limit; $i++) {
        $title = $rosesArray[rand(0, 19)];
        $description = $rosesDescriptionArray[$title];
        $price = rand(180, 250);
        $product= new Product(
            $title,
            $description,
            $price,
            rand(1, 20),
        );
        array_push($products, $product->toArray());
    }
    return $products;
  }

  /**
   * En klassmetod för att rendera data
   */
  private static function renderData($products)
  {
    echo json_encode($products, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
  }
}