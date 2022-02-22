<div class="content-wrapper">
    <?php $stringrow = base_url(uri_string());
            $arraystate = (explode("/", $stringrow));
            $idtestt = ($arraystate[5]);
            // $idtestt1 = ($arraystate[6]);
            // $idtestt2 = ($arraystate[7]);
            
           // $idtest1 = ($arraystate[8]);
            //$idtest2 = ($arraystate[9]); ?>
    <!-- Content Header (Page header) -->
            <!-- form start -->
            <?php $this->db->select('*');
            $this->db->from('room');
            $this->db->join('roomcategory','roomcategory.roomcategory_id = room.roomcategory_id');
             $this->db->where('room_id', $idtestt);
       $query = $this->db->get();
         $qq = $query->row_array(); ?>
           <section class="content">
            <div class="container"><br>
            <?php $query1 = $this->db->query("SELECT * FROM `users` ORDER BY `users`.`user_id` DESC");
                                // $this->db->from('users');
                                // $query1 = $this->db->get();
                                $results = $query1->result_array();?>
            <form role="form" action="<?php echo base_url('Bookaroom/postdatawalkin/'.$idtestt); ?>" id="kuay" method="post" enctype="multipart/form-data">
           
            <div class="box-body">
            <div class="form-group">
                
                        <label for="exampleInputEmail1">เลขห้อง <?php echo $this->session->flashdata('error_roomnum'); ?>
                        <input readonly type="hidden" id="roomnum" class="form-control" name="roomnum"   value="<?php echo $idtestt ?>"> <?php echo $qq['roomnum'] ?> </input>
                    </div>
            
                    <?php //$this->db->where('user_id', $idtestt1);
                         //  $query1 = $this->db->get('users');
                          // $query11 = $query1->row_array();
                     ?>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">ชื่อ-นามสกุล</label> <?php echo $this->session->flashdata('error_name'); ?>
                       
                        <select name="Hee" id="roomname" class="form-control">
									
                                   
                            <?php	foreach ($results as $result) {
                                    ?>
                                                
                                                <h1><option value="<?php echo $result['user_id']?>"> 
                                                <?php echo $result['firstname'] . '  '?> <?php echo $result['lastname']?>
                                    </option>
                                                <?php 
                                } ?>
                                            </select>

                    </div>
                    <!-- ราคาห้อง  <?php echo $qq['roomprice'] ?><br> -->
                    
    
                  
                    <label for="exampleInputEmail1">เลือกเฟอร์นิเจอร์เพิ่มเติม</label>
                    
                    <?php $this->db->select('furniture.*');
                   $this->db->from('furniture');

                   $query1 = $this->db->get();
                   $results = $query1->result_array();?>
                   	<?php	foreach ($results as $result) {
                       ?>
                   
                    <div style="display:flex;" <?php if($result['stock'] == 0) {?> style="display:none" <?php } ?>>

                    <!-- <div class="custom-control custom-checkbox mb-3" > -->
                       <input type="checkbox"  name="customCheck1[]"  <?php if($result['stock'] == 0) {?> disabled <?php } ?> onclick="heegrace()" value="<?php echo $result['furniture_id']; ?>" >  <?php if($result['stock'] == 0){ echo $result['name'].' (หมด)' ?> <?php } else { echo $result['name'];} ?>  (<?php echo $result['price']; ?>) 
                      
                    
                    <!-- <label class="custom-control-label" for="customCheck1"><?php echo $result['name']; ?></label> --> 
                    </div> 
                    
                                    
                       <?php
                   } ?>
                   <br>

                   
                   
                   <p id="Heeee">ราคาห้อง &nbsp;<?php echo $qq['roomprice']; ?></p>
                   <input type="hidden" name="hee" id="hee" value="<?php echo $qq['roomprice']; ?>">
                   
                 
                        
                <div>
                    <button <?php if($qq['roomstatus'] != 1){ ?> disabled <?php } ?> class="btn btn-success" name="submit"  type="submit"><i class="fa fa-fw fa-save"></i> บันทึกข้อมูล</button>
                    <a class="btn btn-danger" href="<?php echo  base_url('WalkinController'); ?>" role="button"><i class="fa fa-fw fa-close"></i> ยกเลิก</a>
                </div>
                <!-- //onclick="myFunction()" -->
            </form>
            </div> 
                </div>
            </div><!-- /.box-body -->
        </div>
    </section><!-- /.content -->
                </div>

            <script src="<?php echo base_url(); ?>./assets2/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>./assets2/vendor/popper/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>./assets2/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>./assets2/vendor/headroom/headroom.min.js"></script>
  <!-- Argon JS -->
  <script src="<?php echo base_url(); ?>./assets2/js/argon.js?v=1.1.0"></script>
  <!--Datepicker -->
  <script src="<?php echo base_url('./assets2/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>
<script>
    function heegrace()
    {
        console.log("hi");
        $.post("<?php echo base_url("kidmaiook/HeeEGrace") ?>", $("#kuay").serialize(),
            function (data) {
                $("#Heeee").html("ราคาห้อง " + data)
            },
        );
    }
</script>
  

<!-- <script>
    var total = 0;
    var id = <?php echo $room_id ?>;
        console.log(<?php echo $room_id ?>);

    $("#customCheck1").change(function(){
        if(this.value =='13'){
        $.get("<?=base_url('Bookaroom/selectfur/')?>"+id,
        function(data){
            var go = data;
            var tot = go;
            $("#total").text(tot)
            console.log(tot)
        }
        );
        }
        else if(this.value =='15'){
            $.get("<?=base_url('Bookaroom/selectfur2/')?>"+id,
        function(data){
            var go = data;
            var tot = go;
            $("#total").text(tot)
            console.log(tot)
        }
        );

        }else if(this.value =='16'){
            $.get("<?=base_url('Bookaroom/selectfur3/')?>"+id,
        function(data){
            var go = data;
            var tot = go;
            $("#total").text(tot)
            console.log(tot)
        }
        );
        }else if(this.value =='17'){
            $.get("<?=base_url('Bookaroom/selectfur4/')?>"+id,
        function(data){
            var go = data;
            var tot = go;
            $("#total").text(tot)
            console.log(tot)
        }
        );
        }
    });
    
</script> -->

><!-- /.content-wrapper -->
 