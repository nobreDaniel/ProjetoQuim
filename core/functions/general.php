<?php 

function sanitize($data){
	return mysql_real_escape_string($data);
}

function array_sanitize(&$item){
	$item = mysql_real_escape_string($item);
}

function output_errors($errors){
	$output = array();
	foreach ($errors as $error) {
		echo $error. ', ';
	}
}

function protect_page(){
	if(logged_in() == false){
		header('Location: protected.php');
		exit();
	}
}

function logged_in_redirect(){
	if(logged_in() == true){
		header('Location: index.php');
		exit();
	}
}
?>