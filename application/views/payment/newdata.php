<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            จัดการการแจ้งซ่อม
            
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo  base_url('repair'); ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
            <li><a href="<?php echo  base_url('repair'); ?>">จัดการการแจ้งซ่อม</a></li>
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
            <form role="form" action="<?php echo  base_url('repair/postdata'); ?>" method="post" class="form-horizontal">
                
                <div class="box-body">
                <div class="form-group">
                <div class="col-sm-4">
                        <label for="exampleInputEmail1">
                            id
                        </label> 
                        <?php echo $this->session->flashdata('error_username')?>
                        <input type="text" id="id" class="form-control" name="id" value="<?php echo $this->session->flashdata('id'); ?>" required>
                </div>
                <div class="col-sm-4">  
                    <label for="exampleInputEmail1">
                            ผู้แจ้ง
                        </label> <?php echo $this->session->flashdata('error_password')?>
                        <input type="text" id="customer_id" class="form-control" name="customer_id" value="<?php echo  $this->session->flashdata('customer_id'); ?>" required>
                </div>

            </div>
                 
                        
             
            <div class="form-group">
                    <div class="col-sm-4">  
                        <label for="exampleInputEmail1">
                            ห้อง
                        </label> <?php echo $this->session->flashdata('error_firstname')?>
                        <input type="text" id="roomnum" class="form-control" name="roomnum" value="<?php echo $this->session->flashdata('roomnum'); ?>" required>
                    </div>

                    <div class="col-sm-4">      
                        <label for="exampleInputEmail1">
                            รายละเอียด
                        </label> <?php echo $this->session->flashdata('error_lastname')?>
                        <input type="text" id="job_description" class="form-control" name="job_description" value="<?php echo  $this->session->flashdata('job_description'); ?>" required>
                    </div>

            </div>



            

                    <div class="form-group">
                    <div class="col-sm-4">      
                        <label for="exampleInputEmail1">
                            พนักงาน
                        </label> <?php echo $this->session->flashdata('error_tel')?>
                        <input type="text" id="operator_id" class="form-control" name="operator_id" value="<?php echo  $this->session->flashdata('operator_id'); ?>" required>
                    </div>

                    <div class="col-sm-4">  
                        <label for="exampleInputEmail1">
                            สถานะ
                        </label> <?php echo $this->session->flashdata('error_email')?>
                        <input type="text" id="statusrepair" class="form-control" name="statusrepair" value="<?php echo  $this->session->flashdata('statusrepair'); ?>" required>
                    </div>
                    
                    </div>
                    <!-- <div class="form-group">
                    <div class="col-sm-4">  
                        <label for="exampleInputEmail1">
                            เพศ
                        </label> 
                        <?php // echo $this->session->flashdata('error_gender')?>

                        <select name="gender" id="gender">
                            <option value="1">ชาย</option>
                            <option value="2">หญิง</option>
                             
                        </select>

                    </div>
                    
                    </div> -->

                     

                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button class="btn btn-primary" type="submit">
                        <i class="fa fa-fw fa-save">
                        </i>บันทึกข้อมูล
                    </button>
                    <a class="btn btn-danger" href="<?php echo  base_url('member'); ?>" role="button">
                        <i class="fa fa-fw fa-close">
                        </i>ยกเลิก
                    </a>
                </div>
            </form>
        </div>
        </div> </div> </div> 
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->