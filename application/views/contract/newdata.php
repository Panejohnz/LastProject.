<link rel="icon" type="image/png" href="<?php echo base_url(); ?>./assets/bluesky/images/goldd.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i" rel="stylesheet">
    
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        จัดการสัญญาเช่า
         </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo  base_url('contract'); ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
            <li><a href="<?php echo  base_url('contract'); ?>">จัดการสัญญาเช่า</a></li>
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
         <?php   $stringrow = base_url(uri_string());
        $arraystate = (explode("/", $stringrow));
        $idtestt = ($arraystate[6]);
        ?>
         <?php   $this->db->where('reservations_id',$idtestt);
        $qq = $this->db->get('reservations');
        $data = $qq->row_array();
        
        $this->db->where('reservations_id', $data['reservations_id']);
        $qq1 = $this->db->get('reservationsroom');
        $data1 = $qq1->row_array();
        
        $this->db->where('user_id', $data['id_users']);
        $qq2 = $this->db->get('users');
        $data2 = $qq2->row_array();
        
        
        
        
        ?>
            <form role="form" action="<?php echo  base_url('contract/adding/' . $data['id_users']. '/'.$data1['room_id'] .'/' . $data['reservations_id']); ?>" method="post" enctype="multipart/form-data">
                <div class="box-body">
                    <!-- <div class="form-group">
                        <label for="exampleInputEmail1">สัญญาเช่า</label> <?php echo $this->session->flashdata('error_roomname'); ?>
                        <input type="text" id="roomname" class="form-control" name="roomname" value="<?php echo  $this->session->flashdata('roomname'); ?>">
                    </div> --> <div class="col-sm-4">
                   
                        <label for="exampleInputEmail1">
                           ชื่อ <?php echo $this->session->flashdata('item'); ?> 
                        </label> 
                        <?php echo $this->session->flashdata('error_username')?>
                        <input readonly type="text" id="firstname" class="form-control" name="firstname" value="<?php echo $data2['firstname'] ?>">
                </div>
                <div class="col-sm-4">  
                    <label for="exampleInputEmail1">
                            นามสกุล
                        </label> <?php echo $this->session->flashdata('error_password')?>
                        <input readonly type="text" id="lastname" class="form-control" name="lastname" value="<?php echo $data2['lastname'] ?>">
                </div>
                <div class="col-sm-4">  
                    <label for="exampleInputEmail1">
                           เบอร์โทร
                        </label> <?php echo $this->session->flashdata('error_password')?>
                        <input readonly type="text" id="phone" class="form-control" name="phone" value="<?php echo $data2['tel'] ?>">
                </div>
                <div class="col-sm-4">  
                    <label for="exampleInputEmail1">
                          เลขบัตรประชาชน
                        </label> <?php echo $this->session->flashdata('error_password')?>
                        <input type="text" id="card" class="form-control" name="card" value="" maxlength="13" required>
                </div>
                <div class="col-sm-4">  
                    <label for="exampleInputEmail1">
                          วันที่ทำสัญญา
                        </label> <?php echo $this->session->flashdata('error_password')?>
                        <input type="date" id="datestart" class="form-control" name="datestart" value="" required>
                </div>
                <div class="col-sm-4">  
                    <label for="exampleInputEmail1">
                       วันที่สินสุดสัญญา
                        </label> <?php echo $this->session->flashdata('error_password')?>
                        <input type="date" id="dateend" class="form-control" name="dateend" value="" required>
                </div>
                <div class="col-sm-4">  
                    <label for="exampleInputEmail1">
                          ที่อยู่
                        </label> <?php echo $this->session->flashdata('error_password')?>
                        <input type="text" id="address" class="form-control" name="address" value="" required>
                </div>
                <div class="col-sm-4">  
                    <label for="exampleInputEmail1">
                          ราคาค่าเช่าห้อง
                        </label> <?php echo $this->session->flashdata('error_password')?>
                        <input readonly type="text" id="totalprice" class="form-control" name="totalprice" value="<?php echo $data1['totalprice'] ?>" required>
                </div>


            </div>
            
   
                    
                  

                <div class="box-footer">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-save"></i> บันทึกข้อมูล</button>
                    <a class="btn btn-danger" href="<?php echo  base_url('contract'); ?>" role="button"><i class="fa fa-fw fa-close"></i> ยกเลิก</a>
                </div>
            </form>
        </div>
        </div> </div> </div> 
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script src="<?php echo base_url('./assets/deluxe/js/jquery.min.js')?>"></script>
  <script src="<?php echo base_url('./assets/deluxe/js/jquery-migrate-3.0.1.min.js')?>"></script>
  <script src="<?php echo base_url('./assets/deluxe/js/jquery.waypoints.min.js')?>"></script>
  <script src="<?php echo base_url('./assets/deluxe/js/jquery.stellar.min.js')?>"></script>
  <script src="<?php echo base_url('./assets/deluxe/js/owl.carousel.min.js')?>"></script>
  <script src="<?php echo base_url('./assets/deluxe/js/jquery.magnific-popup.min.js')?>"></script>
  <script src="<?php echo base_url('./assets/deluxe/js/aos.js')?>"></script>
  <script src="<?php echo base_url('./assets/deluxe/js/jquery.animateNumber.min.js')?>"></script>
  <script src="<?php echo base_url('./assets/deluxe/js/bootstrap-datepicker.js')?>"></script>
  <script src="<?php echo base_url('./assets/deluxe/js/jquery.timepicker.min.js')?>"></script>
  <script src="<?php echo base_url('./assets/deluxe/js/scrollax.min.js')?>"></script>
  <script src="<?php echo base_url('./assets/deluxe/js/main.js')?>"></script>