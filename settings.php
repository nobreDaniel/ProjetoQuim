<?php 
	include 'login.php';
	protect_page();



?>

<!DOCTYPE HTML>

<html lang="pt-br">
<head>
	<?php include 'include/head.php'; ?>
	<title>Configurações da conta</title>
</head>
<body>
	<?php include 'include/topo.php'; ?>

		<div class="painelEsquerda">
			<form action="func.settings.php" method="post" id="settings">
				Primeiro nome:<br><input type="text" name="first_name" <?php echo "value=\"".$user_data['first_name']."\""; ?>><br>
				Sobrenome:<br><input type="text" name="last_name"  <?php echo "value=\"".$user_data['last_name']."\""; ?>><br>
				Email:<br><input type="email" name="email"  <?php echo "value=\"".$user_data['email']."\""; ?>><br>
				<input type="submit" value="Atualizar">
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

