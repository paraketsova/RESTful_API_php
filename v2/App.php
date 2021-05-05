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
  * The Main Method for all 20 products - ver.1
  */
  public static function getAllData()
  {
    $products = self::getAllProducts();
    if (self::$errors) self::renderData(self::$errors);
    else self::renderData($products);
  }
//================================================
  /**
   * Main metod for filtered products - ver.2
  */
  public static function getFilteredData()
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

    $products = self::getFilteredProducts();
    if (self::$errors) self::renderData(self::$errors);
    else self::renderData($products);
  }


  /**
   * Metod to filter query
   */
  private static function getQuery($var)
  {
      if (isset($_GET[$var])) {
          $query = filter_var($_GET[$var], FILTER_SANITIZE_STRING);//Удаляет теги и кодирует двойные и одинарные кавычки, при необходимости удаляет или кодирует специальные символы.
          return $query;
      }
  }

  /**
   * Metod to get limit
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
   * metod for v1 - all 20 products - ver.1
   */
  private static function getAllProducts()
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
 /***
  * for v2 - if we have limit or/and category
  */

  private static function getFilteredProducts()
  {
    global $productsArray;
    $products = array();

    for ($i = 0; $i < count($productsArray); $i++) {
      while (count($products) < self::$limit) {
        $j = array_rand($productsArray,1);
        if (self::$category !==null) {
          $categoryProducts = array_column($productsArray, 'category');

        }
        if (array_key_exists('category', $productsArray[$j]) && $productsArray[$j]['category'] == self::$category) {
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
            /**
             * Check the uniger value for new product in $prodacts array
            */
            //
            $idProducts = array_column($products, 'id');
            if (!in_array($id, $idProducts)) {
              array_push($products, $product->toArray());
            }
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