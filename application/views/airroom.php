<?php foreach ($results->result() as $row) { ?>
  <p><?php echo $row['roomnum'] ?>
    <?php echo $row->roomcate ?>
    <?php echo $row->roomprice ?>
<?php } ?>