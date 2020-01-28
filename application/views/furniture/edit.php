<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			จัดการเฟอร์นิเจอร์
			 
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo  base_url('FurnitureController'); ?>">
					<i class="fa fa-dashboard">
					</i>หน้าแรก
				</a>
			</li>
			<li>
				<a href="<?php echo  base_url('FurnitureController'); ?>">
					จัดการเฟอร์นิเจอร์
				</a>
			</li>
			
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<!-- Your Page Content Here -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">
					แก้ไขข้อมูล
				</h3>
			</div><!-- /.box-header -->
			<!-- form start -->
		<div class="col-md-1"></div>
		<div class="col-md-9">
			<form role="form" action="<?php echo  base_url(''); ?>FurnitureController/edfur/<?php echo $result->furniture_id ?>" method="post" class="form-horizontal">
				<input type="hidden" name="furniture_id" value="<?php echo $result->furniture_id?>">
				<div class="box-body">
				<div class="form-group">
				
				
			</div>
				 
						
			 
			<div class="form-group">
					<div class="col-sm-4">	
						<label for="exampleInputEmail1">
							ชื่อ
						</label> <?php echo $this->session->flashdata('error_name')?>
						<input type="text" id="name" class="form-control" name="name" value="<?php echo  $result->name ?>">
					</div>

				 	<div class="col-sm-4">		
						<label for="exampleInputEmail1">
							ราคา
						</label> <?php echo $this->session->flashdata('error_lastname')?>
						<input type="text" id="price" class="form-control" name="price" value="<?php echo  $result->price ?>">
					</div>

			</div>



			

					

					 

				</div><!-- /.box-body -->

				<div class="box-footer">
					<button class="btn btn-primary" type="submit">
						<i class="fa fa-fw fa-save">
						</i>บันทึกข้อมูล
					</button>
					<a class="btn btn-danger" href="<?php echo  base_url('FurnitureController'); ?>" role="button">
						<i class="fa fa-fw fa-close">
						</i>ยกเลิก
					</a>
				</div>
			</form>
			</div>
		</div>
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->