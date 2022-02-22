<!-- <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script src="<?php echo base_url('./EZView/EZView.js'); ?>"></script>
        <script src="<?php echo base_url('./EZView/draggable.js'); ?>"></script>
        <script>
$(function(){

$('img').EZView();

});
</script> -->
<script>
    var start = 0;
 
        $('#detail').change(function () {
             start = $("#detail").val()
             
            if (start != '') {
                $('#sendButton').attr('disabled',false)

                
            } else {
               $('#sendButton').attr('disabled', true)
            }
        });
       
  
</script>
      </footer>
