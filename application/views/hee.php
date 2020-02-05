
<script type="text/javascript" src="//code.jquery.com/jquery.min.js"></script>
<script>

$(document).ready(function(){
    var r = confirm("จองเรียบร้อย ต้องการจ้องห้องพักเพิ่มหรือไม่");
    if (r == true) {
      
        window.location.href = "<?php echo base_url("/page/staff") ?>";
    } else {
        window.location.href = "<?php echo base_url("/logincontroller/logoutMember"); ?>";
    }
});
</script>