<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            จัดการสัญญาเช่า
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo  base_url('contract'); ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
            <li class="active">จัดการสัญญาเช่า</li>
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
                            <!-- <a class="btn btn-success" href="<?php echo  base_url('contract/newdata'); ?>" role="button"><i class="fa fa-fw fa-plus-circle"></i> เพิ่มข้อมูล</a> -->
                            <a class="btn btn-default" href="<?php echo  base_url('contract'); ?>" role="button"><i class="fa fa-fw fa-refresh"></i> Refresh Data</a>
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
                                       
                                        <th class="sorting" tabindex="1" rowspan="1" colspan="1">เลขที่สัญญา</th>
                                        <th class="sorting" tabindex="1" rowspan="1" colspan="1">หมายเลขห้อง</th>
                                        <th class="sorting" tabindex="1" rowspan="1" colspan="1">ชื่อลูกค้า</th>
                                        <!-- <th class="sorting" tabindex="1" rowspan="1" colspan="1">ราคาห้อง</th> -->
                                        <th class="sorting" tabindex="1" rowspan="1" colspan="1">ชื่อพนักงานทำสัญญา</th>
                                        <th class="sorting" tabindex="1" rowspan="1" colspan="1">เลขบัตรประชาชนลูกค้า</th>
                                        <!-- <th class="sorting" tabindex="1" rowspan="1" colspan="1">ที่อยู่</th> -->
                                        <th class="sorting" tabindex="1" rowspan="1" colspan="1">วันที่เรื่มสัญญา</th>
                                        <th class="sorting" tabindex="1" rowspan="1" colspan="1">ระยะเวลาสัญญา</th>
                                        <th class="sorting" tabindex="1" rowspan="1" colspan="1">วันสิ้นสุดสัญญา</th>
                                        <th class="sorting" tabindex="1" rowspan="1" colspan="1">ไฟล์สัญญา</th>

                                        
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width:  60px; height:50px;">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                             
                                    <?php if (!empty($results)) {
    foreach ($results as $data) { ?>
    
                                        <tr role="row">
                                          
                                           <td>  <?php echo $data->contract_id; ?>  </td>
                                           <td>  <?php echo $data->roomnum; ?> </td>
                                           <td>  <?php echo $data->firstname; ?>  </td>
                                           <?php $this->db->where('contract_id',$data->contract_id);
                                          $ff = $this->db->get('contract');
                                          $qq = $ff->row_array(); 
                                          
                                                $this->db->where('employee_id',$qq['employee_id']);
                                                $fff = $this->db->get('emmployee');
                                                $qqq = $fff->row_array();

                                          ?>
                                            <!-- <td>  <?php echo $data->totalprice; ?>  </td> -->
                                           <td>  <?php echo $qqq['firstname_emp']?>   </td>
                                           <td>  <?php echo $qq['identity_card']; ?>  </td>
                                           <!-- <td>  <?php echo $data->address; ?>  </td> -->
                                           <td>  <?php echo $data->datecontract_start; ?>  </td>
                                           <td>  1 ปี  </td>
                                           <td>  <?php echo $data->datecontract_end; ?>  </td>
                                         <td>
                                        
                                            
                                       <a href="<?php echo base_url('Welcome/gee/'.$data->contract_id)?>">View in PDF</a> 
   
  </td>

   
                                            <td>
                                            	<a class="btn btn-danger btn-xs" href="<?php echo  base_url('contract/confrm/'.$data->contract_id); ?>" role="button"><i class="fa fa-fw fa-trash"></i> ลบข้อมูล</a>
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