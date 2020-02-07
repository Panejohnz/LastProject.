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
                        <input type="text" id="roomnum" class="form-control" name="roomnum" value="<?php echo $this->session->flashdata('roomnum'); ?>" pattern="/^[0]+[0-9]+$/">
                </div>
                <div class="form-group">
                    <div class="col-sm-4">  
                        <label for="exampleInputEmail1">
                            ประเภทห้อง
                        </label> <br>
                        <?php // echo $this->session->flashdata('error_gender')?>

                        <select name="roomcate" id="roomcate">
                            <option value="1">ห้องแอร์</option>
                            <option value="2">ห้องพัดลม</option>
                             
                        </select>

                    </div>
                    
                    </div>

            </div>
                 
                        
             
            <div class="form-group">
                    <div class="col-sm-4">  
                        <label for="exampleInputEmail1">
                            ราคา
                        </label> <?php echo $this->session->flashdata('error_roomprice')?>
                        <input type="text" id="roomprice" class="form-control" name="roomprice" value="<?php echo $this->session->flashdata('roomprice'); ?>" pattern="/^[0]+[0-9]+$/">
                    </div>

                    <div class="form-group">
                    <div class="col-sm-4">  
                        <label for="exampleInputEmail1">
                            สถานะ
                        </label> 
                        <br>
                        <?php // echo $this->session->flashdata('error_gender')?>

                        <select name="roomstatus" id="roomstatus">
                            <option value="0">ว่าง</option>
                            <option value="1">ไม่ว่าง</option>
                             
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