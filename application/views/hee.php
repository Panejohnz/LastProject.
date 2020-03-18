
<script type="text/javascript" src="//code.jquery.com/jquery.min.js"></script>
<script>
<?php $stringrow = base_url(uri_string());
        $arraystate = (explode("/", $stringrow));
        $idtestt = ($arraystate[5]);
        $idtestt1 = ($arraystate[6]);
         ?>
$(document).ready(function(){
    var r = confirm("จองเรียบร้อย ต้องชำระเงินเลยป่าว");
    if (r == true) {
      
        window.location.href = "<?php echo base_url("/Slipcontroller/paylate/".$idtestt.'/'.$idtestt1) ?>";
    } else {
        window.location.href = "<?php echo base_url("/Page/Staff"); ?>";
    }
});
</script>