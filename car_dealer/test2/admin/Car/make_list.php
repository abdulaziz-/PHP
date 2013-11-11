<?php include '../../view/header.php'; ?>
<?php include '../../view/sidebar_admin.php'; ?>
<div id="content">
    <h1>Car Manager - Make List</h1>
    <table id="make_table" >
        <tr>
            <th class="left" >Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($makers as $make) : ?>
        <tr>
            <td><?php echo $make['make_name']; ?></td>
            <td>
                <form id="delete_car_form"
                      action="index.php" method="post">
                    <input type="hidden" name="action" value="delete_make" />
                    <input type="hidden" name="make_name"
                           value="<?php echo $make['make_name']; ?>"/>
                    <input type="submit" value="Delete"/>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br />

    <h2>Add Make</h2>
    <form id="add_make_form"
          action="index.php" method="post">
        <input type="hidden" name="action" value="add_make" />

        
        <input type="input" name="name" />
        <input type="submit" value="Add"/>
    </form>

    <p><a href="index.php?action=list_cars">List Cars</a></p>

</div>
<?php include '../../view/footer.php'; ?>