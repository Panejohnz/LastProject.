<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ตรวจสอบออกห้องพัก
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo  base_url('payment'); ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
            <li class="active">ตรวจสอบออกห้องพัก</li>
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
                        
                            <a class="btn btn-default" href="<?php echo  base_url('payment'); ?>" role="button"><i class="fa fa-fw fa-refresh"></i> Refresh Data</a>
                        </div>
                       
                        <div class="col-sm-6">
                            <div id="" class="dataTables_filter">
                          
                            <!-- <form action="<?php echo base_url('CheckoutController/savecheckhout/'.$data->contract_id); ?>" method="GET" name="search"> -->
                            	<label>ค้นหา</label>:<input type="search" name="keyword" class="form-control input-sm" placeholder="ค้นหา"></label>
                            </form>
                            </div>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row">
                                        <!-- <th class="sorting" tabindex="0"  rowspan="1" colspan="1">ID</th> -->
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width:  80px;">วันที่ออก</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width:  80px;">ชื่อลูกค้า</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width:  80px;">ห้อง</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width:  150px;" >ราคาเงินประกัน</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width:  150px;" >เงินค่าเสียหาย</th>
                                        
                                         
                                        <?php $query = $this->db->query("SELECT * FROM contract 
                                
                               
                                JOIN users ON users.user_id = contract.user_id
                                JOIN room ON room.room_id = contract.room_id
                                JOIN  emmployee ON emmployee.employee_id = contract.employee_id
                                WHERE contract.is_checkout = 2");
                                            ?>
                                           
<?php  foreach ($query->result() as $data) {  ?>
                                        
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width:  60px;">&nbsp;</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width:  60px;">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <form role="form" method='post' action="<?php echo base_url('CheckoutController/savecheckhout/') ?>"  >
                                        
                                         <td>
                                         <?php echo  $data->date_out;  ?>
                                         </td>
                                           
                                           <td>
                                           <?php echo  $data->firstname; ?>
                                    </td>
                                    <td>
                                           <?php echo  $data->roomnum; ?>
                                    </td>
                                    <td>
                                    <?php echo  $data->insurance; ?>
                                    </td>


                                    <td>
                                   
                                    <input  max="<?php echo  $data->insurance?>" value="" required type="text" name="electricnew" id="electricnew" style="width:80%">
                                    <input type="hidden" name="contract_id" value="<?php echo  $data->contract_id ?>">      
                                </td>

                                    
                                 
                                                      
                                           
                                            
                                            <td>
                                            <button name="submit" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-save"></i> บันทึกข้อมูล</button>
                                            
                                        </td>

                                        <td>
                                                <?php $datee =  $data->date_out; 
                                                      $dateend = date('Y-m-d', strtotime($datee));
                                                     
                                                      $datest = date('Y-m-d');
                                                
                                                      ?>

                                                <?php if($datest >= $dateend){
                                                    echo "เคลียร์ประกันได้แล้ว";
                                                }
                                                else{
                                                    echo "รอตรวจสอบ";
                                                } ?>
                                            </td>
                                            </form>
                                        </tr>
                                        <?php } ?>
                                </tbody>
                           
                            </table>
                        </div>
                    </div>
                    <div class="row">
                      
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
