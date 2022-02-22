<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			 จัดการประเภทห้อง
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
				จัดการประเภทห้อง
				</a>
			</li>
			<li class="active">
				<?php echo $resulthee->roomcategory_name ?>
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
			<form role="form" action="<?php echo  base_url(''); ?>imgtype/edittype/<?php echo $resulthee->roomcategory_id ?>" method="post"  enctype="multipart/form-data" >
				<input type="hidden" name="id" value="<?php echo $resulthee->roomcategory_id ?>">
				
				<div class="box-body">
					<div class="form-group">
						<label for="exampleInputEmail1">
							ชื่อประเภท
						</label> <?php echo $this->session->flashdata('error_roomname')?>
						<input type="text" id="roomname" class="form-control" name="roomname" value="<?php echo  $resulthee->roomcategory_name ?>" required>
					</div>
					<?php $this->db->select('furniture.*');
                   $this->db->from('furniture');

                   $query = $this->db->get();
                   $results = $query->result_array();?>
                   	<?php	foreach ($results as $result) {
                       ?>
                   
                    <div id="hee2" name="hee2" <?php if ($result['stock'] == 0) {?> style="display:none" <?php } ?>>

					<?php $furniture_id = $result['furniture_id']; ?>
                        <?php $sql = "SELECT COUNT(*) AS furniturecount FROM `roomcategory_furniture` WHERE roomcategory_id = $resulthee->roomcategory_id  AND furniture_id = $furniture_id"?>
                       
                       <?php $query1 = $this->db->query($sql)->result();

                       // echo $sql;echo '<br>'; ?> 
                                


                 
                       
                        
                <?php
                       if($result['stock'] == 0)
                       { ?>

                            <input type="checkbox" id="customCheck1" name="customCheck1[]" value="<?php echo $result['furniture_id'] ?>" disabled>
                            <label for="vehicle1"><?php echo $result['name'] ?></label><br>

                <?php  }else{ ?>
				<input   <?php if ($query1[0]->furniturecount != 0) {?> checked <?php } ?> type="checkbox" id="customCheck1" name="customCheck1[]" value="<?php echo $result['furniture_id'] ?>">
                            <label for="vehicle1"><?php echo $result['name'] ?></label><br>
                <?php  } ?>
                      
				
                    <!-- <label class="custom-control-label" for="customCheck1"><?php echo $result['name']; ?></label> --> 
                    </div> 
                    
                                    
                       <?php
                   } ?>
                   <br>
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
						<input type="text" id="roomprice" class="form-control" name="roomprice" value="<?php echo  $resulthee->roomprice ?>" required>
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
					<button class="btn btn-primary" type="submit" name="submit">
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