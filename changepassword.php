<?php 
	include 'login.php';
	protect_page();
?>

<!DOCTYPE HTML>

<html lang="pt-br">
<head>
	<?php include 'include/head.php'; ?>
	<title>Alterar senha</title>
</head>
<body>
	<?php include 'include/topo.php'; ?>

		<div class="painelEsquerda">
			<form action="" method="post" id="registerForm">
				Usuário: <br> <input type="text" name="username"> <br>
				Nome: <br> <input type="text" name="first_name"> <br>
				Sobrenome: <br> <input type="text" name="last_name"> <br>
				Email: <br> <input type="email" name="email"> <br>
				Senha: <br> <input type="password" id="password" name="password"> <br>
				Repita a senha: <br> <input  type="password" name="password_again"> <br>
				<?php include 'registervalidation.php'; ?> <br>
				<input type="submit" name="Register" value="Registrar"> <br>
			</form>
		</div>
		
		<div class="painelDireita">
		<?php
			if(logged_in()==true){
				include 'include/loggedin.php';
			}
			else{
				//include 'include/painelDireita.php';
			}
			include 'include/user_count.php';			
		?>
		</div>
		
	</div>
	<?php include 'include/footer.php'; ?>
</body>
</html>

