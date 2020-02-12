<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            จัดการประเภทห้อง
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo  base_url('imgtype'); ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
            <li class="active">จัดการประเภทห้อง</li>
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
                            <a class="btn btn-success" href="<?php echo  base_url('imgtype/newdata'); ?>" role="button"><i class="fa fa-fw fa-plus-circle"></i> เพิ่มข้อมูล</a>
                            <a class="btn btn-default" href="<?php echo  base_url('imgtype'); ?>" role="button"><i class="fa fa-fw fa-refresh"></i> Refresh Data</a>
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
                                        <th class="sorting" tabindex="0"  rowspan="1" colspan="1" style="width: 50%;">ประเภท</th>
                                        <!-- <th class="sorting" tabindex="0"  rowspan="1" colspan="1" style="width: 50%;">รายละเอียด</th> -->
                                        <th class="sorting" tabindex="0"  rowspan="1" colspan="1" style="width: 30%;">ราคา</th>

                                        
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width:  30px;">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($results)){ foreach ($results as $data) { ?>
                                        <tr role="row">
                                            <td>
                                            <a href="<?php echo base_url('imgtype/edit/'.$data->roomcategory_id); ?>">
                                            <?php echo  $data->roomname; ?>
                                            </a> 
                                            <br>
                                           
                                            </td>
                                            <!-- <td>
                                            <?php echo  $data->detail; ?>
                                            </td> -->
                                             <!-- <td>
                                             <img src="./uploads/<?php echo $data->typeimg; ?>" width="100px">
                                              
                                            </td>  -->
                                            <td>
                                            <?php echo  $data->roomprice; ?>
                                            </td>
                                            <td>
                                            	<a class="btn btn-danger btn-xs" href="<?php echo  base_url('imgtype/confrm/'.$data->roomcategory_id); ?>" role="button"><i class="fa fa-fw fa-trash"></i> ลบข้อมูล</a>
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