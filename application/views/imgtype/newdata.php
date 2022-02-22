<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            จัดการประเภทห้อง
         </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo  base_url('imgtype'); ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
            <li><a href="<?php echo  base_url('imgtype'); ?>">จัดการประเภทห้อง</a></li>
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
            <form role="form" action="<?php echo  base_url('Imgtype/adding'); ?>" method="post" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ชื่อประเภท</label> <?php echo $this->session->flashdata('error_roomname'); ?>
                        <input type="text" id="roomname" class="form-control" name="roomname" value="<?php echo  $this->session->flashdata('roomname'); ?>" required>
                    </div>
                    

                    <?php $this->db->select('furniture.*');
                   $this->db->from('furniture');

                   $query = $this->db->get();
                   $results = $query->result_array();?>
                   	<?php	foreach ($results as $result) {
                       ?>
                   
                    <div id="hee2" name="hee2" <?php if ($result['stock'] == 0) {?> style="display:none" <?php } ?>>


                <?php
                       if($result['stock'] == 0)
                       { ?>

                            <input type="checkbox" id="customCheck1" name="customCheck1[]" value="<?php echo $result['furniture_id'] ?>" disabled>
                            <label for="vehicle1"><?php echo $result['name'] ?></label><br>

                <?php  }else{ ?>
                             <input type="checkbox" id="customCheck1" name="customCheck1[]" value="<?php echo $result['furniture_id'] ?>">
                            <label for="vehicle1"><?php echo $result['name'] ?></label><br>
                <?php  } ?>
                      
                    
                    <!-- <label class="custom-control-label" for="customCheck1"><?php echo $result['name']; ?></label> --> 
                    </div> 
                    
                                    
                       <?php
                   } ?>
                   <br>
                    <!-- <div class="form-group">
                        <label for="exampleInputEmail1">รายละเอียด</label> <?php echo $this->session->flashdata('error_roomname'); ?>
                        <input type="text" id="detail" class="form-control" name="detail" value="<?php echo  $this->session->flashdata('detail'); ?>" >
                    </div> -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">ราคา</label> <?php echo $this->session->flashdata('error_roomname'); ?>
                        <input type="text" id="roomprice" class="form-control" name="roomprice" value="<?php echo  $this->session->flashdata('roomprice'); ?>" required>
                    </div>
                    <!-- <div class="form-group">
                        <label for="exampleInputEmail1">
                            อัพโหลดไฟล์ภาพ
                        </label> <?php echo $this->session->flashdata('err_typeimg'); ?>
                        <input type="file" name="typeimg" id="typeimg" >
                    </div> -->
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button class="btn btn-primary" name="submit" type="submit"><i class="fa fa-fw fa-save"></i> บันทึกข้อมูล</button>
                    <a class="btn btn-danger" href="<?php echo  base_url('Imgtype'); ?>" role="button"><i class="fa fa-fw fa-close"></i> ยกเลิก</a>
                </div>
            </form>
        </div>
        </div> </div> </div> 
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- <script>
function myFunction() {
  var checkBox = document.getElementById("myCheck");
  var customCheck1 = document.getElementById("customCheck1");
  var bo = 0;
  
  if (checkBox.checked){
    customCheck1.disabled = false;
    console.log(customCheck1.value);
    }
    else
    customCheck1.disabled = true;

      
}
</script> -->