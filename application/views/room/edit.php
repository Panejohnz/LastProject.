<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			ห้องพัก
			 
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo  base_url('room'); ?>">
					<i class="fa fa-dashboard">
					</i>หน้าแรก
				</a>
			</li>
			<li>
				<a href="<?php echo  base_url('room'); ?>">
				ห้องพัก
				</a>
			</li>
			<li class="active">
				
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
			<form role="form" action="<?php echo  base_url(''); ?>room/edroom/<?php echo $result->room_id ?>" method="post" class="form-horizontal">
				<input type="hidden" name="user_id" value="<?php echo $result->room_id?>">
				<div class="box-body">
				<div class="form-group">
				<div class="col-sm-4">
						<label for="exampleInputEmail1">
							เลขห้อง
						</label> 
						<?php echo $this->session->flashdata('error_roomnum')?>
						<input type="text" id="roomnum" class="form-control" name="roomnum" value="<?php echo  $result->roomnum ?>" pattern="\d{1,9}" maxlength="5" required>
						<label class="text-danger" hidden id="falseusername"><span class="glyphicon glyphicon-remove"></span> เลขห้องนี้ได้ถูกใช้ไปแล้ว</label>
                        <label class="text-success" hidden id="trueusername"><span class="glyphicon glyphicon-ok"></span> เลขห้องนี้สามารถใช้ได้</label>
					</div>
				<div class="form-group">
                    <div class="col-sm-4">  
                        <label for="exampleInputEmail1">
                            ประเภทห้อง
                        </label> <br>
                        <?php // echo $this->session->flashdata('error_gender')?>

						<?php 
						$stringrow = base_url(uri_string());
						$arraystate = (explode("/", $stringrow));
						$idtestt = ($arraystate[5]);

						$this->db->where('room_id', $idtestt);
						$qq = $this->db->get('room');
						$qq1 = $qq->row_array();

						$this->db->where('roomcategory_id', $qq1['roomcategory_id']);
						$tt = $this->db->get('roomcategory');
						$tt1 = $tt->row_array();
						
						 ?>
                        <select  name="roomcate" id="roomname" class="form-control">
									
								<?php $this->db->select('roomcategory.*');
							$this->db->from('roomcategory');
							$query = $this->db->get();
							$results = $query->result_array();?>
						<?php	foreach($results as $result1){
								?>
											
											<h1><option <?php if($result1['roomcategory_id'] == $tt1['roomcategory_id']){ ?> selected <?php } ?> value="<?php echo $result1['roomcategory_id'] . ' '?>" > 
											<?php echo $result1['roomcategory_name'] . ' '?> <?php echo $result1['roomprice'] . '.- / เดือน'?>
								</option>
											<?php $eiei = $result1['roomcategory_id'];
							} ?>
										</select>
                             
                        </select>

                    </div>
                    
                    </div>

			</div>
				 
						
			 
			<div class="form-group">
					

				 	<!-- <div class="col-sm-4">		
						<label for="exampleInputEmail1">
							ราคา
						</label> <?php echo $this->session->flashdata('error_roomprice')?>
						<input type="text" id="roomprice" class="form-control" name="roomprice" value="<?php echo  $result->roomprice ?>" pattern="\d{1,9}" maxlength="5" required>
					</div> --><?php   $stringrow = base_url(uri_string());
        $arraystate = (explode("/", $stringrow));
        $idtestt = ($arraystate[5]);
       // $idtestt2 = ($arraystate[6]); ?>
<?php $queryhee = $this->db->query("SELECT * FROM roomstatus JOIN room ON room.roomstatus = roomstatus.status WHERE room.room_id = $idtestt");
		$roomhee = $queryhee->row_array(); ?>
					<div class="form-group">
                    <div class="col-sm-4">  
						
					

                    </div>
                    
                    </div>

			</div>



			

					<div class="form-group">
					
					
					</div>
					<div class="form-group">
					
					
					</div>

					 

				</div><!-- /.box-body -->

				<div class="box-footer">
					<button class="btn btn-primary" type="submit">
						<i class="fa fa-fw fa-save">
						</i>บันทึกข้อมูล
					</button>
					<a class="btn btn-danger" href="<?php echo  base_url('room'); ?>" role="button">
						<i class="fa fa-fw fa-close">
						</i>ยกเลิก
					</a>
				</div>
			</form>
			</div>
		</div>
	</section><!-- /.content -->
</div><!-- /.content-wrapper --><script>  


$(document).ready(function(){ 
	
	 $('#roomnum').change(function(){  
		  var roomnum = $('#roomnum').val();  
		  if(roomnum != '')  
		  {  
			   $.ajax({  
					url:"<?php echo base_url(); ?>Room/checkroomnum",  
					method:"POST",  
					data:{roomnum:roomnum},  
					success:function(data){  
						// $('#email_result').html(data);  
						console.log(data)
				   if(data.trim() === "true"){
					   console.log('kk')
					   $('#falseusername').removeAttr('hidden')
					   $('#trueusername').attr('hidden',true)
					   $('#button').attr('disabled',true)
				   }else
				   {
					   $('#trueusername').removeAttr('hidden')
					   $('#falseusername').attr('hidden',true)
					   $('#button').removeAttr('disabled')
				   }
					}  
			   });  
		  }
	 });  
});  
$(document).ready(function(){  
	 $('#username').change(function(){  
		  var username = $('#username').val();  
		  if(username != '')  
		  {  
			   $.ajax({  
					url:"<?php echo base_url(); ?>admin/checkusername",  
					method:"POST",  
					data:{username:username},  
					success:function(data){  
						 //$('#username_result').html(data);  
						 console.log(data)
				   if(data.trim() === "true"){
					   console.log('kk')
					   $('#falseusername').removeAttr('hidden')
					   $('#trueusername').attr('hidden',true)
					   $('#button').attr('disabled',true)
				   }else
				   {
					   $('#trueusername').removeAttr('hidden')
					   $('#falseusername').attr('hidden',true)
					   $('#button').removeAttr('disabled')
				   }
					}  
			   });  
		  }  
	 });  
});  
</script>