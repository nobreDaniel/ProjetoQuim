<!DOCTYPE html>
<html lang="pt-BR">
	<?php 



	include 'core/init.php';
	protect_page();
	include 'include2/head.php' ?>


	<body>

		<script type="text/javascript">
			
		</script>
		<?php 
		include 'include2/navbar.php'; ?>
		
		<div class="corpo span12">
			<div class="row-fluid">
			
			<div class="conteudo2 offset2 span8">	
			<?php
				if(empty($_POST) == false && md5($_POST['old_pass']) == $user_data['password']){
					password_update($_SESSION['user_id'], $_POST['new_pass']);
					if(!isset($_GET['alterada']))
						header('Location: ?alterada');
				}
				else if(!empty($_POST) && md5($_POST['old_pass']) !== $user_data['password']){
						$errors[] = 'A senha que você digitou não condiz <br>com a senha atual';
				}
			?>
				<div class="row-fluid">
					<div class="span12 cover">
						<div class="row-fluid">
							<div class="profile-pic span3 offset0">
								<img class="img-circle" class="span12 profile-pic" src="<?php echo $user_data['profile'] ?>" alt="">
							</div>
							<h4 class="span4 profile-name">Clayton Fidelis</h4>
						</div>
					</div>
				</div>
			  	
				<div class="row-fluid">
					<div class="span12 dados">
						<h2 align="center">Alterar senhar</h2><hr>
						<form action="" method="post" class="form-horizontal span12 center_div" id="change_pass">
							<div class="control-group">
								<label for="" class="control-label ">Senha Atual</label>
								<div class="controls">
									<input class="span5 " type="password" name="old_pass">
									<span class="help-block danger"><?php echo output_errors($errors); ?></span>
								</div>
							</div>

							<div class="control-group">
								<label for="" class="control-label ">Nova senha</label>
								<div class="controls">
									<input class="span5 " type="password" name="new_pass" id="new_pass">
								</div>
							</div>

							<div class="control-group">
								<label for="" class="control-label ">Repita a nova senha</label>
								<div class="controls">
									<input class="span5 " type="password" id="inputPassword" name="new_pass_again">
								</div>
							</div>

							<div class="controls">
								<input type="submit" class="btn btn-success span5" value="Alterar senha">	
							</div>
						</form>		
					</div>

				</div>

				<hr>
			


			<?php
				include 'include2/callmodal.php';
				include 'include2/modal.php';
				include 'include2/rodape.php';
			?>
		</div>
		</div>
		</body>


</html>