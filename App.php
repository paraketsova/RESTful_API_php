<?php

include_once "Product.php";

include_once "ProductsArray.php";

class App
{
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
   * En klassmetod för att hämta products list
   */

  private static function getProducts()
  {
    global $productsArray;
    $products = array();

    for ($i = 0; $i < self::$limit; $i++) {
        $element = $productsArray[$i];
        $title = $element["title"];
        $description = $element["description"];
        $price = $element["price"];
        $image = "https://picsum.photos/500?random=" . ($i + 1) . "";
        $category = $element["category"];
        $id = $element["id"];
        $product= new Product(
            $title,
            $description,
            $price,
            $image,
            $category,
            $id,
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