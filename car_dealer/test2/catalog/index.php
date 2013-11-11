<?php
require_once('../util/main.php');
require_once('../util/tags.php');
require_once('../model/database.php');
require_once('../model/car_db.php');
require_once('../model/make_db.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list_cars';
}

switch ($action) {
    case 'list_cars':
        // get current make
        $make_name = $_GET['make_name'];
        if (empty($make_name)) {
            $make_name = "gmc";
        }

        // get makes and cars
        $current_make = get_make($make_name);
        $makers = get_makers();
        $cars = get_cars_by_make($make_name);

        // Display view
        include('car_list.php');
        break;
    case 'view_car':
        $makers = get_makers();

        // Get cardata
        $car_id = $_GET['car_id'];
        $car = get_car($car_id);

        // Display car
        include('car_view.php');
        break;
}
?>