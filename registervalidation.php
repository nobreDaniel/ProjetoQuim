<?php
	if(empty($_POST)==false){
		if(user_exists($_POST['username']) == true){
			$reg_errors[] = 'Usuário '.htmlentities($_POST['username']).' ja está em uso';
		}
		else if(email_exists($_POST['email']) == true){
			$reg_errors[] = 'O email '.htmlentities($_POST['email']).' ja está em uso';
		}
	}

	if(empty($_POST) == false && empty($reg_errors) == true){
			$register_data = array(
					'username' 		=> $_POST['username'],
					'password' 		=> md5($_POST['password']),
					'first_name'	=> $_POST['first_name'],
					'last_name' 	=> $_POST['last_name'],
					'email' 		=> $_POST['email']
				);

			register_user($register_data);
			header('Location: successregister.php');
			exit();
	}
	else{
		echo output_errors($reg_errors);	
	}
?>