<?php //print_r($_SESSION);?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>
		
	</title>
	<!-- tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- bootstrap 3.3.4-->
	<link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>../bootstrap/css/bootstrap.min.css">
	<!-- font awesome icons-->
	<link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>../bootstrap/css/font-awesome.min.css">
	<!-- ionicons-->
	<link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>../bootstrap/css/ionicons.min.css">
	<!--Theme style-->
	<link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>../dist/css/AdminLTE.min.css">
	<link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>../dist/css/skins/skin-blue.min.css">
	<link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>../plugins/datatables/dataTables.bootstrap.css">
	<link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>../dist/css/mycustom.css">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!-- REQUIRED JS SCRIPTS -->

	<!-- jQuery 2.1.4 -->
	<script src="<?php echo base_url(); ?>../plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript">
	</script>
	<!-- Bootstrap 3.3.2 JS -->
	<script src="<?php echo base_url(); ?>../bootstrap/js/bootstrap.min.js" type="text/javascript">
	</script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url(); ?>../dist/js/app.min.js" type="text/javascript">
	</script>
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">
<!-- Main Header -->
<header class="main-header">

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
			Rianthong
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
			
			<li class="<?php echo base_url('member'); ?>">
				<a href="<?php echo base_url('member'); ?>">
					<i class="fa fa-link">
					</i>
					<span>
						- จัดการสมาชิก
					</span>
				</a>
			</li>
			<li class="<?php echo base_url('imgtype'); ?>">
				<a href="<?php echo base_url('imgtype'); ?>">
					<i class="fa fa-link">
					</i>
					<span>
						- จัดการประเภทห้อง
					</span>
				</a>
			</li>

				
		</ul><!-- /.sidebar-menu -->
	</section>
	<!-- /.sidebar -->
</aside>