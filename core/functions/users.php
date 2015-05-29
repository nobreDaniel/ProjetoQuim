<?php

function user_exists($username){
	$username = sanitize($username);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username'");
	if(mysql_result($query, 0) == 1){
		return true;
	}else
		return false;
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

function user_count(){	
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `active` = 1");
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

function change_profile_image($user_id, $file_temp, $file_extn){
	$file_path = 'images/profile/'.substr(md5(time()), 0, 10).'.'.$file_extn;
	move_uploaded_file($file_temp, $file_path);
	mysql_query("UPDATE `users` set `profile` = '$file_path' WHERE `user_id` = '$user_id'");
}

function load_comments($page_id, $user_data, $session_user_id){
	$query = mysql_query("SELECT first_name, last_name, comment, comment_id, username FROM users INNER JOIN comments ON users.user_id = comments.user_id WHERE page_id = $page_id and reply = 0 ORDER BY comment_id DESC");
	
	$rows = mysql_num_rows($query);
	
	if($rows > 0){
		while($field = mysql_fetch_array($query)){
			
			$first_name = $field['first_name'];
			$last_name = $field['last_name'];
			$comment = $field['comment'];
			$comment_id = $field['comment_id'];
			$username = $field['username'];
			$session_user_name = $user_data['username'];

			$reply_query = mysql_query("SELECT first_name, last_name, comment, comment_id, to_reply_id, username FROM users INNER JOIN comments ON users.user_id = comments.user_id WHERE page_id = $page_id and reply = 1 and to_reply_id = $comment_id ORDER BY comment_id ASC");
			$reply_rows = mysql_num_rows($reply_query);

			echo '<a href="profile.php?username='.$username.'">'.$first_name.' '.$last_name.'</a>'.'  |  '.get_current_day().'<br>'.$comment.'<br>';

			if($username == $session_user_name){
				echo '<a href="?comment_id='.$comment_id.'&mode=delete">Deletar</a>    ||  ';
				echo '<a href="?comment_id='.$comment_id.'&mode=edit">Editar</a><br><br>';
			}
			else
				echo '<br>';
			if($reply_rows>0){
				while($field2 = mysql_fetch_array($reply_query)){

					$to_reply_id = $field2['to_reply_id'];
					$reply = $field2['comment'];
					$reply_comment_id = $field2['comment_id'];
					$reply_first_name = $field2['first_name'];
					$reply_last_name = $field2['last_name'];
					$reply_username = $field2['username'];

					if($to_reply_id == $comment_id){
						echo '<div class="reply">'.'<a href="profile.php?username='.$reply_username.'">'.$reply_first_name.' '.$reply_last_name.'</a>  |  '.get_current_day().'<br>'.$reply.'<br></div><br>';
					if($reply_username == $session_user_name){
						echo '<a class="reply" href="?comment_id='.$reply_comment_id.'&mode=delete">Deletar</a>   ||';
						echo '<a class="reply" href="?comment_id='.$reply_comment_id.'&mode=edit">Editar</a><br><br>';
					}
			else
				echo '<br>';
					}
				}
			}
			echo '<a class="reply" href="?id='.$comment_id .'">Responder</a> <hr>';
		}
	}
}

function get_comment_from_id($comment_id, $page_id){
	$comment_id = (int)$comment_id;

	$query = mysql_query("SELECT comment FROM users INNER JOIN comments ON users.user_id = comments.user_id WHERE page_id = $page_id AND comment_id = $comment_id");

	$field = mysql_fetch_array($query);
	$comment = $field['comment'];
	return $comment;
}

function get_current_day(){
	date_default_timezone_set('America/Sao_Paulo');
	$date = date('d/m/y', time());
	return $date;
}

function new_comment($user_id, $page_id, $to_reply_id, $reply){
	if(empty($_POST)==false){
		$ins_comment = $_POST['comentario'];
		mysql_query("INSERT INTO comments(comment, user_id, page_id, date,to_reply_id, reply) values('$ins_comment', $user_id, $page_id,'".get_current_day()."' ,$to_reply_id, $reply)");
		header('Location: ?success');
	}
}

function delete_comment($comment_id){
	$comment_id = (int)$comment_id;

	mysql_query("DELETE FROM comments WHERE comment_id = $comment_id");
	mysql_query("DELETE FROM comments WHERE to_reply_id = $comment_id");
}

function edit_comment($comment_id, $comment){
	$comment_id = (int)$comment_id;

	mysql_query("UPDATE comments SET comment = '$comment' WHERE comment_id = $comment_id");

	header('Location= ?success');
}
?>