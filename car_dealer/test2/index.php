<?php
require_once('util/main.php');
require_once('util/tags.php');
require_once('model/database.php');
require_once('model/car_db.php');
require_once('model/make_db.php');

// Get all the makers
$makers = get_makers();

// Set the featured car IDs in an array
$car_ids = array(1, 7, 9);
// Note: You could also store a list of featured cars in the database

// Get an array of featured cars from the database
$cars = array();
foreach ($car_ids as $car_id) {
    $car = get_car($car_id);
    $cars[] = $car;   // add cars to array
}

// Display the home page
include('home_view.php');
?>
