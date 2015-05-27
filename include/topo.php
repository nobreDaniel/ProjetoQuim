	<div class="topo">	</div>
	<div class="menu"> <a href="index.php">Inicio</a> ||<?php if(logged_in()==false){echo '<a href="index.php">Logar</a> || <a href="register.php">Registrar</a> ||';} ?><?php if(logged_in()) echo '<a href="logout.php">Sair</a>'?></div>
	<div class="container">