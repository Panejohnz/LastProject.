<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            จัดการห้องพัก
            
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo  base_url('room'); ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
            <li><a href="<?php echo  base_url('room'); ?>">จัดการสมาชิก</a></li>
            <li class="active">เพิ่มข้อมูลใหม่</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="container">
        <div class="row">
        <!-- Your Page Content Here -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">เพิ่มข้อมูล</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
        <div class="col-md-1"></div>
        <div class="col-md-9">
            <form role="form" action="<?php echo  base_url('room/postdata'); ?>" method="post" class="form-horizontal">
                
                <div class="box-body">
                <div class="form-group">
                <div class="col-sm-4">
                        <label for="exampleInputEmail1">
                            เลขห้อง
                        </label> 
                        <?php echo $this->session->flashdata('error_roomnum')?>
                
                        <input type="text" id="roomnum" class="form-control" name="roomnum" value="<?php echo $this->session->flashdata('roomnum'); ?>" pattern="\d{1,9}" maxlength="5" required>
                        <label class="text-danger" hidden id="falseusername"><span class="glyphicon glyphicon-remove"></span> เลขห้องนี้ได้ถูกใช้ไปแล้ว</label>
                        <label class="text-success" hidden id="trueusername"><span class="glyphicon glyphicon-ok"></span> เลขห้องนี้สามารถใช้ได้</label>
                    </div>
                <div class="form-group">
                    <div class="col-sm-4">  
                        <label for="exampleInputEmail1">
                            ประเภทห้อง
                        </label> <br>
                        <?php // echo $this->session->flashdata('error_gender')?>

                        <select name="roomcate" id="roomcate">
                        <?php $this->db->select('roomcategory.*');
							$this->db->from('roomcategory');
							$query = $this->db->get();
							$results = $query->result_array();?>
						<?php	foreach($results as $result){
								?>
											
											<h1><option value="<?php echo $result['roomcategory_id'] . ' '?>"> 
											<?php echo $result['roomcategory_name'] . ' '?> <?php echo $result['roomprice'] . '.- / เดือน'?>
								</option>
											<?php $eiei = $result['roomcategory_id'];
							} ?>
                             
                        </select>

                    </div>
                    
                    </div>

            </div>
                 
                        
             
            <div class="form-group">
                    <!-- <div class="col-sm-4">  
                        <label for="exampleInputEmail1">
                            ราคา
                        </label> <?php echo $this->session->flashdata('error_roomprice')?>
                        <input type="text" id="roomprice" class="form-control" name="roomprice" value="<?php echo $this->session->flashdata('roomprice'); ?>" pattern="\d{1,9}" maxlength="5" required>
                    </div> -->

                    <div class="form-group">
                    <div class="col-sm-4">  
                     

                    </div>
                    
                    </div>

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
        </div> </div> </div> 
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script>  


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