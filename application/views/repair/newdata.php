<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            แจ้งซ่อม
         </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo  base_url('repair'); ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
            <li><a href="<?php echo  base_url('repair'); ?>">แจ้งซ่อม</a></li>
            <li class="active">เพิ่มข้อมูลใหม่</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-2"></div> 
            <div class="col-sm-7">
        <!-- Your Page Content Here -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">เพิ่มข้อมูล</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo  base_url('repair/postdata'); ?>" method="post" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ประเภท</label> <?php echo $this->session->flashdata('error_id'); ?>
                        <input type="text" id="id" class="form-control" name="id" value="<?php echo  $this->session->flashdata('id'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ผู้แจ้ง</label> <?php echo $this->session->flashdata('error_customer_id'); ?>
                        <input type="text" id="customer_id" class="form-control" name="customer_id" value="<?php echo  $this->session->flashdata('customer_id'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ห้อง</label> <?php echo $this->session->flashdata('error_roomnum'); ?>
                        <input type="text" id="roomnum" class="form-control" name="roomnum" value="<?php echo  $this->session->flashdata('roomnum'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">รายละเอียด</label> <?php echo $this->session->flashdata('error_job_description'); ?>
                        <input type="text" id="job_description" class="form-control" name="job_description" value="<?php echo  $this->session->flashdata('job_description'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">พนักงาน</label> <?php echo $this->session->flashdata('error_operator_id'); ?>
                        <input type="text" id="operator_id" class="form-control" name="operator_id" value="<?php echo  $this->session->flashdata('operator_id'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">สถานะ</label> <?php echo $this->session->flashdata('error_statusrepair'); ?>
                        <input type="text" id="statusrepair" class="form-control" name="statusrepair" value="<?php echo  $this->session->flashdata('statusrepair'); ?>">
                    </div>

                    <!-- <div class="form-group">
                        <label for="exampleInputEmail1">
                            อัพโหลดไฟล์ภาพ
                        </label> <?php echo $this->session->flashdata('err_typeimg'); ?>
                        <input type="file" name="typeimg" id="typeimg" >
                    </div> -->
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-save"></i> บันทึกข้อมูล</button>
                    <a class="btn btn-danger" href="<?php echo  base_url('repair'); ?>" role="button"><i class="fa fa-fw fa-close"></i> ยกเลิก</a>
                </div>
            </form>
        </div>
        </div> </div> </div> 
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->