<?php include '../../view/header.php'; ?>
<?php include '../../view/sidebar_admin.php'; ?>
<div id="content">
    <?php
    if (isset($car_id)) {
        $heading_text = 'Edit Car';
    } else {
        $heading_text = 'Add Car';
    }
    ?>
    <h1 class="top">Car Manager - <?php echo $heading_text; ?></h1>
    <form action="index.php" method="post" id="add_edit_car_form">
        <?php if (isset($car_id)) : ?>
            <input type="hidden" name="action" value="update_car" />
            <input type="hidden" name="car_id"
                   value="<?php echo $car_id; ?>" />
        <?php else: ?>
            <input type="hidden" name="action" value="add_car" />
        <?php endif; ?>
            <input type="hidden" name="make_name"
                   value="<?php echo $car['make_name']; ?>" />

        <label>Make:</label>
        <select name="make_name">
        <?php foreach ($makers as $make) : 
            if ($make['make_name'] == $car['make_name']) {
                $selected = 'selected';
            } else {
                $selected = '';
            }
        ?>
            <option value="<?php echo $make['make_name']; ?>"<?php
                      echo $selected ?>>
                <?php echo $make['make_name']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br />

        <label>ID:</label>
        <input type="input" name="car_id"
               value="<?php echo $car['car_id']; ?>" />
        <br />

        <label>Name:</label>
        <input type="input" name="name" 
               value="<?php echo $car['name']; ?>" />
        <br />

        <label>Year:</label>
        <input type="input" name="year" 
               value="<?php echo $car['year']; ?>" />
        <br />

        <label>Price:</label>
        <input type="input" name="price" 
               value="<?php echo $car['price']; ?>" />
        <br />

        <label>Description:</label>
        <textarea name="description" rows="10">
            <?php echo $car['description']; ?></textarea>
        <br />

        <label>&nbsp;</label>
        <input type="submit" value="Submit" />

    </form>
    <h2>How to format the Description entry</h2>
    <ul>
        <li>Use two returns to start a new paragraph.</li>
        <li>Use an asterisk to mark items in a bulleted list.</li>
        <li>Use one return between items in a bulleted list.</li>
        <li>Use standard HMTL tags for bold and italics.</li>
    </ul>

</div>
<?php include '../../view/footer.php'; ?>