<?php
    // Parse data
    $car_id = $car['car_id'];
    $name = $car['name'];
    $make_name = $car['make_name'];
    $year = $car['year'];
    $price = $car['price'];
    $description = $car['description'];

    // Add HMTL tags to the description
    $description = add_tags($description);

    // Get image URL and alternate text
    $image_filename = $car_id . '_m.png';
    $image_path = $app_path . 'images/' . $image_filename;
    $image_alt = 'Image filename: ' . $image_filename;
?>

<h1><?php echo $name; ?></h1>
<div id="left_column">
    <p><img src="<?php echo $image_path; ?>"
            alt="<?php echo $image_alt; ?>" /></p>
</div>

<div id="right_column">
    <p><b>Car ID:</b>
        <?php echo $car_id; ?></p>
    <p><b>Make Name:</b>
        <?php echo $make_name; ?></p>
    <p><b>Name:</b>
        <?php echo $name; ?></p>
    <p><b>Price:</b>
        <?php echo $price; ?></p>
    <p><b>Year:</b>
        <?php echo $year; ?></p>
        <h2>Description</h2>
    <?php echo $description; ?>
</div>