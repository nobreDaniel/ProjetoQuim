<h2> Bem vindo, <?php echo $user_data['first_name'] ?> </h2>
<div class="profile">
	<ul>
		<li><a href="logout.php">Sair</a></li>
		<li><a href="profile.php?username=<?php echo $user_data['username']?>">Perfil</a></li>
		<li><a href="changepassword.php">Alterar senha</a></li>
		<li><a href="settings.php">Configurações da conta</a></li>
	</ul>
</div>
