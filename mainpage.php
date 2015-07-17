<?php 

    session_start();

    include("connection.php");

    $query = "SELECT diary FROM users WHERE id = '".$_SESSION['id']."' LIMIT 1";

    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);

    $diary = $row['diary'];
?>



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

  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header pull-left">
      
      <a class="navbar-brand" href="#">Secret Diary</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="pull-right" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php?logout=1">Log Out</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
  	<div class = "container">

  		<div class = "rows">
  			<div class = "col-md-6 col-md-offset-3 white">

  				<TEXTAREA class = "form-control"><?php echo $diary; ?></TEXTAREA>
  				
  			</div>
  		</div>
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script>
    	$("TEXTAREA").css("height",$(window).height()-120);
      $("TEXTAREA").keyup(function(){



          $.post("diary.php",{diary: $("TEXTAREA").val()});
          
      });
    </script>
  </body>
</html>