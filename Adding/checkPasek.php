<?php

	$b;

	if(isset($_POST['check'])){
		echo $_COOKIE["isRef"];
		setcookie("isRef", "No");
	}
	
	if(isset($_POST['check2'])){
		echo $_COOKIE["isRef2"];
		setcookie("isRef2", "No");
	}
	
	if(isset($_POST['sendMain'])){
		setcookie("isRef", "YES");
	}
	
	if(isset($_POST['sendMain2'])){
		setcookie("isRef2", "YES");
	}

?>