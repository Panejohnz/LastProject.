<!DOCTYPE html>
<html lang="en">
<title>Rianthong</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>./assets/bluesky/images/goldd.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from https://bootdey.com  -->
    <!--  All snippets are MIT license https://bootdey.com/license -->
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    	body{
    margin-top:20px;
    background-color: #f4f7f6;
}
.c_review {
    margin-bottom: 0
}

.c_review li {
    margin-bottom: 16px;
    padding-bottom: 13px;
    border-bottom: 1px solid #e8e8e8
}

.c_review li:last-child {
    margin: 0;
    border: none
}

.c_review .avatar {
    float: left;
    width: 80px
}

.c_review .comment-action {
    float: left;
    width: calc(100% - 80px)
}

.c_review .comment-action .c_name {
    margin: 0
}

.c_review .comment-action p {
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    max-width: 95%;
    display: block
}

.product_item:hover .cp_img {
    top: -40px
}

.product_item:hover .cp_img img {
    box-shadow: 0 19px 38px rgba(0, 0, 0, 0.3), 0 15px 12px rgba(0, 0, 0, 0.22)
}

.product_item:hover .cp_img .hover {
    display: block
}

.product_item .cp_img {
    position: absolute;
    top: 0px;
    left: 50%;
    transform: translate(-50%);
    -webkit-transform: translate(-50%);
    -ms-transform: translate(-50%);
    -moz-transform: translate(-50%);
    -o-transform: translate(-50%);
    -khtml-transform: translate(-50%);
    width: 100%;
    padding: 15px;
    transition: all 0.2s ease-in-out
}

.product_item .cp_img img {
    transition: all 0.2s ease-in-out;
    border-radius: 6px
}

.product_item .cp_img .hover {
    display: none;
    text-align: center;
    margin-top: 10px
}

.product_item .product_details {
    padding-top: 110%;
    text-align: center
}

.product_item .product_details h5 {
    margin-bottom: 5px
}

.product_item .product_details h5 a {
    font-size: 16px;
    color: #444
}

.product_item .product_details h5 a:hover {
    text-decoration: none
}

.product_item .product_details .product_price {
    margin: 0
}

.product_item .product_details .product_price li {
    display: inline-block;
    padding: 0 10px
}

.product_item .product_details .product_price .new_price {
    font-weight: 600;
    color: #ff4136
}

.product_item_list table tr td {
    vertical-align: middle
}

.product_item_list table tr td h5 {
    font-size: 15px;
    margin: 0
}

.product_item_list table tr td .btn {
    box-shadow: none !important
}

.product-order-list table tr th:last-child {
    width: 145px
}

.preview {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column
}

.preview .preview-pic {
    -webkit-box-flex: 1;
    -webkit-flex-grow: 1;
    -ms-flex-positive: 1;
    flex-grow: 1
}

.preview .preview-thumbnail.nav-tabs {
    margin-top: 15px;
    font-size: 0
}

.preview .preview-thumbnail.nav-tabs li {
    width: 20%;
    display: inline-block
}

.preview .preview-thumbnail.nav-tabs li nav-link img {
    max-width: 100%;
    display: block
}

.preview .preview-thumbnail.nav-tabs li a {
    padding: 0;
    margin: 2px;
    border-radius: 0 !important;
    border-top: none !important;
    border-left: none !important;
    border-right: none !important
}

.preview .preview-thumbnail.nav-tabs li:last-of-type {
    margin-right: 0
}

.preview .tab-content {
    overflow: hidden
}

.preview .tab-content img {
    width: 100%;
    -webkit-animation-name: opacity;
    animation-name: opacity;
    -webkit-animation-duration: .3s;
    animation-duration: .3s
}

.details {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column
}

.details .rating .stars {
    display: inline-block
}

.details .sizes .size {
    margin-right: 10px
}

.details .sizes .size:first-of-type {
    margin-left: 40px
}

.details .colors .color {
    display: inline-block;
    vertical-align: middle;
    margin-right: 10px;
    height: 2em;
    width: 2em;
    border-radius: 2px
}

.details .colors .color:first-of-type {
    margin-left: 20px
}

.details .colors .not-available {
    text-align: center;
    line-height: 2em
}

.details .colors .not-available:before {
    font-family: Material-Design-Iconic-Font;
    content: "\f136";
    color: #fff
}

@media screen and (max-width: 996px) {
    .preview {
        margin-bottom: 20px
    }
}

@-webkit-keyframes opacity {
    0% {
        opacity: 0;
        -webkit-transform: scale(3);
        transform: scale(3)
    }
    100% {
        opacity: 1;
        -webkit-transform: scale(1);
        transform: scale(1)
    }
}

@keyframes opacity {
    0% {
        opacity: 0;
        -webkit-transform: scale(3);
        transform: scale(3)
    }
    100% {
        opacity: 1;
        -webkit-transform: scale(1);
        transform: scale(1)
    }
}

.cart-page .cart-table tr th:last-child {
    width: 145px
}

.cart-table .quantity-grp {
    width: 120px
}

.cart-table .quantity-grp .input-group {
    margin-bottom: 0
}

.cart-table .quantity-grp .input-group-addon {
    padding: 0 !important;
    text-align: center;
    background-color: #1ab1e3
}

.cart-table .quantity-grp .input-group-addon a {
    display: block;
    padding: 8px 10px 10px;
    color: #fff
}

.cart-table .quantity-grp .input-group-addon a i {
    vertical-align: middle
}

.cart-table .quantity-grp .form-control {
    background-color: #fff
}

.cart-table .quantity-grp .form-control+.input-group-addon {
    background-color: #1ab1e3
}

.ec-checkout .wizard .content .form-group .btn-group.bootstrap-select.form-control {
    padding: 0
}

.ec-checkout .wizard .content .form-group .btn-group.bootstrap-select.form-control .btn-round.btn-simple {
    padding-top: 12px;
    padding-bottom: 12px
}

.ec-checkout .wizard .content ul.card-type {
    font-size: 0
}

.ec-checkout .wizard .content ul.card-type li {
    display: inline-block;
    margin-right: 10px
}

.card {
    background: #fff;
    margin-bottom: 30px;
    transition: .5s;
    border: 0;
    border-radius: .55rem;
    position: relative;
    width: 100%;
    box-shadow: 0 1px 2px 0 rgba(0,0,0,0.1);
}

.card .body {
    font-size: 14px;
    color: #424242;
    padding: 20px;
    font-weight: 400;
}
    </style>

    <!-- Fonts -->
	 <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
  <!-- Icons -->
  <link href="<?php echo base_url(); ?>./assets2/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>./assets2/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="<?php echo base_url(); ?>./assets2/css/argon.css?v=1.1.0" rel="stylesheet">
</head>
<html>
<body>
    
        
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">



<nav class="navbar navbar-expand-lg navbar-dark bg-default">
    <div class="container">
        <a class="navbar-brand" href="<?php echo site_url('ReservationsController') ?>">Back</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-default">
            <div class="navbar-collapse-header">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="index.html">
                            <img src="assets/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>

           

        </div>
    </div>
</nav>

<div class="container">
    <div class="row clearfix">

<?php $this->db->select('room.*');
                            $this->db->from('room');
                            $query = $this->db->get();
                            $results = $query->result_array();?>
						<?php	foreach ($results as $data) {
                                ?>
        <div class="col-lg-3 col-md-4 col-sm-12">
            <div class="card product_item" id="exampleModal">
                <div class="body">
                    <div class="cp_img">    
                        <img src="<?php echo base_url('./assets/69524.png')?>" alt="Room" class="img-fluid">
                        
                    </div>
                    <div class="product_details" >
                        <h2><?php echo  $data['roomnum']; ?></a></h2>
                        <h5><?php echo  $data['roomcate']; ?></h5>
                        <ul class="product_price list-unstyled">
                        <h4> <li class="new_price"><?php echo  $data['roomprice']; ?>฿</li></h4>
                        <td>  
                                            <?php //สถานะ
                                            
                                             $status = $data['roomstatus'];
                                             if ($status == 1) {
                                                 ?>
                                                <a href="RoomController/update_status?sid=<?php echo $data['id']; ?>&sval=<?php echo $data['roomstatus']; ?>" class="btn btn-success">ชำระเงินเรียบร้อยแล้ว</a>
                                                
                                             <?php
                                                
                                             } else {
                                                 ?>
                                                 <a href="RoomController/update_status?sid=<?php echo $data['id']; ?>&sval=<?php echo $data['roomstatus']; ?>" class="btn btn-danger">รอการชำระเงิน</a>
                                                
                                           <?php
                                           print_r($status);
                                             }
                                            ?>
                                            </td>
                        <button class="btn btn-primary view_detail" relid="<?php echo $data['id']; ?>" <?php if($data['roomstatus'] != 0 ) {  ?> disabled <?php }?>>Detail</button>
                        <!-- Modal -->
                        <div id="show_modal" class="modal fade" role="dialog" style="background: #000;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"><i class="fa fa-folder" ></i> Details</h3>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-striped">
          <thead class="btn-primary">
            <tr>
              <td>Number Room</th>
              <td>Categetory</th>
              <td>Price</th>
            </tr>
          </thead>
          <tbody>
             
            <tr>
              <td><p id="roomnum"></p></td> 
              <td><p id="roomcate"></p></td>
              <td><p id="roomprice"></p></td>
            </tr>
                
          </tbody>
       </table>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-success" onclick="location.href='<?php echo base_url();?>Bookaroom'"><i class="spaceship"></i> จอง</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> ปิด</button>
      </div>
    </div>
  </div>
</div>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        
  
<?php
                            } ?>
   </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {

      $('.view_detail').click(function(){
          
          var id = $(this).attr('relid'); //get the attribute value
          
          $.ajax({
              url : "<?php echo base_url(); ?>RoomController/get_room",
              data:{id : id},
              method:'GET',
              dataType:'json',
              success:function(response) {
                $('#roomnum').html(response.roomnum); //hold the response in id and show on popup
                $('#roomcate').html(response.roomcate);
                $('#roomprice').html(response.roomprice);
                $('#show_modal').modal({backdrop: 'static', keyboard: true, show: true});
            }
          });
      });
    });
</script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript"></script>
 <script src="<?php echo base_url(); ?>../assets2/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>../assets2/vendor/popper/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>../assets2/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>../assets2/vendor/headroom/headroom.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <!-- Argon JS -->
  <script src="<?php echo base_url(); ?>./assets2/js/argon.js?v=1.1.0"></script>
  <!--Datepicker -->
  <script src="<?php echo base_url('./assets2/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>
</body>
</html>