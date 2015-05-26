<?php
	include 'core/init.php';
	logged_in_redirect();
	if(isset($_GET['success'])==true && empty($_GET['success']) == true){
		?>
		<h2> Obrigado, nós ativamos sua conta</h2>
		<?php
	}
	else if(isset($_GET['email'], $_GET['email_code']) == true){
		$email = trim($_GET['email']);
		$email_code = trim($_GET['email_code']);

		if(email_exists($email) == false){
			$errors[] = 'Ops, algo deu errado, não foi possivel encontrar esse email';
		}
		else if(activate($email, $email_code) == false){
			$errors[] = 'Tivemos problemas ativando sua conta';
		}

		if(empty($errors) == false){
			?>
			<h2>Ops..</h2>
			<?php
			echo output_errors($errors);
		}
		else{
			header('Location: activate.php?success');
			exit();
		}
		}
	}
	else{
		header('Location: index.php');
		exit();
	}
?>