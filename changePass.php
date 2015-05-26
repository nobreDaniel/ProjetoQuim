<?php
	include 'core/init.php';
	if(empty($_POST) == false && md5($_POST['old_pass']) == $user_data['password']){
		password_update($_SESSION['user_id'], $_POST['new_pass']);
		echo 'Senha atualizada com sucesso';
	}
	else{
		echo 'Sua senha atual está errada';
	}

?>