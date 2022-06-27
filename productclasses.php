<?php
include './databaseclasses.php';

abstract class Product
{
    public $SKU;
    public $name;
    public $price;
    public $skuExistsMsg;
    public $productType;


    function __construct(array $array)
    {
        $this->SKU = $array['sku'];
        $this->name = $array['name'];
        $this->price = $array['price'];
    }



    public function typeDetector(array $array)
    {
        if (isset($array)) {
            if (array_key_exists('size', $array)) {
                $this->productType = 'dvd';
            } elseif (array_key_exists('weight', $array)) {
                $this->productType = 'book';
            } elseif (array_key_exists('height', $array)) {
                $this->productType = 'furniture';
            }
        }
    }


    public abstract function storeInDB(array $array);
}

class DVD extends Product
{
    public $fileSize;

    public function __construct(array $array)
    {
        parent::__construct($array);
    }

    public function storeInDB(array $array)
    {

        if ($this->productType == 'dvd') {
            $this->fileSize = $array['size'];
            try {
                $db = new DB;
                $conn = $db->establishConn();
                $conn = $db->conn;

                $sql = 'INSERT INTO `products` SET
                            `sku`  = :sku,
                            `name` = :pname,
                            `price`= :price,
                            `size` = :size
                            ';

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':sku', $array['sku']);
                $stmt->bindValue(':pname', $array['name']);
                $stmt->bindValue(':price', $array['price']);
                $stmt->bindValue(':size', $this->fileSize);
                $stmt->execute();

                // header('Location: addproduct.php');
            } catch (PDOException $e) {
                if ($e->errorInfo[1] == 1062) {
                    // duplicate entry, do something else
                    $this->skuExistsMsg = 'SKU already exists';
                } else {
                    // an error other than duplicate entry occurred
                    echo "Failed to connect: " . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
                }
            }
            $conn = null;
        }
    }
}

class Book extends Product
{
    public $weight;

    public function __construct(array $array)
    {
        parent::__construct($array);
    }

    public function storeInDB(array $array)
    {
        if ($this->productType == 'book') {
            $this->weight = $array['weight'];
            try {
                $db = new DB;
                $conn = $db->establishConn();
                $conn = $db->conn;

                $sql = 'INSERT INTO `products` SET
                `sku`   = :sku,
                `name`  = :pname,
                `price` = :price,
                `weight`= :weighs
                ';

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':sku', $array['sku']);
                $stmt->bindValue(':pname', $array['name']);
                $stmt->bindValue(':price', $array['price']);
                $stmt->bindValue(':weighs', $this->weight);
                $stmt->execute();

                header('Location: addproduct.php');
            } catch (PDOException $e) {
                if ($e->errorInfo[1] == 1062) {
                    // duplicate entry, do something else
                    $this->skuExistsMsg = 'SKU already exists';
                } else {
                    // an error other than duplicate entry occurred
                    echo "Failed to connect: " . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
                }
            }

            $conn = null;
        }
    }
}

class Furniture extends Product
{
    public $height;
    public $width;
    public $length;

    public function __construct(array $array)
    {
        parent::__construct($array);
    }

    public function storeInDB(array $array)
    {

        if ($this->productType == 'furniture') {
            $this->height = $array['height'];
            $this->width = $array['width'];
            $this->length = $array['length'];
            try {
                $db = new DB;
                $conn = $db->establishConn();
                $conn = $db->conn;

                $sql = 'INSERT INTO `products` SET
                            `sku`  = :sku,
                            `name` = :pname,
                            `price`= :price,
                            `height` = :height,
                            `width` = :width,
                            `length` = :plength
                            ';

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':sku', $array['sku']);
                $stmt->bindValue(':pname', $array['name']);
                $stmt->bindValue(':price', $array['price']);
                $stmt->bindValue(':height', $this->height);
                $stmt->bindValue(':width', $this->width);
                $stmt->bindValue(':plength', $this->length);
                $stmt->execute();

                header('Location: addproduct.php');
            } catch (PDOException $e) {
                if ($e->errorInfo[1] == 1062) {
                    // duplicate entry, do something else
                    $this->skuExistsMsg = 'SKU already exists';
                } else {
                    // an error other than duplicate entry occurred
                    echo "Failed to connect: " . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
                }
            }
            $conn = null;
        }
    }
}
