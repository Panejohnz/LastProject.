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
                                        <th class="sorting" tabindex="0"  rowspan="1" colspan="1" style="width: 15%;">วันที่</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1">รายละเอียด</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1">วันที่จอง</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1">หลักฐานการจอง</th>
                                        
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width:  60px;">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($results)){ foreach ($results as $data) { ?>
                                        <tr role="row">
                                            <td>
                                            <a href="<?php echo base_url('reservations/edit/'.$data->reservations_id); ?>">
                                            <?php echo  $data->reservationsstart; ?>
                                            </a> 
                                            <br>
                                          
                                            </td>
                                            
                                            <td>
                                            
                                            <!-- <?php echo  $data->id_users; ?><br> -->
                                            ชื่อ-นามสกุล: <?php echo   $data->firstname; ?>&nbsp;<?php echo  $data->lastname; ?><br>
                                            เบอร์โทรศัพท์: <?php echo  $data->tel; ?><br>
                                            อีเมล: <?php echo  $data->email; ?><br>    
                                            ห้อง: <?php echo  $data->roomnum; ?><br>
                                             เฟอร์นิเจอร์: <?php echo  $data->name; ?>

                                            <br>
                                           
                                            
                                            </td>
                                            <td> <?php echo $data->reservations_id; ?>
                                            <?php echo  $data->slip_date; ?>
                                            </td>
                                            <!-- <td>
                                            <?php echo  $data->telephone; ?>
                                            </td>
                                            <td>
                                            <?php echo  $data->reservationsprice; ?>  
                                            </td> -->
                                            <td>
                                            <a target="_blank" href="<?php echo  base_url('uploads/'.$data->slip_file); ?>">
                                            <img src="<?php echo base_url(); ?>./uploads/<?php echo $data->slip_file; ?>" width="50px"></a>
                                            
                                            </td>
                                            <td>
                                            <a class="btn btn-success" href="<?php echo  base_url('contract/newdata'.$data->reservations_id); ?>" role="button"><i class="fa fa-fw fa-plus-circle"></i> ทำสัญญา</a>
                                            </td>
                                            <td>
                                            	<a class="btn btn-danger btn-xs" href="<?php echo  base_url('Reservationadmin/confrm/'.$data->reservations_id); ?>" role="button"><i class="fa fa-fw fa-trash"></i> ลบข้อมูล</a>
                                            </td>
                                        </tr>
                                    <?php }} ?>
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
