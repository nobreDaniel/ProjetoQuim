<?php

include 'core/init.php';

if(empty($_POST)===false && logged_in()==false){
	$username = $_POST['username'];
	$password = $_POST['password'];

	if(empty($username) == true || empty($password) == true){
		$errors[] = 'Você precisa inserir usuário e senha';	
	}
	else if(user_exists($username) == false){
		$errors[] = 'Usuário não cadastrado. <a href="register.php">Cadastrar</a>';
	}
	else if(user_active($username) == false){
		$errors[] = 'Sua conta não está ativada';
	}
	else{
		$login = login($username,$password);
		if($login == false){
		$errors[] = 'Usuário ou senha incorretos';
		}
		else{
			$_SESSION['user_id'] = $login;
			header('Location: index.php');
			exit();
		}
	}
	//print_r($errors);
}

?>