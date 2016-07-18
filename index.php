<?php
//include config
require_once('../ArtGlom/includes/config.php');
if( $user->is_logged_in() ){ header('Location: admin.php'); }
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Art-Glom</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
	  <link rel="stylesheet" type="text/css" href="css/demo.css" />
	  <link rel="stylesheet" type="text/css" href="css/style1.css" />
	  <script type="text/javascript" src="js/modernizr.custom.86080.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs.php5shiv/3.7.0.php5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body id="page">
  <ul class="cb-slideshow">
	  <li><span>Image 07</span><div></li>
	  <li><span>Image 02</span><div><h3>Creative</h3></div></li>
	  <li><span>Image 03</span><div><h3>Magic</h3></div></li>
	  <li><span>Image 04</span><div><h3>Be Star </h3></div></li>
	  <li><span>Image 05</span><div><h3>Feel </h3></div></li>
	  <li><span>Image 06</span><div><h3>Awesome</h3></div></li>
  </ul>

	  <div id="login-page">
	  <?php

	//process login form if submitted
	if(isset($_POST['submit'])){

		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		
		if($user->login($username,$password)){ 

			//logged in return to index page
			header('Location: admin.php');
			exit;
		

		} else {
			$message = '<p class="form-login form-control">Wrong username or password</p>';
		}

	}//end if submit

	if(isset($message)){ echo $message; }
	?>
		  <div class="container" style="margin-top: 1px;">
			  <img src="assets/img/logo.png">
		  </div>
	  	<div class="container">
		      <form class="form-login" action="" method="post">
		        <h2 class="form-login-heading">sign in now</h2>
		        <div class="login-wrap">
		            <input type="text" class="form-control" placeholder="User Name" name="username" autofocus>
		            <br>
		            <input type="password" class="form-control" placeholder="Password" name="password">
		            <button class="btn btn-theme btn-block" href="" type="submit" name="submit" value="Login"><i class="fa fa-lock"></i> SIGN IN</button>
		            <hr>
		          <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">

		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                      </div>
							
							
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->
		
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("images/7.png", {speed: 500});
    </script>


  </body>
</html>
