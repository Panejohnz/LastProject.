<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			จัดการพนักงาน
			 
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo  base_url('admin'); ?>">
					<i class="fa fa-dashboard">
					</i>หน้าแรก
				</a>
			</li>
			<li>
				<a href="<?php echo  base_url('admin'); ?>">
					จัดการพนักงาน
				</a>
			</li>
			<li class="active">
				<?php echo $result->firstname_emp?>
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
			<form role="form" action="<?php echo  base_url(''); ?>admin/edad/<?php echo $result->employee_id ?>" method="post" class="form-horizontal">
				<input type="hidden" name="user_id" value="<?php echo $result->employee_id?>">
				<div class="box-body">
				<div class="form-group">
				<div class="col-sm-4">
						<label for="exampleInputEmail1">
							username
						</label> 
						<?php echo $this->session->flashdata('error_username')?>
						<input type="text" id="username" class="form-control" name="username" value="<?php echo  $result->username ?>" required>
				</div>
				<div class="col-sm-4">	
					<label for="exampleInputEmail1">
							password
						</label> <?php echo $this->session->flashdata('error_password')?>
						<input type="text" id="password" class="form-control" name="password" value="<?php echo  $result->password ?>" required>
				</div>

			</div>
				 
						
			 
			<div class="form-group">
					<div class="col-sm-4">	
						<label for="exampleInputEmail1">
							ชื่อ
						</label> <?php echo $this->session->flashdata('error_name')?>
						<input type="text" id="name" class="form-control" name="firstname" value="<?php echo  $result->firstname_emp ?>" required>
					</div>

				 	<div class="col-sm-4">		
						<label for="exampleInputEmail1">
							นามสกุล
						</label> <?php echo $this->session->flashdata('error_lastname')?>
						<input type="text" id="lastname" class="form-control" name="lastname" value="<?php echo  $result->lastname ?>" required>
					</div>

			</div>



			

					<div class="form-group">
					<div class="col-sm-4">	
						<label for="exampleInputEmail1">
						 เบอร์โทรศัพท์
						</label> <?php echo $this->session->flashdata('error_tel')?>
						<input type="number" id="tel" class="form-control" name="tel" value="<?php echo  $result->tel ?>" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" title="กรุณากรอกให้ครบ 10 หลัก 0800000000" maxlength="10">
					</div>
					<div class="col-sm-4">	
						<label for="exampleInputEmail1">
							อีเมล
						</label> <?php echo $this->session->flashdata('error_email')?>
						<input type="email" id="email" class="form-control" name="email" value="<?php echo  $result->email ?>" required>
					</div>
					
					</div>
					<div class="form-group">
					<div class="col-sm-4">	
						<!-- <label for="exampleInputEmail1">
							สถานะ
						</label>  -->
						<?php // echo $this->session->flashdata('error_gender')?>

						<div class="col-sm-4">  
                        <label for="exampleInputEmail1">
                            สถานะ
                        </label> 
                        <?php // echo $this->session->flashdata('error_gender')?>

                        <select name="statusem" id="statusem">
                            <option value="1">ผู้ดูแลระบบ</option>
                            <option value="2">พนักงาน</option>
                             
                        </select>

                    </div>

					</div>
					
					</div>

					 

				</div><!-- /.box-body -->

				<div class="box-footer">
					<button class="btn btn-primary" type="submit">
						<i class="fa fa-fw fa-save">
						</i>บันทึกข้อมูล
					</button>
					<a class="btn btn-danger" href="<?php echo  base_url('admin'); ?>" role="button">
						<i class="fa fa-fw fa-close">
						</i>ยกเลิก
					</a>
				</div>
			</form>
			</div>
		</div>
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->