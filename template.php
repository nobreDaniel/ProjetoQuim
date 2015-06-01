<!DOCTYPE html>
<html lang="pt-BR">
	<?php 

	include 'core/init.php';

	protect_page();
	$page_id = 1;
	$to_reply_id = 0;
	$reply = 0;	
	$comment_id = NULL;

	if(isset($_GET['id'])==true){
		$reply = 1;
		$to_reply_id = $_GET['id'];
	}
	else if(isset($_GET['success'])){
		$to_reply_id = 0;
		$reply = 0;
		$comment_id = NULL;
	}
	else if(isset($_GET['comment_id'])){
		$comment_id = $_GET['comment_id'];
		if($_GET['mode']=='delete'){

		}
		if(empty($_GET['ok']) == false){
			if($_GET['mode']=='delete' && $_GET['ok']=='true'){
				delete_comment($comment_id);
				header('Location: ?success');
			}
		}		
	}
	if(empty($_GET['mode'])==true || $_GET['mode'] !== 'edit'){
		new_comment($session_user_id, $page_id, $to_reply_id, $reply);
	}
	if(empty($_GET['mode'])==false && $_GET['mode'] == 'edit' && empty($_POST)==false){
		$comment = $_POST['comentario'];
		edit_comment($_GET['comment_id'], $comment);
	}

	include 'include2/head.php' ?>
	<body>

		<?php 
		if(isset($_GET['id'])==true){
			echo "<script type='text/javascript'>
					$(document).ready(function(){
					$('#modalResponderComentario').modal('show');
					});
					</script>";
		}
		if(empty($_GET['mode'])==false && $_GET['mode'] == 'edit'){
			echo "<script type='text/javascript'>
					$(document).ready(function(){
					$('#modalEditarComentario').modal('show');
					});
					</script>";
		}

		if(isset($_GET['comment_id'])){
			if(empty($_GET['ok']) == false){
				if($_GET['mode']=='delete' && $_GET['ok']=='false'){
					echo "<script type='text/javascript'>
						$(document).ready(function(){
						$('#modalExcluirComentario').modal('show');
						});
					</script>";
				}
			}
		}		

		include 'include2/navbar.php'; ?>
		
		<div class="corpo span12">
			<div class="row-fluid">
			<?php 
				include 'include2/menuLateral.php'; 
			?>
			
			<div class="conteudo img-polaroid span9">	

			  	<h1>Lorem ipsum dolor sit amet <small>Ipsum dolor</small></h1>
				<hr>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>	

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>		
				<hr>
			  	<h3>Comentários</h3>
				<hr>
				<!-- Comentários -->
				<?php   
					load_comments($page_id, $user_data, $session_user_id);
				?>

				<div class="comentar">
					<form action="" method="post">
						<textarea name="comentario" class="comentario" name="" id="" cols="30" rows="10"></textarea>
						<input type="submit" class="btn btn-large span3" value="Comentar">
					</form>
			 	</div>
			</div>
			<!-- Modal -->
			<?php include 'include2/modal.php'; 


				include 'include2/rodape.php';
			?>
		</div>
		</div>
		</body>


</html>