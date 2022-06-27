<?php


class DB
{
	public $allprod;
	public $conn;

	public function establishConn()
	{
		$connection = new PDO("mysql:host=mysql;dbname=fareed", 'fareed', 'dbpw');
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$this->conn = $connection;
	}

	public function getRows()
	{
		$this->establishConn();

		$sql 			= 'SELECT `sku`, `name`, `price`, `weight`, `size`, `height`, `width`, `length` FROM products';
		$result 		= $this->conn->query($sql);

		if ($result->rowCount() > 0) {
			foreach ($result as $row) {
				$products[] = $row;
			}
		} else {
			$products = 0;
		}

		$this->allprod = $products;
	}
}

class UI extends DB
{
	public $html = '';
	public function massDelete()
	{
		$db = new DB;
		$conn = $db->establishConn();
		$conn = $db->conn;

		if (isset($_POST['sku'])) {
			if (count($_POST['sku']) < 2) {
				$sql = 'DELETE FROM `products` WHERE `sku` = :sku';
				$stmt = $conn->prepare($sql);
				$stmt->bindValue(':sku', $_POST['sku'][0]);
				$stmt->execute();
			} else {
				foreach ($_POST['sku'] as $key) {

					$sql = 'DELETE FROM `products` WHERE `sku` = :sku';
					$stmt = $conn->prepare($sql);
					$stmt->bindValue(':sku', $key);
					$stmt->execute();
				}
			}
			header('Location: index.php');
		}
	}

	public function paintInterface($products)
	{
		if ($products > 0) {
			foreach ($products as  $product) {

				$this->html .= "<div class='product-item'>";
				$this->html .= "<input class='delete-checkbox' type='checkbox' name='sku[]' value=" . $product['sku'] .  ">";
				$this->html .= "<ul class='product-info'>";
				$this->html .= "<li>" . $product['sku'] . "</li>";
				$this->html .= "<li>" . $product['name'] . "</li>";
				$this->html .= "<li>" . $product['price'] . " $</li>";

				if ($product['size']) {
					$this->html .= "<li>Size: " . $product['size'] . "</li>";
				}
				if ($product['weight']) {
					$this->html .= "<li>Weight: " . $product['weight'] . "</li>";
				}
				if ($product['height']) {
					$this->html .= "<li>Dimensions: " . $product['height'] . "x" . $product['width'] . "x" . $product['length'] . "</li>";
				}

				$this->html .= "</ul>";
				$this->html .= "</div>";
			}
		}
	}
}
