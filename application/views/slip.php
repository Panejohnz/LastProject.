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
        </button><?php   $stringrow = base_url(uri_string());
                $arraystate = (explode("/", $stringrow));
                $idtestt = ($arraystate[5]); ?>
        <form role="form" action="<?php echo  base_url('Slipcontroller/paylatelate/' . $idtestt); ?>" method="post" enctype="multipart/form-data">
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
</nav>
                   
                   <br>
                   <br>
                   <br>
                   <br>
                   <br>
                   
                   
                   
                   <center> <div class="p-2 alert alert-warning clearfix" style="width:370px; height:50px; border-radius: 2px; background-color:green;">
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
</center>
                    

                   <center> <div class="row">
                    <div class="col-sm">
                    <img src="<?php echo base_url('./assets/Kbank.jpg')?>" alt="Room" class="img-fluid"style="width: 400px;"><br>
                    </div>
                    </center>
                    
                    </div>
                    <br>
                    
                    <div class="text-left">
                    <center><div class="fileUpload btn btn-primary">
								<span style="color: white;">+ เพิ่มรูป</span>
										<label for="file"><strong></strong><span class="box__dragndrop"></label>
										<input class="upload" type="file" name="file" id="piccar1" required  />
                                </div>
                                
                            </div>
                            <br>
                            </center>
                    

                    <!-- <div class="form-group">
                        <label for="exampleInputEmail1">
                            อัพโหลดไฟล์ภาพ
                        </label> <?php echo $this->session->flashdata('err_image'); ?>
                        <input type="file" name="typeimg" id="typeimg" >
                    </div> -->
                </div><!-- /.box-body -->

               <center> <div class="box-footer">
                    <button class="btn btn-success" name="submit"  type="submit"><i class="fa fa-fw fa-save"></i> บันทึกข้อมูล</button>
                    <a class="btn btn-danger" href="<?php echo  base_url('page/staff'); ?>" role="button"><i class="fa fa-fw fa-close"></i> ยกเลิก</a>
                </div>
                </center>
                <!-- //onclick="myFunction()" -->
            
            </div>
            <script src="<?php echo base_url(); ?>./assets2/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>./assets2/vendor/popper/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>./assets2/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>./assets2/vendor/headroom/headroom.min.js"></script>
  <!-- Argon JS -->
  <script src="<?php echo base_url(); ?>./assets2/js/argon.js?v=1.1.0"></script>
  <!--Datepicker -->
  <script src="<?php echo base_url('./assets2/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>

  


</body>
</html>
 