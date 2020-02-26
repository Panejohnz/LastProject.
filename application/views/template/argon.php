<head>
<meta charset="utf-8">
<link rel="icon" type="image/png" href="<?php echo base_url(); ?>./assets/bluesky/images/goldd.png">
		<title>Rianthong</title>
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-default">
    <div class="container">
        <a class="navbar-brand" href="<?php echo site_url('BillController') ?>">หน้าแรก</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-default">
            <div class="navbar-collapse-header">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="javascript:void(0)">
                            <img src="../../assets/img/brand/blue.png">
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
            
            <ul class="navbar-nav ml-lg-auto">
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="#">
                        <i class="ni ni-favourite-28"></i>
                        <span class="nav-link-inner--text d-lg-none">Discover</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="#">
                        <i class="ni ni-notification-70"></i>
                        <span class="nav-link-inner--text d-lg-none">Profile</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ni ni-settings-gear-65"></i>
                        <span class="nav-link-inner--text d-lg-none">Settings</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
            
        </div>
    </div>
</nav> 

<?php $stringrow = base_url(uri_string());
            $arraystate = (explode("/", $stringrow));
            $idtestt = ($arraystate[6]); ?>
<?php $this->db->where('room_id', $idtestt);
$qq = $this->db->get('bill');
$result = $qq->row_array(); ?>
<table class="table">
    <thead>
        <tr>
        <th class="text-center">วันที่</th>
            <th class="text-center">เลขมิเตอร์ค่าไฟ</th>
            <th class="text-center">เลขมิเตอร์ค่าน้ำ</th>
            <th class="text-center">ค่าไฟ</th>
            <th class="text-center">ค่าน้ำ</th>
            <th class="text-center">ค่าห้อง</th>
            
        </tr>
    </thead>
    <tbody>

    <?php  foreach ($qq->result_array() as $data) { ?>
        <tr>
        <td class="text-center"><?php echo $data['date']; ?></td>
            <td class="text-center"><?php echo $data['electricbill']; ?>&nbsp; หน่วย</td>
            <td class="text-center"><?php echo $data['waterbill']; ?>&nbsp;หน่วย</td>
            <td class="text-center"><?php echo $data['electric_price']; ?>&nbsp;บาท</td>
            <td class="text-center"><?php echo $data['water_price']; ?>&nbsp;บาท</td>
            <td class="text-center"><?php echo $data['roomprice']; ?>&nbsp;บาท</td>
            
        </tr>
        
        
        

 <?php } ?>
    </tbody>
</table>











    <script src="<?php echo base_url(); ?>./assets2/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>./assets2/vendor/popper/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>./assets2/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>./assets2/vendor/headroom/headroom.min.js"></script>
  <!-- Argon JS -->
  <script src="<?php echo base_url(); ?>./assets2/js/argon.js?v=1.1.0"></script>
  
  <script src="<?php echo base_url('./assets2/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>
    </body>
</html>