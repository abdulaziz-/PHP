<?php
function get_cars_by_make($make_name) {
    global $db;
    $query = 'SELECT * FROM car
              WHERE make_name = ?
              ORDER BY car_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(1, $make_name);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_cars() {
    global $db;
    $query = 'SELECT * FROM car ORDER BY car_id';
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_car($car_id) {
    global $db;
    $query = 'SELECT *
              FROM car
              WHERE car_id = ?';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(1, $car_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function add_car($car_id, $name, $make_name, $year, $price, $description) {
    global $db;
    $query = 'INSERT INTO car
                 (car_id, name, make_name, year, price, description)
              VALUES
                 (?, ?, ?, ?, ?, ?)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(1, $car_id);
        $statement->bindValue(2, $name);
        $statement->bindValue(3, $make_name);
        $statement->bindValue(4, $year);
        $statement->bindValue(5, $price);
        $statement->bindValue(6, $description);
        $statement->execute();
        $statement->closeCursor();

        // Get the last car ID that was automatically generated
        $car_id = $db->lastInsertId();
        return $car_id;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function update_car($car_id, $name, $make_name, $year, $price, $description) {
    global $db;
    $query = 'UPDATE car
              SET name = ?,
	make_name = ?,
	year = ?,
                price = ?,
	description = ? where car_id = ?';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(6, $car_id);
        $statement->bindValue(1, $name);
        $statement->bindValue(2, $make_name);
        $statement->bindValue(3, $year);
        $statement->bindValue(4, $price);	
        $statement->bindValue(5, $description);
        $row_count = $statement->execute();
        $statement->closeCursor();
        return $row_count;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function delete_car($car_id) {
    global $db;
    $query = 'DELETE FROM car WHERE car_id = ?';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(1, $car_id);
        $row_count = $statement->execute();
        $statement->closeCursor();
        return $row_count;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}
?>
