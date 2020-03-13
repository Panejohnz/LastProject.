<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ค่าน้ำค่าไฟ
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo  base_url('BillController'); ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
            <li class="active">ค่าน้ำค่าไฟ</li>
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
                           
                            <a class="btn btn-default" href="<?php echo  base_url('BillController'); ?>" role="button"><i class="fa fa-fw fa-refresh"></i> Refresh Data</a>
                        </div>
                        <div class="col-sm-6">
                            <div id="" class="dataTables_filter">
                            <?php $this->db->where('room_id');
                                        $qq = $this->db->get('room');
                                        $qqq = $qq->row_array();
                                         ?>
                            
                            	<label>ค้นหา</label>:<input type="search" name="keyword" class="form-control input-sm" placeholder="ค้นหาชื่อหมวดหมู่"></label>
                            </form>
                            </div>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row"><?php $status = $qqq['roomstatus']; ?>
                                        <th class="sorting" tabindex="0"  rowspan="1" colspan="1" style="width: 10%;" >เลขห้อง</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 30%;">ค่าไฟ</th>
                                        <th class="sorting" tabindex="0"  rowspan="1" colspan="1" style="width: 30%;">ค่าน้ำ</th>
                                        <th class="sorting" tabindex="0"  rowspan="1" colspan="1" style="width: 5%;"></th>
                                       
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php if (!empty($results)) {
                                             foreach ($results as $data) { ?>
                                <?php $status = $data->roomstatus ?>
                                <form role="form" method='post' action="<?php echo base_url('BillController/cal/') ?>"  >
                                        <tr role="row" <?php if ($status == 0) { ?> style="display:none" <?php } ?>>
                                            <td>
                                            <a href="<?php echo base_url('BillController/edit/'.$data->room_id); ?>" >
                                            <?php echo  $data->roomnum;  ?>
                                            
                                            </a> 
                                            <br>
                                            
                                            </td>
                                          <td>
                                                เลขมิเตอร์ไฟ
                                                 <input <?php if(date('d') != 25){ ?> disabled <?php } ?> required type="input" name="electricnew" id="electricnew" class="form-control input-sm" style="width:30%">
                                                  <input type="hidden" name="room_id" value="<?php echo  $data->room_id ?>">
                                            
                                        <!-- จำนวนเงิน :  <span id="resulte"></span>
                                            <script>$(document).ready(function(){
    $('#electricnew').keyup(function(){
        $('#resulte').text($('#electricnew').val() * 7);
    });   
});</script> -->
                                            </td>
                                            <td>
                                            เลขมิเตอร์น้ำ <input <?php if(date('d') != 25){ ?> disabled <?php } ?> type="text" name="waternew" id="waternew" class="form-control input-sm" style="width:30%"> 
                                           
                                            <br>
                                           
                                            <td><button  class="btn btn-primary" type="submit"><i class="fa fa-fw fa-save"></i> บันทึกข้อมูล</button></td>
                                            </form>  <!-- จำนวนเงิน :  <span id="resultw"></span>
                                            <script>$(document).ready(function(){
    $('#waternew').keyup(function(){
        $('#resultw').text($('#waternew').val() * 7);
    });   
});</script> -->
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
                            <div class="dataTables_info" id="example1_info" role="status" aria-live="polite"></div>
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
