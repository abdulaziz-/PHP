<?php
require_once('../../util/main.php');
require_once('../../util/tags.php');
require_once('../../model/database.php');
require_once('../../model/car_db.php');
require_once('../../model/make_db.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list_cars';
}

$action = strtolower($action);
switch ($action) {
    case 'list_cars':
        // get makes and cars
        $make_name = $_GET['make_name'];
        if (empty($make_name)) {
            $make_name = 'GMC';
        }
        $current_make = get_make($make_name);
        $makers = get_makers();
        $cars = get_cars_by_make($make_name);

        // display car list
        include('car_list.php');
        break;
    case 'view_car':
        $makers = get_makers();
        $car_id = $_GET['car_id'];
        $car = get_car($car_id);
        include('car_view.php');
        break;
    case 'delete_car':
        $make_name = $_POST['make_name'];
        $car_id = $_POST['car_id'];
        delete_car($car_id);
        
        // Display the Car List page for the current make
        header("Location: .?make_name=$make_name");
        break;
    case 'show_add_edit_form':
        if (isset($_GET['car_id'])) {
            $car_id = $_GET['car_id'];
        } else {
            $car_id = $_POST['car_id'];
        }
        $car = get_car($car_id);
        $makers = get_makers();
        include('car_add_edit.php');
        break;
    case 'add_car':
        $make_name = $_POST['make_name'];
        $car_id = $_POST['car_id'];
        $name = $_POST['name'];
        $year = $_POST['year'];
        $price = $_POST['price'];
        $description = $_POST['description'];

        // Validate inputs
        if (empty($car_id) || empty($name) || empty ($price) || empty($description)) {
            $error = 'Invalid car data.
                      Check all fields and try again.';
            include('../../errors/error.php');
        } else {
            $makers = get_makers();
            $car_id = add_car($car_id, $name, $make_name, $year, $price, $description);
            $car = get_car($car_id);
            include('car_view.php');
        }
        break;
    case 'update_car':
        $car_id = $_POST['car_id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $year = $_POST['year'];
        $description = $_POST['description'];
        $make_name = $_POST['make_name'];

        // Validate inputs
        if (empty($car_id) || empty($name) || empty($price) || empty($description) || empty($make_name)) {
            $error = 'Invalid car data.
                      Check all fields and try again.';
            include('../../errors/error.php');
        } else {
            $makers = get_makers();
            update_car($car_id, $name, $price, $description);
            $car = get_car($car_id);
            include('car_view.php');
        }
        break;

    case 'list_makers':
        $makers = get_makers();
        include('make_list.php');
        break;
    case 'add_make':
        $name = $_POST['name'];

        // Validate inputs
        if (empty($name)) {
            $error = "Invalid make name. Check name and try again.";
            include('../../errors/error.php');
        } else {
            add_make($name);
            header('Location: .?action=list_makers');  // display the Makers List page
        }
        break;
    case 'delete_make':
        $make_name = $_POST['make_name'];

        $car_count = get_car_count($make_name);
        if ($car_count > 0) {
            display_db_error("This make can't be deleted because it contains cars.");
        } else {
            delete_make($make_name);
            header('Location: .?action=list_makers');      // display the Make List page
        }
        break;
}
?>