<?php include("login.php");?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Secret Diary</title>

   
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">

   html, body {
		height: 100%;
	}

	.container{
		background-image: url("back.jpg");
		width: 100%;
		height: 100%;
		background-size: cover;
		background-position: center;
		padding-top: 40px;
	}
	.white{
		color: white;
	}
	.navbar{
		margin-bottom: 0px;
	}

    </style>

    
  </head>
  <body>

  <nav class = "navbar navbar-default">
  	<div class = "container-fluid" >
  		<div class = "navbar-header">
  			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        		<span class="sr-only">Toggle navigation</span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
      		</button>
      		<a class="navbar-brand" href="#">Secret Diary</a>
    		</div>
  			</div>
  </nav>
    
  	<div class = "container">

  		<div class = "rows">
  			<div class = "col-md-6 col-md-offset-3 white">
  				<h1>Secret Diary<br><small class ="white">Log into your secret world below!</small></h1>
  			</div>
  		</div>
  		<form method = "POST">
		<div class = "form-group white">
			<div class = "rows">
    			<div class="col-md-6 col-md-offset-3">
    				<?php 
    				if($message){
					echo '<div class ="alert alert-success">'.addslashes($message).'</div>';
					}
				?>
			<label for = "loginemail">Email</label>
			<input class = "form-control" type = "email"  name = "loginemail" id = "loginemail" placeholder = "you@example.com" value = "<?php echo addslashes($_POST['email']); ?>">
			
			<label for = "loginpassword">Password</label>
			<input class = "form-control" type = "password" name = "loginpassword" placeholder = "Password" value = "<?php echo addslashes($_POST['password']); ?>">
			<br>

			<?php
				if($error){
					echo '<div class ="alert alert-danger">'.addslashes($error).'</div>';
				}
				
				
			 ?>
			
			<input class  = "btn btn-primary" type = "submit" value = "Log In" name = "submit">
				</div>
			</div>
		</div>
	</form>

	<div class = "rows">
  			<div class = "col-md-6 col-md-offset-3 white">
  				<br><br>
  				<p class = "lead">Dont Have a Diary yet? Sign up below!</p>
  			</div>
  		</div>

    <form method = "POST">
    	<div class = "form-group white">
    		<div class = "rows">
    			<div class="col-md-6 col-md-offset-3">
    		<label for = "email">Email</label>
			<input class = "form-control" type = "email"  name = "email" id = "email" placeholder = "you@example.com" value = "<?php echo addslashes($_POST['email']); ?>">
				
			<label for = "password">Password</label>
			<input class = "form-control" type = "password" name = "password" id = "password" placeholder = "Password" value = "<?php echo addslashes($_POST['password']); ?>">
			<br>
			<?php 

			 if ($sign) {
					echo '<div class ="alert alert-success">'.addslashes($sign).'</div>';
				}
			?>
			<input class  = "btn btn-primary" type = "submit" value = "Sign Up" name = "submit">
				</div>
			</div>
		</div>
	</form>

	

	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>