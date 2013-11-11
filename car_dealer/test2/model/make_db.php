<?php
function get_makers() {
    global $db;
    $query = 'SELECT * FROM make
              ORDER BY make_name';
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function get_make($make_name) {
    global $db;
    $query = 'SELECT * FROM make
              WHERE make_name= :make_name';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':make_name', $make_name);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function add_make($name) {
    global $db;
    $query = 'INSERT INTO make
                 (make_name)
              VALUES
                 (:name)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->execute();
        $statement->closeCursor();

        // Get the last make ID that was automatically generated
        $make_name = $db->lastInsertId();
        return $make_name;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function update_make($make_name, $name) {
    global $db;
    $query = '
        UPDATE make
        SET make_name = :name
        WHERE make_name = :make_name';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':make_name', $make_name);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function delete_make($make_name) {
    global $db;
    $query = 'DELETE FROM make WHERE make_name = :make_name';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':make_name', $make_name);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_car_count($make_name) {
    global $db;
    $query = 'SELECT COUNT(*) AS carCount
              FROM cars
              WHERE make_name = :make_name';
    $statement = $db->prepare($query);
    $statement->bindValue(':make_name', $make_name);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();

    $car_count = $result[0]['carCount'];
    return $car_count;
}

?>
