<?php
include_once "../Product.php";
include_once "../ProductsArray.php";
class App
{
  /********************************************************
  * Variable to change the number of products displayed per page.
  */
  private static $limit = 20;
  /********************************************************
  * Variable for 'category' of products.
  */
  private static $category = null;
  /********************************************************
  * Array to store error messages
  */
  private static $errors = array();

  /**********************************************************
  * The Main Method for all 20 products - ver.1
  */
  public static function getAllData()
  {
    $products = self::getAllProducts();
    if (self::$errors) self::renderData(self::$errors);
    else self::renderData($products);
  }
  /**********************************************************
   * Main method for filtered products - ver.2
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

  /**********************************************************
   * Method to filter query
   */
  private static function getQuery($var)
  {
      if (isset($_GET[$var])) {
          $query = filter_var($_GET[$var], FILTER_SANITIZE_STRING);
          return $query;
      }
  }

  /**********************************************************
   * Method to get 'limit' - to change the number of products displayed per page.
   */
  private static function getLimit()
  {
      $limit = self::getQuery("show");

      if ($limit < 1 || $limit > 20 || $limit % 1 !== 0) {
        throw new Exception("Show must be a number between 1-20!");

      }
      return $limit;
  }

  /**********************************************************
   * Method to get category
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

  /**********************************************************
   * for v1 - method for get all 20 products
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

 /**********************************************************
  * for v2 - method to filtering product if we have 'limit' or/and 'category' by query string
  */
  private static function getFilteredProducts()
  {
    global $productsArray;

    /*****************************************************
     * Filter by category
     */
    if (self::$category !== null) {
      $productsArray = array_filter($productsArray, function ($product) {
      return $product['category'] === self::getQuery('category');
    });
    }

    self::$limit = min(self::$limit, count($productsArray));

    $products = array();

    for ($i = 0; $i < count($productsArray); $i++) {

      while (count($products) < self::$limit) {
        $j = array_rand($productsArray,1);
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
        /***************************************************
         * Check the uniqe value for new product in $products
        */
        //
        $idProducts = array_column($products, 'id');
        if (!in_array($id, $idProducts)) {
          array_push($products, $product->toArray());
        }
      };
    };
    return $products;
  }
  /**********************************************************
   * Method to render data
   */
  private static function renderData($products)
  {
    echo json_encode($products, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
  }
}