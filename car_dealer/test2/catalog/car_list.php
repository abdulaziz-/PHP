<?php include '../view/header.php'; ?>
<?php include '../view/sidebar.php'; ?>
<div id="content">
    <h1 class="top"><?php echo $current_make['make_name']; ?></h1>
    <?php if (count($cars) == 0) : ?>
        <p>There are no cars in this make.</p>
    <?php else: ?>
        <?php foreach ($cars as $car) : ?>
        <p>
            <a href="?action=view_car&amp;car_id=<?php
                      echo $car['car_id']; ?>">
                <?php echo $car['name']; ?>
            </a>
        </p>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
<?php include '../view/footer.php'; ?>