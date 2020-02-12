<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			 จัดการประเภทภาพ
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo  base_url('imgtype'); ?>">
					<i class="fa fa-dashboard">
					</i>หน้าแรก
				</a>
			</li>
			<li>
				<a href="<?php echo  base_url('imgtype'); ?>">
					 จัดการประเภทภาพ
				</a>
			</li>
			<li class="active">
				<?php echo $result->roomname ?>
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
			<form role="form" action="<?php echo  base_url(''); ?>imgtype/edittype/<?php echo $result->roomcategory_id ?>" method="post"  enctype="multipart/form-data" >
				<input type="hidden" name="id" value="<?php echo $result->roomcategory_id ?>">
				
				<div class="box-body">
					<div class="form-group">
						<label for="exampleInputEmail1">
							ชื่อประเภท
						</label> <?php echo $this->session->flashdata('error_roomname')?>
						<input type="text" id="roomname" class="form-control" name="roomname" value="<?php echo  $result->roomname ?>" required>
					</div>
					<!-- <div class="form-group">
						<label for="exampleInputEmail1">
							รายละเอียด
						</label> <?php echo $this->session->flashdata('error_detail')?>
						<input type="text" id="detail" class="form-control" name="detail" value="<?php echo  $result->detail ?>">
					</div> -->
					<div class="form-group">
						<label for="exampleInputEmail1">
							ราคา
						</label> <?php echo $this->session->flashdata('error_detail')?>
						<input type="text" id="roomprice" class="form-control" name="roomprice" value="<?php echo  $result->roomprice ?>" required pattern="\d{1,9}" maxlength="5">
					</div>

			 <!-- <div class="form-group">

                        <label for="exampleInputEmail1">
                            อัพโหลดไฟล์ภาพ

		<a href="<?php echo base_url('uploads/' . $result->typeimg); ?>" target="_blank">(ไฟล์เดิมคลิก)</a>

                     
                        </label> <?php echo $this->session->flashdata('err_typeimg'); ?>
                        <input type="file" name="typeimg" id="typeimg" >
                    </div> -->

				</div><!-- /.box-body -->

				<div class="box-footer">
					<button class="btn btn-primary" type="submit">
						<i class="fa fa-fw fa-save">
						</i>บันทึกข้อมูล
					</button>
					<a class="btn btn-danger" href="<?php echo  base_url('imgtype'); ?>" role="button">
						<i class="fa fa-fw fa-close">
						</i>ยกเลิก
					</a>
				</div>
			</form>
		</div>
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->