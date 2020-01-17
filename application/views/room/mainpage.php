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
                        <div class="col-sm-6">
                           
                            <a class="btn btn-default" href="<?php echo  base_url('room'); ?>" role="button"><i class="fa fa-fw fa-refresh"></i> Refresh Data</a>
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
                                        <th class="sorting" tabindex="0"  rowspan="1" colspan="1" style="width: 15%;">เลขห้อง</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 40%;">ประเภทห้อง</th>
                                        <th class="sorting" tabindex="0"  rowspan="1" colspan="1" style="width: 20%;">ราคา</th>
                                        <th class="sorting" tabindex="0"  rowspan="1" colspan="1" style="width: 20%;">สถานะห้อง</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width:  20px;">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($results)){ foreach ($results as $data) { ?>
                                        <tr role="row">
                                            <td>
                                            <a href="<?php echo base_url('room/edit/'.$data->id); ?>">
                                            <?php echo  $data->roomnum; ?>
                                            
                                            </a> 
                                            <br>
                                            
                                            </td>
                                            
                                            <td>
                                            <br>
                                            
                                            <?php echo $data->roomcate; ?>  
                                            <br>
                                            
                                            
                                            </td>
                                            <td>
                                            <?php echo $data->roomprice; ?>
                                            </td>

                                            <td>
                                            <?php //สถานะ
                                            
                                            $status = $data->roomstatus;
                                            if ($status == 1) {
                                                ?>
                                               <a href="RoomController/update_status?sval=<?php echo $data->id; ?>&sval=<?php echo $data->roomstatus; ?>" <?php if ($status == 1) { ?> disabled <?php   } ?> class="btn btn-danger">ติดจอง</a>
                                               
                                            <?php
                                               
                                            } else {
                                                ?>
                                                <a href="RoomController/update_status?sval=<?php echo $data->id; ?>&sval=<?php echo $data->roomstatus; ?>" class="btn btn-success">ห้องว่าง</a>
                                               
                                          <?php
                                            }
                                           ?>
                                            </td>

                                            <td>
                                            	<a class="btn btn-danger btn-xs" href="<?php echo  base_url('room/confrm/'.$data->id); ?>" role="button"><i class="fa fa-fw fa-trash"></i> ลบข้อมูล</a>
                                            </td>
                                        </tr>
                                    <?php } } ?>
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