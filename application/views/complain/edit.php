<link rel="icon" type="image/png" href="<?php echo base_url(); ?>./assets/bluesky/images/goldd.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i" rel="stylesheet">
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
		จัดการสัญญาเช่า
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo  base_url('contract'); ?>">
					<i class="fa fa-dashboard">
					</i>หน้าแรก
				</a>
			</li>
			<li>
				<a href="<?php echo  base_url('contract'); ?>">
				จัดการสัญญาเช่า
				</a>
			</li>
			<li class="active">
				<?php echo $result->NumRoom ?>
			</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
	<div class="container">
        <div class="row">
            <div class="col-sm-2"></div> 
            <div class="col-sm-7">
		<!-- Your Page Content Here -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">
					แก้ไขข้อมูล
				</h3>
			</div><!-- /.box-header -->
			<!-- form start -->
			<form role="form" action="<?php echo  base_url('contract/edcon/'. $result->contract_id); ?>" method="post"  enctype="multipart/form-data" >
				<input type="hidden" name="id" value="<?php echo $result->contract_id ?>">
				
				<div class="box-body">

			 <div class="form-group">

                        <label for="exampleInputEmail1" value="<?php echo  $result->insurance ?>" >
                            อัพโหลดไฟล์ภาพ

		<a href="<?php echo base_url('uploads/'.$result->insurance); ?>" target="_blank" require>(ไฟล์เดิมคลิก)</a>

                     
                        </label> <?php echo $this->session->flashdata('err_typeimg'); ?>
                        <input type="file" name="typeimg" id="typeimg" value="<?php echo  $result->insurance ?>" >
					</div>
					
					<div class="col-sm-4">  
                    <label for="#">วันเริ่มสัญญา</label> <?php echo $this->session->flashdata('error_firstname')?>
                        
                         <input id="datepickerstart" name="datepickerstart" type="text" class="form-control checkin_date"  value="<?php echo  $result->startrcontract ?>">
					
                    </div>
                    <div class="col-sm-4">  
                        <label for="exampleInputEmail1">
                            วันหมดสัญญา
                        </label> <?php echo $this->session->flashdata('error_enddate')?>
                        <input id="datepickerend" name="datepickerend" type="text" class="form-control checkin_date" value="<?php echo  $result->endrcontractct ?>">
                    </div>

					<div class="col-sm-4">
						<label for="exampleInputEmail1">
						เลขห้อง
						</label> <?php echo $this->session->flashdata('error_numroom')?>
						<input type="text" id="name" class="form-control" name="numroom" value="<?php echo  $result->numroom ?>">
					</div>

					<div class="col-sm-4">
						<label for="exampleInputEmail1">
						ลูกค้า
						</label> <?php echo $this->session->flashdata('error_numroom')?>
						<input type="text" id="name" class="form-control" name="IdCustomer" value="<?php echo  $result->idcustomer ?>">
					</div>

				</div><!-- /.box-body -->

				<div class="box-footer">
					<button class="btn btn-primary" type="submit">
						<i class="fa fa-fw fa-save">
						</i>บันทึกข้อมูล
					</button>
					<a class="btn btn-danger" href="<?php echo  base_url('contract'); ?>" role="button">
						<i class="fa fa-fw fa-close">
						</i>ยกเลิก
					</a>
				</div>
			</form>
		</div>
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script src="<?php echo base_url('./assets/deluxe/js/jquery.min.js')?>"></script>
  <script src="<?php echo base_url('./assets/deluxe/js/jquery-migrate-3.0.1.min.js')?>"></script>
  <script src="<?php echo base_url('./assets/deluxe/js/jquery.waypoints.min.js')?>"></script>
  <script src="<?php echo base_url('./assets/deluxe/js/jquery.stellar.min.js')?>"></script>
  <script src="<?php echo base_url('./assets/deluxe/js/owl.carousel.min.js')?>"></script>
  <script src="<?php echo base_url('./assets/deluxe/js/jquery.magnific-popup.min.js')?>"></script>
  <script src="<?php echo base_url('./assets/deluxe/js/aos.js')?>"></script>
  <script src="<?php echo base_url('./assets/deluxe/js/jquery.animateNumber.min.js')?>"></script>
  <script src="<?php echo base_url('./assets/deluxe/js/bootstrap-datepicker.js')?>"></script>
  <script src="<?php echo base_url('./assets/deluxe/js/jquery.timepicker.min.js')?>"></script>
  <script src="<?php echo base_url('./assets/deluxe/js/scrollax.min.js')?>"></script>
  <script src="<?php echo base_url('./assets/deluxe/js/main.js')?>"></script>