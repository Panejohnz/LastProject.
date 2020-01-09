<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			รายการแจ้งซ่อม
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo  base_url('repair'); ?>">
					<i class="fa fa-dashboard">
					</i>หน้าแรก
				</a>
			</li>
			<li>
				<a href="<?php echo  base_url('repair'); ?>">
				รายการแ้งซ่อม
				</a>
			</li>
			<li class="active">
				<?php echo $result->id ?>
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
			<form role="form" action="<?php echo  base_url('repair/editre/'. $result->id); ?>" method="post"  enctype="multipart/form-data" >
			
				<div class="box-body">
					<div class="form-group">
						<label for="exampleInputEmail1">
							ผู้แจ้ง
						</label> <?php echo $this->session->flashdata('error_roomnum')?>
						<input type="text" id="id" class="form-control" name="id" value="<?php echo  $result->id ?>" style="width: auto" >
					</div>

					<div class="form-group">
						<label for="exampleInputEmail1">
							ห้อง
						</label> <?php echo $this->session->flashdata('error_roomnum')?>
						<input type="text" id="roomnum" class="form-control" name="roomnum" value="<?php echo  $result->roomnum ?>"style="width: auto">
					</div>
					
					<div class="form-group">
						<label for="exampleInputEmail1">
							รายละเอียด
						</label> <?php echo $this->session->flashdata('error_job_description')?>
						<input type="text" id="job_description" class="form-control" name="job_description" value="<?php echo  $result->job_description?>">
					</div>

					<div class="form-group">
						<label for="exampleInputEmail1">
							พนักงาน
						</label> <?php echo $this->session->flashdata('error_operator_id')?>
						<input  type="text" id="operator_id" class="form-control" name="operator_id" value="<?php echo  $result->operator_id?>"style="width: auto">
					</div>

					<div class="form-group">
						<label for="exampleInputEmail1">
							สถานะ
						</label> <?php echo $this->session->flashdata('error_statusrepair')?>
						<input type="text" id="statusrepair" class="form-control" name="statusrepair" value="<?php echo  $result->statusrepair?>"style="width: auto">
					</div>


				</div><!-- /.box-body -->

				<div class="box-footer">
					<button class="btn btn-primary" type="submit">
						<i class="fa fa-fw fa-save">
						</i>บันทึกข้อมูล
					</button>
					<a class="btn btn-danger" href="<?php echo  base_url('repair'); ?>" role="button">
						<i class="fa fa-fw fa-close">
						</i>ยกเลิก
					</a>
				</div>
			</form>
		</div>
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->