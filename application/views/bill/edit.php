
<!-- <?php $stringrow = base_url(uri_string());
            $arraystate = (explode("/", $stringrow));
            $idtestt = ($arraystate[6]); ?>
<?php $this->db->where('room_id', $idtestt);
$qq = $this->db->get('electricbill');
$result = $qq->row_array(); ?>

<?php $this->db->where('room_id', $idtestt);
$qqe = $this->db->get('electricbill');
$resulte = $qqe->row_array(); ?>

<?php  foreach ($qqe->result_array() as $data) { ?>

เลขมิเตอร์ค่าไฟ: <?php echo $data['meternumber']; ?>
<br>
เลขมิเตอร์ค่าน้ำ:<?php echo $data['waterbill']; ?>
<br>
ค่าไฟ:<?php echo $data['electric_price']; ?>
<br>
ค่าน้ำ:<?php echo $data['water_price']; ?>
<br>
ค่าห้อง:<?php echo $data['roomprice']; ?>
<br>
วันที่:<?php echo $data['date']; ?>
<br>=========================<br>
 <?php } ?> -->