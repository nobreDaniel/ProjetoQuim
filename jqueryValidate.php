<!DOCTYPE HTML>
<?php 
	include 'core/init.php';
	protect_page();
?>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/additional-methods.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#loginForm').validate({
				rules:{
					username:{
						required:true,
						rangelength: [8,32]
					},
					password:{
						required:true
					}
				},
				messages:{
	
				}
			});
		});
	</script>
	<title>Página inicial</title>
</head>
<body>
	<form action="" method="post" id="loginForm">
		
			Usuário: <br> <input type="text" name="username"> <br>
			Senha: <br> <input type="password" name="password">
			<br> <input type="submit" name="Log in">
		</ul>
	</form>
</body>
</html>