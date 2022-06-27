<?php
$style		= 'index';

include './productclasses.php';


try {

	$db = new DB;
	$db->getRows();
	$products = $db->allprod;

	
	$ui = new UI;
	$ui->massDelete();
	$ui->paintInterface($products);


	ob_start();

	include './templates/index.html.php';

	$output = ob_get_clean();
} catch (PDOException $e) {

	$output = "Failed to connect: " . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
}

// Perform database operations
include './templates/layout.html.php';
// Close the connection
$conn = null;
