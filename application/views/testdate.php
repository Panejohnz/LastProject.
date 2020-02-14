<head>

<!-- this file should add inside the <head></head> tag -->
<script src="<?php echo base_url('./datetime/js/jquery.min.js')?>"></script>

</head>
<body>
    

</body>

<!-- those files should be add after the </body> tag -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>./datetime/css/jquery.datetimepicker.min.css"/>
<script src="<?php echo base_url('./datetime/js/jquery.datetimepicker.js')?>"></script>


<input id="datetimepicker" type="text" >

<script type="text/javascript">
    // $(document).ready(function() {
        // $('#datetimepicker').datetimepicker();
        
    // });
    $('#datetimepicker').datetimepicker({
     format:'Y-m-d',
     timepicker:false,
     minDate:'-1970/01/01', //yesterday is minimum date
    //  maxDate:'+1970/01/03' //tomorrow is maximum date
    });
</script>