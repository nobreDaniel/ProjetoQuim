<?php 

function email($to, $subject, $body){
	mail($to, $subject,$body,'From: eu@eu.com');
}

function sanitize($data){
	return htmlentities(strip_tags(mysql_real_escape_string($data)));
}

function array_sanitize(&$item){
	$item = htmlentities(strip_tags(mysql_real_escape_string($item)));
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

function admin_protect(){
	global $user_data;
	if(has_access($user_data['user_id'], 1) == false){
		header('Location: index.php');
		exit();
	}
}
?>