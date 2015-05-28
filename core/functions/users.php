<?php

function user_exists($username){
	$username = sanitize($username);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username'");
	return(mysql_result($query, 0) == 1) ? true : false;
}

function email_exists($email){
	$email = sanitize($email);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `email` = '$email'");
	return(mysql_result($query, 0) == 1) ? true : false;
}

function user_active($username){
	$username = sanitize($username);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `active` = 1");
	return(mysql_result($query, 0) == 1) ? true : false;
}

function user_id_from_username($username){
	$username = sanitize($username);
	$query = mysql_query("SELECT `user_id` FROM `users` WHERE `username` = '$username'");
	return mysql_result($query, 0, 'user_id');
}

function user_id_from_email($email){
	$email = sanitize($email);
	$query = mysql_query("SELECT `user_id` FROM `users` WHERE `email` = '$email'");
	return mysql_result($query, 0, 'user_id');
}


function login($username, $password){
	$user_id = user_id_from_username($username);
	$username = sanitize($username);
	$password = md5($password);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `password` = '$password'");
	return (mysql_result($query, 0) == 1) ? $user_id : false;
}

function logged_in(){
	return (isset($_SESSION['user_id'])) ? true : false;
}

function user_data($user_id){
	$data = array();
	$user_id = (int)$user_id;

	$func_num_args = func_num_args();
	$func_get_args = func_get_args();

	if($func_num_args > 1){
		unset($func_get_args[0]);

		$fields = '`'.implode('`, `', $func_get_args ). '`';
		$data = mysql_fetch_assoc(mysql_query("SELECT $fields from `users` where `user_id` = $user_id"));
		return $data;
	}
}

function user_count(){	$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `active` = 1");
	return mysql_result($query, 0);
}

function register_user($register_data){
	array_walk($register_data, 'array_sanitize');
	$data = '`'.implode('`, `', array_keys($register_data)). '`';
	$fields = '\'' .implode('\', \'', $register_data). '\'';
	mysql_query("INSERT INTO `users` ($data) VALUES ($fields)");
	email($register_data['email'], 'Ative sua conta', "
		Olá".$register_data['first_name'].", \n\n
		Você precisa ativar sua conta, use o link abaixo:\n\n http://localhost/projetoquimica/active.php?email=".$register_data['email']."email_code=".$register_data['email_code']."\n\n
		- Projeto quimica
		");
}

function password_update($user_id, $new_pass){
	$user_id = (int)$user_id;
	$new_pass = md5($new_pass);
	$query = mysql_query("UPDATE `users` set `password` = '$new_pass' where `user_id` = '$user_id'");
}

function activate($email, $email_code){
	$email = mysql_real_escape_string($email);
	$email_code = mysql_real_escape_string($email_code);
	if(mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `email` = '$email' and `email_code` = '$email_code' and `activate` = 0"),0) == 1){
		mysql_query("UPDATE `users` set `active` = 1 WHERE `email` = '$email'");
		return true;
	}else{
		return false;
	}
}

function update_user($update_data){
	array_walk($update_data, 'array_sanitize');

	foreach ($update_data as $field => $data) {
		$update[] = '`'.$field.'`=\''.$data.'\'';
	}
	mysql_query("UPDATE `users` set " .	implode(', ', $update). " Where `user_id` =".$_SESSION['user_id']);
}

function recover($mode, $email){
	$mode = sanitize($mode);
	$email = sanitize($email);

	$user_data = user_data(user_id_from_email($email), 'first_name', 'username');
	if($mode == 'username'){
		email($email, 'Seu nome de usuário', $user_data['username']);
	}
	else if($mode == 'password'){
		$generated_password = substr(md5(rand(999, 99999)), 0,8);
		password_update($user_data['user_id'], $generated_password);
		email($email, 'Sua nova senha', $generated_password);
	}
}

function has_access($user_id, $type){
	$user_id = (int)$user_id;
	$type = (int)$type;
	$query = mysql_query("SELECT COUNT(`user_id`) from `users` WHERE `user_id` = $user_id and `type` = $type");
	return ((mysql_result($query, 0)) == 1) ? true : false;
}
?>