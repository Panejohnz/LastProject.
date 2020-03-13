<head>
<meta charset="utf-8">
<link rel="icon" type="image/png" href="<?php echo base_url(); ?>./assets/bluesky/images/goldd.png">
		<title>Rianthong</title>
 <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
  <!-- Icons -->
  <link href="<?php echo base_url(); ?>./assets2/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>./assets2/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="<?php echo base_url(); ?>./assets2/css/argon.css?v=1.1.0" rel="stylesheet">


</head>

<html>
<body>
    
        
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

<nav class="navbar navbar-expand-lg navbar-dark bg-default">
    <div class="container">
        <a class="navbar-brand" href="<?php echo site_url('page/staff') ?>">กลับ</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-default">
            <div class="navbar-collapse-header">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="index.html">
                            <img src="assets/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>

           

        </div>
    </div>
</nav><?php $stringrow = base_url(uri_string());
            $arraystate = (explode("/", $stringrow));
            $idtestt = ($arraystate[5]);
            $idtest = ($arraystate[6]);
           // $idtest1 = ($arraystate[8]);
            //$idtest2 = ($arraystate[9]); ?>
    <!-- Content Header (Page header) -->
            <!-- form start -->
            <?php $this->db->select('*');
            $this->db->from('room');
            $this->db->join('roomcategory','roomcategory.roomcategory_id = room.roomcate_id');
             $this->db->where('room_id', $room_id);
       $query = $this->db->get();
         $qq = $query->row_array(); ?>
            <div class="container"><br>
            <form role="form" action="<?php echo base_url('Bookaroom/postdata/'.$room_id); ?>" id="kuay" method="post" enctype="multipart/form-data">
           
            <div class="box-body">
            <div class="form-group">
                
                        <label for="exampleInputEmail1">เลขห้อง <?php echo $this->session->flashdata('error_roomnum'); ?>
                        <input readonly type="hidden" id="roomnum" class="form-control" name="roomnum"   value="<?php echo $idtestt ?>"> <?php echo $qq['roomnum'] ?> </input>
                    </div>
            <div class="form-group">
                        <label for="exampleInputEmail1">วันที่จอง  <?php echo $this->session->flashdata('error_roomnum'); ?>
                        <input readonly type="text" id="reservationsstart" class="form-control" name="reservationsstart" value="<?php echo $idtest ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">ชื่อ-นามสกุล</label> <?php echo $this->session->flashdata('error_name'); ?>
                        <input type="text" id="name" class="form-control" name="name" value="<?php echo $this->session->userdata('firstname')?>" style="width: 500px;">
                    </div>
                    <!-- ราคาห้อง  <?php echo $qq['roomprice'] ?><br> -->
                    
    
                  
                    <label for="exampleInputEmail1">เลือกเฟอร์นิเจอร์เพิ่มเติม</label>
                    
                    <?php $this->db->select('furniture.*');
                   $this->db->from('furniture');

                   $query = $this->db->get();
                   $results = $query->result_array();?>
                   	<?php	foreach ($results as $result) {
                       ?>
                   
                    <div style="display:flex;" <?php if($result['stock'] == 0) {?> style="display:none" <?php } ?>>

                    <!-- <div class="custom-control custom-checkbox mb-3" > -->
                       <input type="checkbox"  name="customCheck1[]" <?php if($result['stock'] == 0) {?> disabled <?php } ?> onclick="heegrace()" value="<?php echo $result['furniture_id']; ?>" > <?php if($result['stock'] == 0){ echo $result['name'].' (หมด)' ?> <?php } else { echo $result['name'];} ?> 
                    <!-- <label class="custom-control-label" for="customCheck1"><?php echo $result['name']; ?></label> --> 
                    </div> 
                    
                                    
                       <?php
                   } ?>
                   <br>

                   
                   
                   <p id="Heeee">ราคาห้อง &nbsp;<?php echo $qq['roomprice']; ?></p>
                   <input type="hidden" name="hee" id="hee" value="<?php echo $qq['roomprice']; ?>">
                   
                   <!-- <label>ราคารวมทั้งหมด</label> &nbsp;<label id="total"></label>&nbsp;<label>บาท</label>
                   <input type="hidden" id="hgo"> -->
                    <!-- <div class="custom-control custom-checkbox mb-3">
                    <input class="custom-control-input" id="customCheck3" type="checkbox" disabled>
                    <label class="custom-control-label" for="customCheck3">Disabled Unchecked</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-3">
                    <input class="custom-control-input" id="customCheck4" type="checkbox" checked disabled>
                    <label class="custom-control-label" for="customCheck4">Disabled Checked</label>
                    </div> -->

                    <div class="p-2 alert alert-warning clearfix" style="width:370px; height:50px; border-radius: 2px; background-color:green;">
                            <div class="pull-left">
                                <i class="fa fa-shield fa-fw"></i> เงินมัดจำการจองห้อง
                                <!--
                                จำนวนเงินมัดจำ 
                                <i tabindex="0" class="fa fa-info-circle secondary-color" style="display: inline-block;" aria-hidden="true" role="button" data-toggle="popover" data-trigger="focus" data-placement="top"  data-content='ระบบจะทำการคืนวงเงินมัดจำภายหลังจากการเช่าสิ้นสุดลง ภายใน 7-15 วัน ขึ้นอยู่กับธนาคารและผู้ให้บริการบัตรเครดิต '></i>
                                -->
                                <div class="small text-gray">
                                ชำระ ณ ตอนจอง และได้รับคืนเมื่อสิ้นสุดสัญญาเช่า
                                </div>
                            </div>
                            <div class="pull-right number-format text-bold">
                                <span class="currency-after" style="color:white;">500฿</span> 
                                <input type="hidden" name='deposit' style="color:white;" value="500">
                            </div>
                            </div>
                    

                    <div class="row">
                    <div class="col-sm">
                    <img src="<?php echo base_url('./assets/Kbank.jpg')?>" alt="Room" class="img-fluid"style="width: 400px;"><br>
                    </div>
                    <div class="col-sm">
                    <!-- <img src="<?php echo base_url('./assets/Kbank.jpg')?>" alt="Room" class="img-fluid"style="width: 400px;"> -->

                    </div>
                    </div>
                    <br>
                    
                    <div class="text-left">
								<div class="fileUpload btn btn-primary">
								<span style="color: white;">+ เพิ่มรูป</span>
										<label for="file"><strong></strong><span class="box__dragndrop"></label>
										<input class="upload" type="file" name="file" id="piccar1" required  />
								</div>
                            </div>
                            <br>

                    

                    <!-- <div class="form-group">
                        <label for="exampleInputEmail1">
                            อัพโหลดไฟล์ภาพ
                        </label> <?php echo $this->session->flashdata('err_image'); ?>
                        <input type="file" name="typeimg" id="typeimg" >
                    </div> -->
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button class="btn btn-success" name="submit"  type="submit"><i class="fa fa-fw fa-save"></i> บันทึกข้อมูล</button>
                    <a class="btn btn-danger" href="<?php echo  base_url('page/staff'); ?>" role="button"><i class="fa fa-fw fa-close"></i> ยกเลิก</a>
                </div>
                <!-- //onclick="myFunction()" -->
            </form>
            </div>
            <script src="<?php echo base_url(); ?>./assets2/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>./assets2/vendor/popper/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>./assets2/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>./assets2/vendor/headroom/headroom.min.js"></script>
  <!-- Argon JS -->
  <script src="<?php echo base_url(); ?>./assets2/js/argon.js?v=1.1.0"></script>
  <!--Datepicker -->
  <script src="<?php echo base_url('./assets2/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>
<script>
    function heegrace()
    {
        console.log("hi");
        $.post("<?php echo base_url("kidmaiook/HeeEGrace") ?>", $("#kuay").serialize(),
            function (data) {
                $("#Heeee").html("ราคาห้อง " + data)
            },
        );
    }
</script>
  

<!-- <script>
    var total = 0;
    var id = <?php echo $room_id ?>;
        console.log(<?php echo $room_id ?>);

    $("#customCheck1").change(function(){
        if(this.value =='13'){
        $.get("<?=base_url('Bookaroom/selectfur/')?>"+id,
        function(data){
            var go = data;
            var tot = go;
            $("#total").text(tot)
            console.log(tot)
        }
        );
        }
        else if(this.value =='15'){
            $.get("<?=base_url('Bookaroom/selectfur2/')?>"+id,
        function(data){
            var go = data;
            var tot = go;
            $("#total").text(tot)
            console.log(tot)
        }
        );

        }else if(this.value =='16'){
            $.get("<?=base_url('Bookaroom/selectfur3/')?>"+id,
        function(data){
            var go = data;
            var tot = go;
            $("#total").text(tot)
            console.log(tot)
        }
        );
        }else if(this.value =='17'){
            $.get("<?=base_url('Bookaroom/selectfur4/')?>"+id,
        function(data){
            var go = data;
            var tot = go;
            $("#total").text(tot)
            console.log(tot)
        }
        );
        }
    });
    
</script> -->
</body>
</html>
 