<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
		จัดการค่าน้ำ
			 
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo  base_url('watercontroller'); ?>">
					<i class="fa fa-dashboard">
					</i>หน้าแรก
				</a>
			</li>
			<li>
				<a href="<?php echo  base_url('watercontroller'); ?>">
				จัดการค่าน้ำ
				</a>
			</li>
			<li class="active">
				<?php echo $result->utility_name?>
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
			<form role="form" action="<?php echo  base_url(''); ?>watercontroller/edad/<?php echo $result->utility_id ?>" method="post" class="form-horizontal">
				<input type="hidden" name="user_id" value="<?php echo $result->utility_id?>">
				<div class="box-body">
				<div class="form-group">
				<div class="col-sm-4">
						<label for="exampleInputEmail1">
						typebill
						</label> 
						<?php echo $this->session->flashdata('error_typebill')?>
						<input type="text" id="typebill" class="form-control" name="typebill" value="<?php echo  $result->utility_name ?>" required>
				</div>
				<div class="col-sm-4">	
					<label for="exampleInputEmail1">
					pricemeter
						</label> <?php echo $this->session->flashdata('error_pricemeter')?>
						<input type="text" id="pricemeter" class="form-control" name="pricemeter" value="<?php echo  $result->utilityprice ?>" required>
				</div>

			</div>
				 
						
			 
			


			

					
					

					 

				</div><!-- /.box-body -->

				<div class="box-footer">
					<button class="btn btn-primary" type="submit">
						<i class="fa fa-fw fa-save">
						</i>บันทึกข้อมูล
					</button>
					<a class="btn btn-danger" href="<?php echo  base_url('watercontroller'); ?>" role="button">
						<i class="fa fa-fw fa-close">
						</i>ยกเลิก
					</a>
				</div>
			</form>
			</div>
		</div>
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->