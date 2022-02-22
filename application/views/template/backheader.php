<?php //print_r($_SESSION);?>
<!DOCTYPE html>
<html lang="en">
	<title>Rianthong</title>
<head>

<style>
	body {
    background: black url(https://lh3.googleusercontent.com/-8yGCBzF9F_s/XCHzZ5t7sJI/AAAAAAAAAlA/fnnU7Cma8UM9oE9ztOtlcqFs_aZiRI-aQCK8BGAs/s0/2018-12-25.jpg) center center no-repeat/cover;
}
/* customizable snowflake styling */
.snowflake {
  color: #000;
  font-size: 1em;
  font-family: Arial;
  text-shadow: 0 0 1px #000;
}

@-webkit-keyframes snowflakes-fall{0%{top:-10%}100%{top:100%}}@-webkit-keyframes snowflakes-shake{0%{-webkit-transform:translateX(0px);transform:translateX(0px)}50%{-webkit-transform:translateX(80px);transform:translateX(80px)}100%{-webkit-transform:translateX(0px);transform:translateX(0px)}}@keyframes snowflakes-fall{0%{top:-10%}100%{top:100%}}@keyframes snowflakes-shake{0%{transform:translateX(0px)}50%{transform:translateX(80px)}100%{transform:translateX(0px)}}.snowflake{position:fixed;top:-10%;z-index:9999;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;cursor:default;-webkit-animation-name:snowflakes-fall,snowflakes-shake;-webkit-animation-duration:10s,3s;-webkit-animation-timing-function:linear,ease-in-out;-webkit-animation-iteration-count:infinite,infinite;-webkit-animation-play-state:running,running;animation-name:snowflakes-fall,snowflakes-shake;animation-duration:10s,3s;animation-timing-function:linear,ease-in-out;animation-iteration-count:infinite,infinite;animation-play-state:running,running}.snowflake:nth-of-type(0){left:1%;-webkit-animation-delay:0s,0s;animation-delay:0s,0s}.snowflake:nth-of-type(1){left:10%;-webkit-animation-delay:1s,1s;animation-delay:1s,1s}.snowflake:nth-of-type(2){left:20%;-webkit-animation-delay:6s,.5s;animation-delay:6s,.5s}.snowflake:nth-of-type(3){left:30%;-webkit-animation-delay:4s,2s;animation-delay:4s,2s}.snowflake:nth-of-type(4){left:40%;-webkit-animation-delay:2s,2s;animation-delay:2s,2s}.snowflake:nth-of-type(5){left:50%;-webkit-animation-delay:8s,3s;animation-delay:8s,3s}.snowflake:nth-of-type(6){left:60%;-webkit-animation-delay:6s,2s;animation-delay:6s,2s}.snowflake:nth-of-type(7){left:70%;-webkit-animation-delay:2.5s,1s;animation-delay:2.5s,1s}.snowflake:nth-of-type(8){left:80%;-webkit-animation-delay:1s,0s;animation-delay:1s,0s}.snowflake:nth-of-type(9){left:90%;-webkit-animation-delay:3s,1.5s;animation-delay:3s,1.5s}
/* Demo Purpose Only*/
.demo {
  font-family: 'Raleway', sans-serif;
	color:#fff;
    display: block;
    margin: 0 auto;
    padding: 15px 0;
    text-align: center;
}
.demo a{
  font-family: 'Raleway', sans-serif;
color: #000;		
}
.hee {
  background-color: #555;
  color: white;
  text-decoration: none;
  padding: 15px 26px;
  position: relative;
  display: inline-block;
  border-radius: 2px;
}

.hee:hover {
  background: red;
}

.hee .badge {
  position: absolute;
  top: -10px;
  right: -10px;
  padding: 5px 10px;
  border-radius: 50%;
  background-color: red;
  color: white;
}
</style>
	<meta charset="utf-8">
	<title>
		
	</title>
	<!-- tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>./assets/bluesky/images/goldd.png">
	<!-- bootstrap 3.3.4-->
	
	
	<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
	
  <link type="text/css" href="<?php echo base_url(); ?>./assets/css/argon.css?v=1.1.0" rel="stylesheet">
	<link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>./bootstrap/css/bootstrap.min.css">
	<link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>./bootstrap/css/font-awesome.min.css">
	<link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>./bootstrap/css/ionicons.min.css">
	<link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>./dist/css/AdminLTE.min.css">
	<link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>./dist/css/skins/skin-blue.min.css">
	<link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>./plugins/datatables/dataTables.bootstrap.css">
	<link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>./dist/css/mycustom.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>./assets/deluxe/css/bootstrap-datepicker.css">
	<script src="<?php echo base_url('./assets/deluxe/js/bootstrap-datepicker.js')?>"></script>
	<script src="<?php echo base_url(); ?>./plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript">
	</script>
	<script src="<?php echo base_url(); ?>./bootstrap/js/bootstrap.min.js" type="text/javascript">
	</script>
	<script src="<?php echo base_url(); ?>./dist/js/app.min.js" type="text/javascript">
	</script>
	
	
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">
<!-- Main Header -->
<header class="main-header">

<div class="snowflakes" aria-hidden="true">
  <!-- <div class="snowflake">
  ❅
  </div>
  <div class="snowflake">
  ❅
  </div>
  <div class="snowflake">
  ❆
  </div>
  <div class="snowflake">
  ❄
  </div>
  <div class="snowflake">
  ❅
  </div>
  <div class="snowflake">
  ❆
  </div>
  <div class="snowflake">
  ❄
  </div>
  <div class="snowflake">
  ❅
  </div>
  <div class="snowflake">
  ❆
  </div>
  <div class="snowflake">
  ❄
  </div> -->
  <!--  -->
  <!-- <div class="snowflake">
  ไม่ดรอป
  </div>
  <div class="snowflake">
  จบปีนี้
  </div>
  <div class="snowflake">
  ไม่ดรอป
  </div>
  <div class="snowflake">
  จบปีนี้
  </div>
  <div class="snowflake">
  ไม่ดรอป
  </div>
  <div class="snowflake">
  จบปีนี้
  </div>
  <div class="snowflake">
  ไม่ดรอป
  </div>
  <div class="snowflake">
  จบปีนี้
  </div>
  <div class="snowflake">
  ไม่ดรอป
  </div>
  <div class="snowflake">
  จบปีนี้
  </div> -->
</div>
	<!-- Logo -->
	<a href="<?php base_url(); ?>" class="logo">
		<!-- mini logo for sidebar mini 50x50 pixels -->
		<span class="logo-mini">
			<b>
				R
			</b>AM
		</span>
		<!-- logo for regular state and mobile devices -->
		<span class="logo-lg">
			<b>
			Rianthong <?php echo $this->session->userdata('firstname_emp');?>
			</b>
		</span>
	</a>


	<!-- Header Navbar -->
	<nav class="navbar navbar-static-top" role="navigation">
		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">
				Toggle navigation
			</span>
		</a>
		<!-- Navbar Right Menu -->
		
		

	</nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">

		<!-- Sidebar user panel (optional) -->
		

		<!-- search form (Optional) -->
	
		<!-- /.search form -->

		<!-- Sidebar Menu -->
		<ul class="sidebar-menu">
			
			<!-- Optionally, you can add icons to the links -->
			
			<li class="<?php echo base_url('Member'); ?>">
	<a  href="<?php echo base_url('Member'); ?>">
					<i class="fa fa-link">
					</i>
					<span>
						- จัดการสมาชิก
					</span>
				</a>
			</li>
			<li class="<?php echo base_url('Admin'); ?>">
				<a <?php if($this->session->userdata('statusem') != 1) { ?> style="display: none;" <?php } ?> href="<?php echo base_url('Admin'); ?>">
					<i class="fa fa-link">
					</i>
					<span>
						- จัดการพนักงาน
					</span>
				</a>
			</li>
			<li class="<?php echo base_url('Imgtype'); ?>">
				<a href="<?php echo base_url('Imgtype'); ?>">
					<i class="fa fa-link">
					</i>
					<span>
						- จัดการประเภทห้อง
					</span>
				</a>
			</li>
			<li class="<?php echo base_url('Room'); ?>">
				<a href="<?php echo base_url('Room'); ?>">
					<i class="fa fa-link">
					</i>
					<span>
						- ห้องพัก
					</span>
				</a>
			</li>
			<li class="<?php echo base_url('FurnitureController'); ?>">
				<a href="<?php echo base_url('FurnitureController'); ?>">
					<i class="fa fa-link">
					</i>
					<span>
						- เฟอร์นิเจอร์
					</span>
				</a>
			</li>
			<li class="<?php echo base_url('Watercontroller'); ?>">
				<a href="<?php echo base_url('Watercontroller'); ?>">
					<i class="fa fa-link">
					<span class="badge"></span>
					</i>
					<span>
						- จัดการค่าน้ำ-ค่าไฟ
					</span>
				</a>
			</li>
		
			<li class="<?php echo base_url('Reservationadmin'); ?>">
				<a href="<?php echo base_url('Reservationadmin'); ?>">
					<i class="fa fa-link">
					</i>
					<span>
						- รายการจองห้องพัก
					</span>
				</a>
			</li>
			<li class="<?php echo base_url('Contract'); ?>">
				<a href="<?php echo base_url('Contract'); ?>">
					<i class="fa fa-link">
					</i>
					<span>
						- สัญญาเช่า
					</span>
				</a>
			</li>
			
			<li class="<?php echo base_url('BillController'); ?>">
				<a href="<?php echo base_url('BillController'); ?>">
					<i class="fa fa-link">
					</i>
					<span >
						- ค่าน้ำ ค่าไฟ
					</span>
				</a>
			</li>
			<li class="<?php echo base_url('WalkinController'); ?>">
				<a href="<?php echo base_url('WalkinController'); ?>">
					<i class="fa fa-link">
					</i>
					<span >
						- Walk IN
					</span>
				</a>
			</li>
			<li class="<?php echo base_url('Payment'); ?>">
				<a href="<?php echo base_url('Payment'); ?>">
					<i class="fa fa-link">
					</i>
					<span >
						- ชำระเงิน
					</span>
				</a>
			</li>
			<li class="<?php echo base_url('Repair'); ?>">
				<a href="<?php echo base_url('Repair'); ?>">
					<i class="fa fa-link">
					</i>
					<span>
						- รายการแจ้งซ่อม
					</span>
				</a>
			</li>
			<li class="<?php echo base_url('ComplainController'); ?>">
				<a href="<?php echo base_url('ComplainController'); ?>">
					<i class="fa fa-link">
					</i>
					<span>
						- ร้องเรียน
					</span>
				</a>
			</li>
			<li class="<?php echo base_url('MoveroomController'); ?>">
				<a href="<?php echo base_url('MoveroomController'); ?>">
					<i class="fa fa-link">
					</i>
					<span>
						- แจ้งย้ายห้อง
					</span>
				</a>
			</li>
			<li class="<?php echo base_url('CheckoutController'); ?>">
				<a href="<?php echo base_url('CheckoutController'); ?>">
					<i class="fa fa-link">
					</i>
					<span>
						- ตรวจสอบออกห้องพัก
					</span>
				</a>
			</li>
			<li>
				<a href="<?php echo  base_url('LoginController/logout'); ?>">
					<i class="fa fa-link">
					</i>
					<span>
						- ออกจากระบบ
					</span>
				</a>
			</li>

				
		</ul><!-- /.sidebar-menu -->
	</section>
	<!-- /.sidebar -->
</aside>