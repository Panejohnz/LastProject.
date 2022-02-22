<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        จัดการค่าน้ำ
            
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo  base_url('watercontroller'); ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
            <li><a href="<?php echo  base_url('watercontroller'); ?>">จัดการค่าน้ำ</a></li>
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
            <form role="form" action="<?php echo  base_url('watercontroller/postdata'); ?>" method="post" class="form-horizontal">
                
                <div class="box-body">
                <div class="form-group">
                <div class="col-sm-4">
                        <label for="exampleInputEmail1">
                        รายการสาธารณูปโภค
                        </label> 
                        <?php echo $this->session->flashdata('error_typebill')?>
                        <input type="text" id="typebill" class="form-control" maxlength="255" name="typebill" value="<?php echo $this->session->flashdata('typebill'); ?>" required>
                        <label class="text-danger" hidden id="falseusername"><span class="glyphicon glyphicon-remove"></span> ชื่อนี้ได้ถูกใช้ไปแล้ว</label>
                        <label class="text-success" hidden id="trueusername"><span class="glyphicon glyphicon-ok"></span> ชื่อนี้สามารถใช้ได้</label>
                    </div>
                <div class="col-sm-4">  
                    <label for="exampleInputEmail1">
                    ราคาต่อหน่วย
                        </label> <?php echo $this->session->flashdata('error_pricemeter')?>
                        <input type="text" id="pricemeter" class="form-control" min="1"  name="pricemeter" value="<?php echo  $this->session->flashdata('pricemeter'); ?>" required>
                </div>

            </div>
                 
                        
             
            



            

                    
                   

                     

                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button id="button" name="button" class="btn btn-primary" type="submit">
                        <i class="fa fa-fw fa-save">
                        </i>บันทึกข้อมูล
                    </button>
                    <a class="btn btn-danger" href="<?php echo  base_url('water'); ?>" role="button">
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
     
      $('#typebill').change(function(){  
           var typebill = $('#typebill').val();  
           if(typebill != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>Watercontroller/checkmail",  
                     method:"POST",  
                     data:{typebill:typebill},  
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