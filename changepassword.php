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
			<form action="changePass.php" method="post" id="changePass">
				Senha atual:<br><input type="password" name="old_pass"><br>
				Nova senha:<br><input type="password" name="new_pass" id="new_pass"><br>
				Repita a nova senha:<br><input type="password" name="old_pass_again"><br>
				<input type="submit" value="Mudar senha">
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

