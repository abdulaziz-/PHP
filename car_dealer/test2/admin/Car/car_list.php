<?php include '../../view/header.php'; ?>
<?php include '../../view/sidebar_admin.php'; ?>
<div id="content">
    <h1>Car Manager - List Cars</h1>
    <p>To view, edit, or delete a car, select the car.</p>
    <p>To add a car, select the "Add Car" link.</p>
    <?php if (count($cars) == 0) : ?>
        <p>There are no cars for this make.</p>
    <?php else : ?>
        <h2><?php echo $current_make['make_name']; ?></h2>
            <?php foreach ($cars as $car) : ?>
            <p>
                <a href="?action=view_car&amp;car_id=<?php
                          echo $car['car_id']; ?>">
                    <?php echo $car['name']; ?>
                </a>
            </p>
            <?php endforeach; ?>
    <?php endif; ?>

    <h2>Links</h2>
    <p><a href="index.php?action=show_add_edit_form">Add Car</a></p>
    <p><a href="index.php?action=list_makers">List Makes</a></p>
</div>
<?php include '../../view/footer.php'; ?>