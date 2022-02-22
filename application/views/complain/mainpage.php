
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ร้องเรียน
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo  base_url('contract'); ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
            <li class="active">ร้องเรียน</li>
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
                                        
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1">ห้อง</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1">รายะเอียด</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1">พนักงานรับเรื่องร้องเรียน</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1">สถานะการเรื่องร้องเรียน</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width:  200px;">ตอบกลับลูกค้า</th>
                                        
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width:  60px;">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $query = $this->db->query('SELECT * FROM complain 
                                
                                 JOIN contract ON contract.contract_id = complain.contract_id
                                 JOIN users ON users.user_id = contract.user_id
                                 JOIN room ON room.room_id = contract.room_id
                                 LEFT JOIN  emmployee ON emmployee.employee_id = complain.employee_id
                                 ');
                                             ?>
                                    <?php if (!empty($results)) {
    foreach ($results as $data) { ?>
                                        <tr role="row">
                                            <td>
                                            
                                            <?php echo  $data->roomnum; ?>
                                            <br>
                                           
                                            <td>
                                            <?php echo $data->complaindetail; ?>
                                              
                                            </td> 
                                            <td>
                                            <?php echo $data->firstname_emp; ?>
                                              
                                            </td> 
                                            <td>
                                            <?php //สถานะ
                                            $emp_id = $this->session->userdata('employee_id');
                                            $status = $data->complain_status;
                                            if ($status == 1) {
                                                ?>
                                                <a href="ComplainController/update_complain/<?php echo $data->complain_id; ?>" class="btn btn-success">อนุมัติ</a>
                                                <a href="ComplainController/update_complain2/<?php echo $data->complain_id; ?>" class="btn btn-danger">ไม่อนุมัติ</a>
                                               <!-- <?php if ($status == 1) { ?> disabled <?php   } ?> -->
                                            <?php
                                            }  elseif ($status == 2) { ?>
                                                <a disabled href="ComplainController/update_complain/<?php echo $data->complain_id; ?>" class="btn btn-success">กำลังดำเนินการร้องเรียน</a>
                                           <?php } elseif($status == 3) { ?>
                                               <a disabled href="ComplainController/update_complainno/<?php echo $data->complain_id; ?>" class="btn btn-danger">ไม่อนุมัติ</a>
                                           <?php  } elseif($status == 4) { ?>
                                               <a disabled href="ComplainController/update_complain/<?php echo $data->complain_id; ?>" class="btn btn-primary">เสร็จสิ้น</a>
                                               <?php  }  ?>
                                            </td>
                                           
                                                      <td><form method="post" action=<?php echo base_url('ComplainController/update_status/' . $data->complain_id) ?> >
                                                      <input  onkeyup="stoppedTyping()" required type="text" name="send" id="send"  <?php if ($status == 1 || $status == 3) { ?>
                                                            style="display: none;" <?php   }else {?> style="width:  200px;" <?php } ?><?php if($status == 4) {?> disabled <?php } ?> value=<?php echo $data->comment?>>
                                                            <button  type="submit" id="submit" name="submit" value="submit" <?php if ($status == 1 || $status == 3) { ?>
                                                                style="display: none" <?php   } ?> <?php if($data->comment != null) {?> disabled <?php } ?>

                                                       > ตอบกลับลูกค้า</button>
                                                       </form>
                                                       <form method="post" action=<?php echo base_url('ComplainController/update_complainno/' . $data->complain_id) ?> >
                                                       <input <?php if($data->comment != null) {?> disabled <?php } ?> onkeyup="stoppedTyping()" required type="text" name="send1" id="send1" <?php if ($status == 1 || $status == 2 || $status == 4) { ?>
                                                            style="display: none" <?php   }else{?> style="width:  200px;" <?php } ?><?php if($status == 4) {?> disabled <?php } ?> value=<?php echo $data->comment?>>
                                                            <button  type="submit" id="submit1" name="submit1" value="submit" <?php if ($status == 1 || $status == 2 ||  $status == 4) { ?>
                                                                style="display: none" <?php   } ?> <?php if($data->comment != null) {?> disabled <?php } ?>

                                                       > ตอบกลับลูกค้า</button>
                                                       </form>
                                                        </td>
                                                        <td> <a target="_blank" href="<?php echo  base_url('imageapp/' .$data->image_filename); ?>">
                                                            <img src="<?php echo base_url(); ?>./imageapp/<?php echo $data->image_filename; ?>"  width="50px"></a></td>
                                             
                                            <td>
                                            	<a class="btn btn-danger btn-xs" href="<?php echo  base_url('complain/confrm/'.$data->complain_id); ?>" role="button"><i class="fa fa-fw fa-trash"></i> ลบข้อมูล</a>
                                            </td>
                                        </tr>
                                    <?php }
} ?>
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