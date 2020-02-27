<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            รายการจองห้องพัก
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo  base_url('reservations'); ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
            <li class="active">การจองห้องพัก</li>
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
                        <div class="col-sm-6">
                            <!-- <a class="btn btn-success" href="<?php echo  base_url('member/newdata'); ?>" role="button"><i class="fa fa-fw fa-plus-circle"></i> เพิ่มข้อมูล</a> -->
                            <a class="btn btn-default" href="<?php echo  base_url('Reservationadmin'); ?>" role="button"><i class="fa fa-fw fa-refresh"></i> Refresh Data</a>
                        </div>
                        <div class="col-sm-6">
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
                                        <th class="sorting" tabindex="0"  rowspan="1" colspan="1" style="width: 1%;">วันที่</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1">รายละเอียด</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1">ห้อง</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 20%;">เฟอร์นิเจอร์</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1">วันที่จอง</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1">หลักฐานการจอง</th>
                                        
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width:  20px;">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php        $query = $this->db->query("SELECT * FROM `reservations`
                                                    LEFT JOIN users
                                                    ON reservations.id_users = users.user_id
                                                    LEFT JOIN reservationsroom
                                                    ON reservations.reservations_id = reservationsroom.reservations_id 
                                                    LEFT JOIN room
                                                    ON  room.room_id = reservationsroom.room_id");

                                                     
                                                       
                                                             ?>
                                      
                                        <tr role="row">
                                            <?php  foreach($query->result_array() as $data)
                                                    { ?>
                                            <td>
                                            <a href="<?php echo base_url('reservations/edit/'.$data['reservations_id']); ?>">
                                            <?php echo  $data['reservationsstart']; ?>
                                            </a> 
                                            <br>
                                          
                                            </td>
                                            
                                            <td>
                                            
                                            
                                            ชื่อ-นามสกุล: <?php echo   $data['firstname']; ?>&nbsp;<?php echo  $data['lastname']; ?><br>
                                            เบอร์โทรศัพท์: <?php echo  $data['tel']; ?><br>
                                            อีเมล: <?php echo  $data['email']; ?><br> 
                                            <td>   
                                         <?php echo  $data['roomnum']; ?>
                                            </td>
                                            <td>
                                            <?php  if($data['Type'] == 'มีเฟอร์นิเจอร์')
                                                        {

                                                            $hee = $data['reservations_id'];

                                                            $qq = $this->db->query("SELECT * FROM `reservationsfurniture`
                                                            LEFT JOIN furniture
                                                            ON furniture.furniture_id = reservationsfurniture.furniture_id
                                                            WHERE reservationsfurniture.reservations_id = $hee ");

                                                            foreach($qq->result_array() as $data2)
                                                            { ?>
                                                                | <?php echo  $data2['name']; ?>


                                                        <?php     } 
                                                            
                                                        } ?>
                                                

                                            <br>
                                           
                                            
                                            </td>
                                            <td> 
                                            <?php echo  $data['slip_date']; ?>
                                            </td>
                                            <!-- <td>
                                            <?php echo  $data['telephone']; ?>
                                            </td>
                                            <td>
                                            <?php echo  $data['reservationsprice']; ?>  
                                            </td> -->
                                            <td>
                                            <a target="_blank" href="<?php echo  base_url('uploads/' .$data['slip_file']); ?>">
                                            <img src="<?php echo base_url(); ?>./uploads/<?php echo $data['slip_file']; ?>" width="50px"></a>
                                            
                                            </td>
                                            <!-- <?php $this->db->select('*');
                                                $this->db->from('room');
                                                $this->db->join('contract', 'contract.room_id = room.room_id');
                                                $this->db->join('reservations', 'reservations.reservations_id = contract.reservations_id');
                                                $this->db->where('room.room_id = contract.room_id');
                                                
                                               $query = $this->db->get();
                                                $rr = $query->result_array();
                                                
                                                
                                            ?> -->
                                       <td>
                                            <a class="btn btn-success" href="<?php echo  base_url('contract/newdata/'.$data['reservations_id']); ?>" role="button"><i class="fa fa-fw fa-plus-circle"></i> ทำสัญญา</a>
                                            </td>
                                           
                                            <td>
                                            	<a class="btn btn-danger btn-xs" href="<?php echo  base_url('Reservationadmin/confrm/'.$data['reservations_id']."/".$data['room_id']); ?>" role="button"><i class="fa fa-fw fa-trash"></i> ลบข้อมูล</a>
                                            </td>
                                           
                                            
                                        </tr>
                                                <?php } ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Total <?php echo  $total_rows; ?> entries</div>
                        </div>
                        <div class="col-sm-7">
                            <div id="example1_paginate" class="dataTables_paginate paging_simple_numbers">
                                <?php echo $link; ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div><!-- /.box-body -->
        </div>
        
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
