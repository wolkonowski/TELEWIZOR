<?php


if (isset($_POST['getOGL'])) {
	$myfile = fopen("ogloszenia.txt", "r") or die("Unable to open file!");
	while(!feof($myfile)) {
		echo fgets($myfile);
	}
	fclose($myfile);
}

if (isset($_POST['sendOGL'])) {
	file_put_contents("ogloszenia.txt", $_POST['sendOGL']);
}
?>