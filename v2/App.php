<?php

include_once "../Product.php";

include_once "../ProductsArray.php";

class App
{
  //private static $limit = isset($_GET["limit"]) ? $_GET["limit"] : 20;
  private static $limit = 20;
  private static $category = null;
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
    try {
        self::$category = self::getCategory() ?? self::$category;
    } catch (Exception $error) {
        array_push(self::$errors, array("Caterory" => $error->getMessage()));
    }

    $products = self::getProducts();
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
      $limit = self::getQuery("show");
      if ($limit && (!is_numeric($limit) || $limit < 1 || $limit > 20)) {
          throw new Exception("Show must be a number between 1-20!");
      }
      return $limit;
  }

  /**
   * En klassmetod för att hämta category
   */
  private static function getCategory()
  {
      $category = self::getQuery("category");
      global $categories;
      if ($category && !in_array($category, $categories)) {
          throw new Exception("Category not found!");
      }
      return $category;
  }

  /**
   * En klassmetod för att hämta product
   */

  /*
  private static function getProducts()
  {
    global $rosor;
    $products = array();
    for ($i = 0; $i < self::$limit; $i++) {
        $title = array_rand($rosor,1);
        $description = $rosor[$title]['description'];
        $price = $rosor[$title]['price'];
        $image = "https://picsum.photos/500?random=" . ($i + 1) . "";
        $product= new Product(
            $title,
            $description,
            $price,
            $image,
            rand(1, 20)
        );
        array_push($products, $product->toArray());
      }
      return $products;
    }
  */

  private static function getProducts()
  {
    global $productsArray;
    $products = array();

    for ($i = 0; $i < self::$limit; $i++) {
      while (count($products) < self::$limit) {
        $j = array_rand($productsArray,1);
        if (array_key_exists('category', $productsArray[$j]) && $productsArray[$j]['category'] == self::$category) {
          //$productsArrayCat = array_filter($productsArray, );
          $element = $productsArray[$j];
          $title = $element["title"];
          $description = $element["description"];
          $price = $element["price"];
          $image = "https://picsum.photos/500?random=" . ($j) . "";
          $category = $element["category"];
          $id = $element["id"];
          $product= new Product(
              $title,
              $description,
              $price,
              $image,
              $category,
              $id,
              rand(1, self::$limit),
          );
          array_push($products, $product->toArray());
        };
      };
    };
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