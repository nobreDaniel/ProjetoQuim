<!DOCTYPE HTML>
<?php 
	include 'core/init.php';
	protect_page();
	admin_protect();
?>
<html lang="pt-br">
<head>
	<?php include 'include/head.php'; ?>
	<title>Painel do administrador</title>
</head>
<body>
		<?php include 'include/topo.php'; ?>

		<div class="painelEsquerda">
			<h2> Painel do administrador </h2>
		</div>

		<div class="painelDireita">
		<?php
			include 'include/loggedin.php';
			include 'include/user_count.php';			
		?>
		</div>	
	</div>

	<?php include 'include/footer.php'; ?>
</body>
</html>