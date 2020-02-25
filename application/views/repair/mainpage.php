<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            รายการแจ้งซ่อม
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo  base_url('repair'); ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
            <li class="active">รายการแจ้งซ่อม</li>
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
                        
                            <a class="btn btn-default" href="<?php echo  base_url('repair'); ?>" role="button"><i class="fa fa-fw fa-refresh"></i> Refresh Data</a>
                        </div>
                        <div class="col-sm-6">
                            <div id="" class="dataTables_filter">
                            <form action="" method="GET" name="search">
                            	<label>ค้นหา</label>:<input type="search" name="keyword" class="form-control input-sm" placeholder="ค้นหา"></label>
                            </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0"  rowspan="1" colspan="1">ID</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1">ผู้แจ้ง</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1">ห้อง</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1">รายละเอียด</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1">พนักงาน</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1">สถานะ</th>


                                        
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width:  60px;">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($results)){ foreach ($results as $data) { ?>
                                        <tr role="row">
                                            <td>
                                            <a href="<?php echo base_url('repair/edit/'.$data->repair_id); ?>">
                                            <?php echo  $data->repair_id; ?>
                                            </a> 
                                            <br>
                                           <td>
                                           <?php echo  $data->user_id; ?>
                                    </td>
                                    <td>
                                           <?php echo  $data->roomnum; ?>
                                    </td>
                                    <td>
                                           <?php echo  $data->job_description; ?>
                                    </td>
                                    <td>
                                           <!-- <?php echo  $data->operator_id; ?> -->
                                    </td>

                                    <td>
                                            <?php //สถานะ
                                            
                                            $status = $data->statusrepair;
                                            if ($status == 1) {
                                                ?>
                                               <a href="repair/update_status?sval=<?php echo $data->id; ?>&sval=<?php echo $data->statusrepair; ?>"  class="btn btn-success">รับเรื่องแล้ว</a>
                                               <!-- <?php if ($status == 1) { ?> disabled <?php   } ?> -->
                                            <?php
                                               
                                            } else {
                                                ?>
                                                <a href="repair/update_repair/<?php echo $data->repair_id; ?>" class="btn btn-danger">กำลังตรวจสอบ</a>
                                               
                                          <?php
                                            }
                                           ?>
                                            </td>

                                    <!-- <td>
                                           <?php echo  $data->statusrepair; ?>
                                    </td> -->
                                            </td>
                                            
                                            <td>
                                            	<a class="btn btn-danger btn-xs" href="<?php echo  base_url('repair/confrm/'.$data->repair_id); ?>" role="button"><i class="fa fa-fw fa-trash"></i> ลบข้อมูล</a>
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