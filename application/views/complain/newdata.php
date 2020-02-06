<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            จัดการร้องเรียน
            
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo  base_url('ComplainController'); ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
            <li><a href="<?php echo  base_url('ComplainController'); ?>">จัดการร้องเรียน</a></li>
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
            <form role="form" action="<?php echo  base_url('ComplainController/postdata'); ?>" method="post" class="form-horizontal">
                
                <div class="box-body">
                <div class="form-group">
                <div class="col-sm-4">
                        <label for="exampleInputEmail1">
                            Detail
                        </label> 
                        <?php echo $this->session->flashdata('error_username')?>
                        <input type="text" id="complaindetail" class="form-control" name="complaindetail" value="<?php echo $this->session->flashdata('complaindetail'); ?>">
                </div>
                <div class="col-sm-4">  
                    <label for="exampleInputEmail1">
                            user_id
                        </label> <?php echo $this->session->flashdata('error_password')?>
                        <input type="text" id="user_id" class="form-control" name="user_id" value="<?php echo  $this->session->flashdata('user_id'); ?>">
                </div>

            </div>
                 
                        
             
           



            

                  
                   

                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button class="btn btn-primary" type="submit">
                        <i class="fa fa-fw fa-save">
                        </i>บันทึกข้อมูล
                    </button>
                    <a class="btn btn-danger" href="<?php echo  base_url('ComplainController'); ?>" role="button">
                        <i class="fa fa-fw fa-close">
                        </i>ยกเลิก
                    </a>
                </div>
            </form>
        </div>
        </div> </div> </div> 
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->