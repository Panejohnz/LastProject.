 <head>
 <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
  <!-- Icons -->
  <link href="<?php echo base_url(); ?>../assets2/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>../assets2/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="<?php echo base_url(); ?>../assets2/css/argon.css?v=1.1.0" rel="stylesheet">
</head>

<html>
<body>
    
        
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

<nav class="navbar navbar-expand-lg navbar-dark bg-default">
    <div class="container">
        <a class="navbar-brand" href="<?php echo site_url('repair/newdata') ?>">แจ้งซ่อม</a>
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
            <div class="container">
            <form role="form" action="<?php echo  base_url('repair/postdata'); ?>" method="post" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ID<?php echo $this->session->flashdata('error_id'); ?>
                        <input type="text" id="id" class="form-control" name="id" value="<?php echo  $this->session->flashdata('id'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ผู้แจ้ง</label> <?php echo $this->session->flashdata('error_customer_id'); ?>
                        <input type="text" id="customer_id" class="form-control" name="customer_id" value="<?php echo  $this->session->flashdata('customer_id'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ห้อง</label> <?php echo $this->session->flashdata('error_roomnum'); ?>
                        <input type="text" id="roomnum" class="form-control" name="roomnum" value="<?php echo  $this->session->flashdata('roomnum'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">รายละเอียด</label> <?php echo $this->session->flashdata('error_job_description'); ?>
                        <input type="text" id="job_description" class="form-control" name="job_description" value="<?php echo  $this->session->flashdata('job_description'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">พนักงาน</label> <?php echo $this->session->flashdata('error_operator_id'); ?>
                        <input type="text" id="operator_id" class="form-control" name="operator_id" value="<?php echo  $this->session->flashdata('operator_id'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">สถานะ</label> <?php echo $this->session->flashdata('error_statusrepair'); ?>
                        <input type="text" id="statusrepair" class="form-control" name="statusrepair" value="<?php echo  $this->session->flashdata('statusrepair'); ?>">
                    </div>

                    <!-- <div class="form-group">
                        <label for="exampleInputEmail1">
                            อัพโหลดไฟล์ภาพ
                        </label> <?php echo $this->session->flashdata('err_typeimg'); ?>
                        <input type="file" name="typeimg" id="typeimg" >
                    </div> -->
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-save"></i> บันทึกข้อมูล</button>
                    <a class="btn btn-danger" href="<?php echo  base_url('ReservationsController'); ?>" role="button"><i class="fa fa-fw fa-close"></i> ยกเลิก</a>
                </div>
                
            </form>
            </div>
            <script src="<?php echo base_url(); ?>../assets2/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>../assets2/vendor/popper/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>../assets2/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>../assets2/vendor/headroom/headroom.min.js"></script>
  <!-- Argon JS -->
  <script src="<?php echo base_url(); ?>../assets2/js/argon.js?v=1.1.0"></script>
  <!--Datepicker -->
  <script src="<?php echo base_url('../assets2/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>
</body>
</html>
 