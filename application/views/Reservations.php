<head>
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
        <a class="navbar-brand" href="<?php echo site_url('RoomController/index/') ?>">จองห้องพัก</a>
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
</nav>
    <!-- Content Header (Page header) -->
            <!-- form start -->
            <?php  $this->db->where('id',$id);
       $query = $this->db->get('room');
         $qq = $query->row_array(); ?>
            <div class="container"><br>
            <form role="form" action="<?php echo base_url('Bookaroom/postdata/'.$id); ?>" method="post" enctype="multipart/form-data">
           
            <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">เลขห้อง<?php echo $this->session->flashdata('error_roomnum'); ?>
                        <input type="text" id="roomnum" class="form-control" name="roomnum" value="<?php echo $qq['roomnum'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ชื่อ-นามสกุล</label> <?php echo $this->session->flashdata('error_name'); ?>
                        <input type="text" id="name" class="form-control" name="name" value="<?php echo  $this->session->flashdata('name'); ?>" style="width: 500px;">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">เบอร์โทรศัพท์</label> <?php echo $this->session->flashdata('error_telephone'); ?>
                        <input type="text" id="telephone" class="form-control" name="telephone" value="<?php echo  $this->session->flashdata('telephone'); ?>"style="width: 350px;">
                    </div>
                    <div class="row">
                    <div class="col-sm">
                    <img src="<?php echo base_url('./assets/Kbank.jpg')?>" alt="Room" class="img-fluid"style="width: 400px;"><br>
                    </div>
                    <div class="col-sm">
                    <img src="<?php echo base_url('./assets/Kbank.jpg')?>" alt="Room" class="img-fluid"style="width: 400px;">
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
                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-save"></i> บันทึกข้อมูล</button>
                    <a class="btn btn-danger" href="<?php echo  base_url('ReservationsController'); ?>" role="button"><i class="fa fa-fw fa-close"></i> ยกเลิก</a>
                </div>
                
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
</body>
</html>
 