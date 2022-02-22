<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            แจ้งย้าย
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo  base_url('contract'); ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
            <li class="active">แจ้งย้าย</li>
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
                            <a class="btn btn-default" href="<?php echo  base_url('ComplainController'); ?>" role="button"><i class="fa fa-fw fa-refresh"></i> Refresh Data</a>
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
                                        
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1">รายะเอียด</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1">ชื่อลูกค้า</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1">พนักงานรับเรื่อง</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1">สถานะ</th>

                                        
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width:  60px;">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($results)) {
    foreach ($results as $data) { ?>
                                        <tr role="row">
                                            <td>
                                            <a href="<?php echo base_url('complain/edit/'.$data->moveroom_id); ?>">
                                            <?php echo  $data->moveroomdetail; ?>
                                            <br>
                                           
                                            <td>
                                            <?php echo $data->firstname; ?>
                                          
                                            </td> 
                                            <td>
                                            <?php echo $data->firstname_emp; ?>
                                              
                                            </td> 
                                            <td>
                                            <?php //สถานะ
                                            $emp_id = $this->session->userdata('employee_id');
                                            $status = $data->moveroom_status;
                                            
                                            if ($status == 1) {
                                                ?>
                                                <a href="MoveroomController/update_moveroom/<?php echo $data->moveroom_id; ?>" class="btn btn-success">อนุมัติ</a>
                                                <a href="MoveroomController/update_moveroom2/<?php echo $data->moveroom_id; ?>" class="btn btn-danger">ไม่อนุมัติ</a>
                                               <!-- <?php if ($status == 1) { ?> disabled <?php   } ?> -->
                                            <?php
                                            }  elseif ($status == 2) { ?>
                                                <a disabled href="MoveroomController/update_moveroom/<?php echo $data->moveroom_id; ?>" class="btn btn-success">อยู่ในระหว่างการย้ายห้อง</a>
                                           <?php } elseif($status == 3) { ?>
                                               <a disabled href="MoveroomController/update_moveroom/<?php echo $data->moveroom_id; ?>" class="btn btn-danger">ไม่อนุมัติการย้ายห้อง</a>
                                           <?php  } elseif($status == 4) { ?>
                                               <a disabled href="MoveroomController/update_moveroom/<?php echo $data->moveroom_id; ?>" class="btn btn-primary">เสร็จสิ้น</a> 
                                               <a href="<?php echo base_url('WalkinController/index/'.$data->user_id.'/'.$data->room_id);?>">เลือกห้องใหม่</a>
                                           <?php
                                            }
                                           ?>
                                            </td>
<td><form method="post" action=<?php echo base_url('MoveroomController/update_status/' . $data->moveroom_id) ?> >
<input  onkeyup="stoppedTyping()" required type="text" name="send" id="send"  <?php if ($status == 1 || $status == 3) { ?>
                                                            style="display: none;" <?php } else { ?> style="width:  200px;" <?php } ?><?php if($status == 4) {?> disabled <?php } ?> value=<?php echo $data->comment?>>
                                                            <button  type="submit" id="submit" name="submit" value="submit" <?php if ($status == 1 || $status == 3) { ?>
                                                                style="display: none" <?php   } ?> <?php if($data->comment != null) {?> disabled <?php } ?>
                                                       > ตอบกลับลูกค้า</button>
                                                        
                                                        </form>
                                                        <form method="post" action=<?php echo base_url('MoveroomController/update_statusno/' . $data->moveroom_id) ?> >
                                                        <input <?php if($data->comment != null) {?> disabled <?php } ?> onkeyup="stoppedTyping()" required type="text" name="send1" id="send1" <?php if ($status == 1 || $status == 2 || $status == 4) { ?>
                                                            style="display: none" <?php   }else{?> style="width:  200px;" <?php } ?><?php if($status == 4) {?> disabled <?php } ?> value=<?php echo $data->comment?>>
                                                            <button  type="submit" id="submit1" name="submit1" value="submit" <?php if ($status == 1 || $status == 2 ||  $status == 4) { ?>
                                                                style="display: none" <?php   } ?> <?php if($data->comment != null) {?> disabled <?php } ?>

                                                       > ตอบกลับลูกค้า</button>
                                                       </form></td>

                                             
                                            <td>
                                            	<a class="btn btn-danger btn-xs" href="<?php echo  base_url('complain/confrm/'.$data->moveroom_id); ?>" role="button"><i class="fa fa-fw fa-trash"></i> ลบข้อมูล</a>
                                            </td>
                                        </tr>
                                   
                                </tbody>
                                <?php } 
} ?>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <!-- <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Total <?php echo  $total_rows; ?> entries</div> -->
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