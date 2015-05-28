<!DOCTYPE HTML>
<?php 

	include 'core/init.php';
	protect_page();
	$page_id = 1;

	if(empty($_POST)==false){
		$ins_comment = $_POST['comentario'];
		mysql_query("INSERT INTO comments(comment, user_id, page_id, date) values('$ins_comment', $session_user_id, $page_id,'".get_current_day()."')");
	}
?>
<html lang="pt-br">
<head>
	<?php include 'include/head.php'; ?>
	<title>Teste de comentários</title>
</head>
<body>
		<?php include 'include/topo.php'; ?>

		<div class="painelEsquerda">
			<p>
				Lorem ipsum dzolor sit amet, consectetur adipiscing elit. Ut ultricies dignissim nibh ac pellentesque. Nunc nec tempor dui, ut lacinia quam. Donec consectetur nisl et ipsum sollicitudin ornare vitae aliquet libero. Integer cursus nisl eget urna varius congue. Sed sed eleifend nisi. Praesent eget orci hendrerit, molestie metus non, venenatis ipsum. Aenean molestie diam tincidunt nulla mattis finibus. Fusce at nisi ex. Sed sit amet mi egestas, bibendum nibh at, suscipit est. Pellentesque at tortor ante. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras viverra nunc ac mi lobortis, vel congue ante efficitur. 
			</p>
			
			<br> 
			<?php   
				load_comments($page_id);
			?>
			<form action="" method="post" name="comment">
				Comentar:<br><textarea type="text" name="comentario"></textarea>
				<input type="submit" value="Comentar">
			</form>
		</div 
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