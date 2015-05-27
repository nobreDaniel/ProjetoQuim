<!DOCTYPE HTML>
<?php 
	include 'core/init.php';
	//include 'login.php';
	logged_in_redirect();
?>
<html lang="pt-br">
<head>
	<?php include 'include/head.php'; ?>
	<title>Recuperar página</title>
</head>
<body>
		<?php include 'include/topo.php'; ?>

		<div class="painelEsquerda">
			<h2> Recuperar senha </h2>
			<?php

			if(isset($_GET['success']) == true && empty($_GET['success'])==true){
				echo 'Obrigado, enviamos um email.';
			}
			else{
				$mode_allowed = array('username', 'password');
				if(isset($_GET['mode']) == true && in_array($_GET['mode'], $mode_allowed) == true){
					if(isset($_POST['email']) == true && empty($_POST['email']) == false){
						if(email_exists($_POST['email'])==true){
							recover($_GET['mode'], $_POST['email']);
							header('Location: recover.php?success');
						}
						else{
							echo 'Não foi possivel encontrar este email';
						}
					}
				?>
					<form action="" method="post">
						Insira seu email: <input type="email" name="email"><br><input type="submit" value="Recuperar">
					</form>	
				<?php
				}
				else{
					header('Location: index.php');
					exit();
				}
			}
			?>
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