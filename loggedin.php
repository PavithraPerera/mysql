<?php 

	setcookie("id", "",time()-60*60);

	echo $_COOKIE['id'];

?>