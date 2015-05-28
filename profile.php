<!DOCTYPE HTML>
<?php 

	include 'login.php';
?>
<html lang="pt-br">
<head>
	<?php include 'include/head.php'; ?>
	<title>Página inicial</title>
</head>
<body>
		<?php include 'include/topo.php'; ?>

		<div class="painelEsquerda">
			<?php

			if(isset($_GET['username']) == true && empty($_GET['username']) == false){
				$username = $_GET['username'];
				if(user_exists($username) == true){
					$user_id = user_id_from_username($username);
					$profile_data = user_data($user_id, 'first_name', 'last_name', 'email');
				?>
					<h2>Perfil: <?php echo $profile_data['first_name'];?></h2>
					<p>Email: <?php echo $profile_data['email']; ?>
				<?php
				}
				else{
					echo 'Perfil não encontrado';
				}
			}
			else{
				header('Location: index.php');
				exit();
			}
			?>
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

	<?php include 'include/footer.php'; ?>
</body>
</html>
\ No newline at end of file