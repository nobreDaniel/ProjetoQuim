
<?php
?>
	<form action="" method="post" id="loginForm">
			Usuário: <br> <input type="text" name="username"> <br>
			Senha: <br> <input type="password" name="password">
			<br> <input type="submit" name="Log in"> <br>
			Esqueceu seu <a href="recover.php?mode=username">nome de usuário</a> ou <a href="recover.php?mode=password"> senha </a>
			<?php output_errors($errors); ?>
		</ul>
	</form>