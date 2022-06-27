<?php
$style 		= 'addproduct';

include './productclasses.php';


if (!empty($_POST)) {
	$dvd = new DVD($_POST);
	$dvd->typeDetector($_POST);
	$dvd->storeInDB($_POST);

	$book = new Book($_POST);
	$book->typeDetector($_POST);
	$book->storeInDB($_POST);

	$furniture = new Furniture($_POST);
	$furniture->typeDetector($_POST);
	$furniture->storeInDB($_POST);
}


ob_start();

include './templates/addproduct.html.php';



$output = ob_get_clean();




include './templates/layout.html.php';
// Close the connection
$conn = null;
