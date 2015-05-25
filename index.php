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