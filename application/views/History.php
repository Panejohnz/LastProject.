
<?php 
    foreach ($his as $data) {
        ?><br>
       <a <?php if ($data['slip_file'] != null) { ?> style="display:none" <?php } ?> href="<?php echo base_url('Slipcontroller/paylate/'.$data['reservations_id'])?>">
       <?php echo $data['reservations_id']; ?>
  <?php echo $data['roomprice']; ?>
  <?php echo $data['roomnum']; ?>
  

  <?php
                $re = $data['reservations_id'];
        //x $this->db->where('reservations_id', $data['reservations_id']);
        $query = $this->db->query("SELECT * FROM reservationsfurniture
                JOIN furniture ON furniture.furniture_id = reservationsfurniture.furniture_id
                JOIN reservationsroom ON reservationsroom.reservationsroom_id = reservationsfurniture.reservationsroom_id
                JOIN room ON room.room_id = reservationsroom.room_id
                WHERE reservationsfurniture.reservationsroom_id = $re");
               
        foreach ($query->result_array() as $a) {
            echo  "<td>   " . $a['name']   . "</td>";
        } ?>
           
    <?php
    }
?>