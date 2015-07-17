<?php

	session_start();

	if ($_GET ["logout"]==1){ session_destroy();
		$message = "You have been logged out. Have a nice day";
	}

	include("connection.php");

	if($_POST['submit'] == "Sign Up"){

		if (!$_POST['email']) $error.="<br/> Please Enter Your Email";
			else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $error.="<br/> Please Enter a Valid Email";

		if (!$_POST['password']) $error.="<br/> Please Enter Your Password";
			else {
				if(strlen($_POST['password'])<8 )$error.= "<br/> Please Enter a password with at least 8 characters";
				if (!preg_match('`[A-Z]`', $_POST['password']))	$error.= " <br/> Please Include at least one Capital Letter on your password";
			}

		if ($error) $error = "There were error(s) in your sign up details : ".$error;	

		else {


			$query = "SELECT * FROM users WHERE email ='".mysqli_real_escape_string($link, $_POST['email'])."'";

			$result = mysqli_query($link, $query);

			$results = mysqli_num_rows($result);

			if ($results) $error =  "That email address already exists. Do you want to login?";
			else {
				
				$query = "INSERT INTO `users` (`email`, `password`) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."', '".md5(md5($_POST['email']).$_POST['password'])."')";
				mysqli_query($link, $query);

				$sign =  "You signed up successfully!, login to continue";

				$_SESSION["id"] = mysqli_insert_id($link);

				//print_r($_SESSION);

				//redirect to logged in page
				header("Location:mainpage.php");
			}

		}
	}

	if($_POST['submit'] == "Log In"){

		

		
		$query = "SELECT * FROM `users` WHERE `email` = '".mysqli_real_escape_string($link, $_POST['loginemail'])."' AND `password` = '".md5(md5($_POST['loginemail']).$_POST['loginpassword'])."' LIMIT 1";

		$result = mysqli_query($link, $query);

		$row = mysqli_fetch_array($result);

		if ($row){
			$_SESSION['id']=$row['id'];

			print_r($_SESSION);

			//redirect to logged in page
			header("Location:mainpage.php");
		}
		else{
			$error =  "Could not find that user with that email and password, please try again";
		}

	}

?>