<?php 
	include 'login.php';
	logged_in_redirect();
?>

<!DOCTYPE HTML>

<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/jquery-1.7.2.js" type="text/javascript"></script>
	<script src="js/jquery.validate.js"type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function(){

			$('#registerForm').validate({
				rules:{
					username:{
						required:true,
						rangelength: [5,32]
					},
					first_name:{
						required:true,
						rangelength: [3,32]
					},
					last_name:{
						required:true,
						rangelength: [3,32]
					},
					password:{
						required:true,
						rangelength: [5,32]
					},
					password_again:{
						required: true,
					    equalTo: "#password"
					},
					email:{
						required: true,
						email: true
					}
				},
				messages:{
					username:{
						required:"Este campo é obrigatório",
						rangelength: "O nome de usuário deve conter entre 5 e 32 caracteres"
					},
					password:{
						required:"Este campo é obrigatório",
						rangelength: "A sua senha deve conter entre 3 e 32 caracteres"
					},
					first_name:{
						required:"Este campo é obrigatório",
						minlength: "O nome deve conter no minímo 3 caracteres"
					},
					last_name:{
						required:"Este campo é obrigatório",
						minlength: "O sobrenome deve conter no mínimo 3 carácteres"
					},
					password_again:{
						required: "Este campo é obrigatório",
						equalTo: "As senhas não estão iguais"
					},
					email:{
						required: "Este campo é obrigatório",
						email: "Insira um endereço de email válido."
					}
				}
			});
		});
	</script>
	<title>Criar nova conta</title
</head>
<body>
	<div class="topo">	</div>
	<div class="menu"><a href="index.php">Inicio</a> || <a href="index.php">Logar</a> || <a href="index.php">Registrar</a> || <?php if(logged_in()) echo '<a href="logout.php">Sair</a>'?></div>

	<div class="container">
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

	<div class="footer">

	</div>
</body>
</html>

