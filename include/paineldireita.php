
<?php
?>
	<form action="" method="post" id="loginForm">
			Usuário: <br> <input type="text" name="username"> <br>
			Senha: <br> <input type="password" name="password">
			<br> <input type="submit" name="Log in"> <br>
			<?php output_errors($errors); ?>
		</ul>
	</form>