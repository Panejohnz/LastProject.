<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ห้องพัก
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo  base_url('room'); ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
            <li class="active">ห้องพัก</li>
        </ol>
    </section>
    <!-- Top menu -->
    <?php echo $this->session->flashdata('msginfo'); ?>
    <!-- Main content -->
    <section class="content">
        <!-- Your Page Content Here -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">ตารางข้อมูล</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                    <div class="col-sm-1">
                            <?php 
                           $query = $this->db->query("SELECT * FROM room JOIN roomcategory ON roomcategory.roomcategory_id = room.roomcategory_id WHERE roomstatus = 2 ");
                            // $query = $this->db->query("SELECT * FROM `room` WHERE roomstatus = '1'");
                            $ww = $query->result_array();
                            
                            ?>

                           <a class="btn btn-success" href="<?php echo base_url('room/status1/'); ?>" role="button">ห้องว่าง</a>
                       </div>
                       <div class="col-sm-1">
                           <a class="btn btn-danger" href="<?php echo base_url('room/status2'); ?>" role="button">ไม่ว่าง</a>
                       </div>
                       <div class="col-sm-1">
                           <a class="btn btn-warning" href="<?php echo base_url('room/status3'); ?>" role="button">ติดจอง</a>
                       </div>
                        <div class="col-sm-1">
                           
                            <a class="btn btn-default" href="<?php echo  base_url('room'); ?>" role="button"><i class="fa fa-fw fa-refresh"></i> ห้องทั้งหมด</a>
                             
                        </div>
                        
                        <div class="col-sm-12">
                            <div id="" class="dataTables_filter">
                            <form action="" method="GET" name="search">
                            	<label>ค้นหา</label>:<input type="search" name="keyword" class="form-control input-sm" placeholder="ค้นหาชื่อหมวดหมู่"></label>
                            </form>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0"  rowspan="1" colspan="1" style="width: 15%;">เลขห้อง</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 35%;">ประเภทห้อง</th>
                                        <th class="sorting" tabindex="0"  rowspan="1" colspan="1" style="width: 20%;">ราคา</th>
                                        <th class="sorting" tabindex="0"  rowspan="1" colspan="1" style="width: 20%;">สถานะห้อง</th>
                                        
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width:  20px;">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  foreach ($ww as $data) { ?>
                                        <tr role="row">
                                            <td>
                                            <a href="<?php echo base_url('room/edit/'.$data['room_id']); ?>">
                                            <?php echo  $data['roomnum']; ?>
                                            
                                            </a> 
                                            <br>
                                            
                                            </td>
                                            
                                            <td>
                                            
                                            
                                            <?php echo $data['roomcategory_name']; ?>  
                                            <br>
                                            
                                            
                                            </td>
                                            <td>
                                            <?php echo $data['roomprice']; ?>
                                            </td>

                                            <td>
                                            <?php //สถานะ
                                            
                                            $status = $data['roomstatus'];
                                            if ($status == 1) {
                                                ?>
                                               <a href="RoomController/update_status?sval=<?php echo $data['room_id']; ?>&sval=<?php echo $data['roomstatus']; ?>" <?php if ($status == 1) { ?> disabled <?php   } ?> class="btn btn-danger">ไม่ว่าง</a>
                                               
                                            <?php
                                               
                                            } else {
                                                ?>
                                                <a disabled href="Bookaroom/index/<?php echo $data['room_id']; ?>" class="btn btn-warning">ติดจอง</a>
                                               
                                          <?php
                                            }
                                           ?>
                                            </td>
                                            

                                            <td>
                                            	<a class="btn btn-danger btn-xs" href="<?php echo  base_url('room/confrm/'.$data['room_id']); ?>" role="button"><i class="fa fa-fw fa-trash"></i> ลบข้อมูล</a>
                                            </td>
                                        </tr>
                                    <?php }  ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <!-- <div class="col-sm-5">
                            <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Total <?php echo  $total_rows; ?> entries</div>
                        </div> -->
                        <!-- <div class="col-sm-7">
                            <div id="example1_paginate" class="dataTables_paginate paging_simple_numbers">
                                <?php echo $link; ?>
                            </div>

                        </div> -->
                    </div> 
                </div>
            </div><!-- /.box-body -->
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->