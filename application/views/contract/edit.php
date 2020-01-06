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
			<form role="form" action="<?php echo  base_url('contract/update'); ?>" method="post"  enctype="multipart/form-data" >
				<input type="hidden" name="id" value="<?php echo $result->id ?>">
				
				<div class="box-body">

			 <div class="form-group">

                        <label for="exampleInputEmail1">
                            อัพโหลดไฟล์ภาพ

		<a href="<?php echo base_url('uploads/' . $result->Insurance); ?>" target="_blank">(ไฟล์เดิมคลิก)</a>

                     
                        </label> <?php echo $this->session->flashdata('err_typeimg'); ?>
                        <input type="file" name="typeimg" id="typeimg" >
					</div>
					
					<div class="col-sm-4">
						<label for="exampleInputEmail1">
						วันเริ่มสัญญา
						</label> <?php echo $this->session->flashdata('error_startdate')?>
						<input type="text" id="name" class="form-control" name="startdate" value="<?php echo  $result->StartRcontract ?>">
					</div>

					<div class="col-sm-4">
						<label for="exampleInputEmail1">
						วันหมดสัญญา
						</label> <?php echo $this->session->flashdata('error_enddate')?>
						<input type="text" id="name" class="form-control" name="enddate" value="<?php echo  $result->EndRcontractct ?>">
					</div>

					<div class="col-sm-4">
						<label for="exampleInputEmail1">
						เลขห้อง
						</label> <?php echo $this->session->flashdata('error_numroom')?>
						<input type="text" id="name" class="form-control" name="numroom" value="<?php echo  $result->NumRoom ?>">
					</div>

					<div class="col-sm-4">
						<label for="exampleInputEmail1">
						ลูกค้า
						</label> <?php echo $this->session->flashdata('error_numroom')?>
						<input type="text" id="name" class="form-control" name="IdCustomer" value="<?php echo  $result->IdCustomer ?>">
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