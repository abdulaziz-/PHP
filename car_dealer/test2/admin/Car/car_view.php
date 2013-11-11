<?php include '../../view/header.php'; ?>
<?php include '../../view/sidebar_admin.php'; ?>
<div id="content">
    <h1>Car Manager - View Car</h1>
    
    <!-- display car -->
    <?php include '../../view/car.php'; ?>

    <!-- display buttons -->
    <div id="buttons">
        <form action="" method="post" id="edit_button_form" >
            <input type="hidden" name="action" value="show_add_edit_form">
            <input type="hidden" name="car_id"
                   value="<?php echo $car['car_id']; ?>" />
            <input type="hidden" name="make_name"
                   value="<?php echo $car['make_name']; ?>" />
            <input type="submit" value="Edit Car" >
        </form>
        <form action="" method="post" >
            <input type="hidden" name="action" value="delete_car">
            <input type="hidden" name="car_id"
                   value="<?php echo $car['car_id']; ?>" />
            <input type="hidden" name="make_name" 
                   value="<?php echo $car['make_name']; ?>" />
            <input type="submit" value="Delete Car">
        </form>
    </div>
</div>
<?php include '../../view/footer.php'; ?>