<?php

	$b;

	if(isset($_POST['check'])){
		echo $_COOKIE["isRef"];
		setcookie("isRef", "No");
	}

	
	if(isset($_POST['sendMain'])){
		setcookie("isRef", "YES");
	}
	


?>