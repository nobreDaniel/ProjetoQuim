<!DOCTYPE HTML>
<?php 

	include 'login.php';
?>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/jquery-1.7.2.js" type="text/javascript"></script>
	<script src="js/jquery.validate.js"type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#loginForm').validate({
				rules:{
					username:{
						required:true,
						rangelength: [5,32]
					},
					password:{
						required:true,
						rangelength: [3,32]
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
					}

				}
			});
		});
	</script>
	<title>Página inicial</title>
</head>
<body>
	<div class="topo">	</div>
	<div class="menu"><a href="index.php">Inicio</a> || <a href="index.php">Logar</a> || <a href="index.php">Registrar</a> || <?php if(logged_in()) echo '<a href="logout.php">Sair</a>'?></div>

	<div class="container">
		<div class="painelEsquerda">

		</div>

		<div class="painelDireita">
		<?php
			if(logged_in()==true){
				include 'include/loggedin.php';
			}
			else{
				include 'include/painelDireita.php';
			}
			include 'include/user_count.php';			
		?>
		</div>
		
	</div>

	<div class="footer">

	</div>
</body>
</html>