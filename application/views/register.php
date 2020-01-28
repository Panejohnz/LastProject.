<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>RegistrationForm_v10 by Colorlib</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- LINEARICONS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>./assets/colorlib-regform-26/fonts/linearicons/style.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>./assets/colorlib-regform-26/css/style.css">
	</head>

	<body>

		<div class="wrapper">
			<div class="inner">
				<img src="<?php echo base_url(); ?>./assets/colorlib-regform-26/images/image-1.png" alt="" class="image-1">
				<form method="post" action="<?php echo base_url(); ?>RegisController/Register">
					<h3>New Account?</h3>
					<div class="form-holder">
						<span class="lnr lnr-user"></span>
						<input type="text" class="form-control" placeholder="Firstname" name="firstname" id="firstname">
					</div>
					<div class="form-holder">
						<span class="lnr lnr-user"></span>
						<input type="text" class="form-control" placeholder="Lastname" name="lastname">
					</div>
					<div class="form-holder">
						<span class="lnr lnr-user"></span>
						<input type="text" class="form-control" placeholder="Username" name="username" id="username">
						
					</div>
					<span id="username_result"></span> 
					<div class="form-holder">
						<span class="lnr lnr-phone-handset"></span>
						<input type="text" class="form-control" placeholder="Phone Number" name="tel">
					</div>
					<div class="form-holder">
						<span class="lnr lnr-envelope"></span>
						<input type="text" class="form-control" placeholder="Mail" name="email" id="email">
					
					</div>
					<span id="email_result"></span>  
					<span id="email_result"></span>  
					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						<input type="password" class="form-control" placeholder="Password" name="password">
					</div>
					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						<input type="password" class="form-control" placeholder="Confirm Password">
					</div>
					
					<button  type="submit" name="register" class="btn">
						<span>Register</span>
					</button>
				</form>
				<img src="<?php echo base_url(); ?>./assets/colorlib-regform-26/images/image-2.png" alt="" class="image-2">
			</div>
			
		</div>
		
		<script src="<?php echo base_url(); ?>./assets/colorlib-regform-26/js/jquery-3.3.1.min.js"></script>
		<script src="<?php echo base_url(); ?>./assets/colorlib-regform-26/js/main.js"></script>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
<script>  
 $(document).ready(function(){  
      $('#email').change(function(){  
           var email = $('#email').val();  
           if(email != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>RegisController/checkmail",  
                     method:"POST",  
                     data:{email:email},  
                     success:function(data){  
                          $('#email_result').html(data);  
                     }  
                });  
           }  
      });  
 });  
 $(document).ready(function(){  
      $('#username').change(function(){  
           var username = $('#username').val();  
           if(username != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>RegisController/checkusername",  
                     method:"POST",  
                     data:{username:username},  
                     success:function(data){  
                          $('#username_result').html(data);  
                     }  
                });  
           }  
      });  
 });  
 </script>  