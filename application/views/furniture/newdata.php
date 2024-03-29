<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            จัดการเฟอร์นิเจอร์
            
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo  base_url('FurnitureController'); ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
            <li><a href="<?php echo  base_url('FurnitureController'); ?>">จัดการเฟอร์นิเจอร์</a></li>
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
            <form role="form" action="<?php echo  base_url('FurnitureController/postdata'); ?>" method="post" class="form-horizontal">
                
                <div class="box-body">
                <div class="form-group">
                <div class="col-sm-4">
                        <label for="exampleInputEmail1">
                            ชื่อ
                        </label> 
                        <?php echo $this->session->flashdata('error_name')?>
                        <input type="text" id="name" class="form-control" name="name" value="<?php echo $this->session->flashdata('name'); ?>" required>
                        <label class="text-danger" hidden id="falseusername"><span class="glyphicon glyphicon-remove"></span> ชื่อนี้ได้ถูกใช้ไปแล้ว</label>
                        <label class="text-success" hidden id="trueusername"><span class="glyphicon glyphicon-ok"></span> ชื่อนี้สามารถใช้ได้</label>
               
                    </div>
                <div class="col-sm-4">  
                    <label for="exampleInputEmail1">
                            ราคา
                        </label> <?php echo $this->session->flashdata('error_price')?>
                        <input type="text" id="price" min="1" class="form-control" name="price" value="<?php echo  $this->session->flashdata('price'); ?>" required>
                </div>

                <div class="col-sm-4">  
                    <label for="exampleInputEmail1">
                            ราคาสินค้า
                        </label> <?php echo $this->session->flashdata('error_price')?>
                        <input type="text" min="1" id="fullprice" class="form-control" name="fullprice" value="<?php echo  $this->session->flashdata('payinfull'); ?>" required>
                </div>

                <div class="col-sm-4">  
                    <label for="exampleInputEmail1">
                            จำนวน
                        </label> <?php echo $this->session->flashdata('error_price')?>
                        <input type="text" min="1" id="password" class="form-control" name="stock" value="<?php echo  $this->session->flashdata('stock'); ?>" required pattern="\d{1,9}">
                </div>

            </div>
                 
                        
             
           


            

                   

                     

                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button name="button" id="button" class="btn btn-primary" type="submit">
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
        </div> </div> </div> 
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>  


 $(document).ready(function(){ 
     
      $('#name').change(function(){  
           var name = $('#name').val();  
           if(name != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>FurnitureController/checkmail",  
                     method:"POST",  
                     data:{name:name},  
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