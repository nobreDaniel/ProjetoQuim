<h2> Bem vindo, <?php echo $user_data['first_name'] ?> </h2>
<div class="profile">
	<ul>
		<div class="profile">
			<?php 
			if(isset($_FILES['profile']) == true){
				if(empty($_FILES['profile']['name']) == true){
					echo 'Escolha um arquivo';
				}
				else{
					$allowed = array('jpg','png','gif', 'jpeg');
					$file_name = $_FILES['profile']['name'];
					$file_extn = explode('.', $file_name);
					$get_file_extn = strtolower(end($file_extn));
					$file_temp = $_FILES['profile']['tmp_name'];

					if(in_array($get_file_extn, $allowed)==true){
						change_profile_image($_SESSION['user_id'], $file_temp, $get_file_extn);
					}
					else{
						echo 'Arquivo incompatível. Permitido: jpg, png, gif e jpeg';
					}
				}
			}

			if(empty($user_data['profile']) ==false){
				echo '<img src="'.$user_data['profile'].'">';
			}
			?>
		<form action="" method="post" enctype="multipart/form-data">
			<input type="file" name="profile"> <input type="submit">
		</form>
		</div>
		<li><a href="logout.php">Sair</a></li>
		<li><a href="profile.php?username=<?php echo $user_data['username']?>">Perfil</a></li>
		<li><a href="changepassword.php">Alterar senha</a></li>
		<li><a href="settings.php">Configurações da conta</a></li>
		<?php if(has_access($user_data['user_id'], 1)==true)
			echo '<li><a href="admin.php">Painel do administrador</a></li>'
		?>
	</ul>
</div>
