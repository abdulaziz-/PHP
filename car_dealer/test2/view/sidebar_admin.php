<div id="sidebar">
    <ul>
        <h2>Links</h2>
        <li>
            <a href="<?php echo $app_path; ?>">Home</a>
        </li>
        <li>
            <a href="<?php echo $app_path; ?>admin">Admin</a>
        </li>
        
        <h2>Makers</h2>
                <!-- display links for all makers  -->
        <?php foreach ($makers as $make) : ?>
        <li>
            <a href="<?php echo $app_path .
                'admin/Car?action=list_cars' .
                '&amp;make_name=' . $make['make_name']; ?>">
                <?php echo $make['make_name']; ?>
            </a>
        </li>
        <?php endforeach; ?>
        <li>&nbsp;</li>
        
    </ul>
</div>
