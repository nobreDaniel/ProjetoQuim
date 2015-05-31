<!DOCTYPE html>
<html lang="pt-BR">
	<?php include 'include2/head.php' ?>
	<body>
		<?php include 'include2/navbar.php'; ?>
		
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

			  	<h3>Comentários</h3>
				<hr>
				<!-- Comentários -->
				<div class="media">

					<!-- Imagem da pessoa que comenta -->
	              	<a class="pull-left" href="#"> 
	            		<img class="media-object" data-src="holder.js/64x64" alt="64x64" src="img/profile-mini.png" style="width: 64px; height: 64px;">
	              	</a>
					
					<!-- Nome e comentário -->

	              	<div class="media-body">
		            	<h4 class="media-heading">Nome</h4>
		                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
		               
						<!-- Botão pra editar comentário -->
	                    <a href="#myModal" role="button" class="btn btn-link" data-toggle="modal">Editar comentário</a>	

		               	<!-- Subcomentário -->
						<hr>
		                <div class="media">
		                  <a class="pull-left" href="#">
		                    <img class="media-object" data-src="holder.js/64x64" alt="64x64" src="img/profile-mini.png">
		                  </a>
		                  <div class="media-body">
		                    <h4 class="media-heading">Media heading</h4> 
		                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. 

							<!-- Botão pra editar comentário -->
		                    <a href="#myModal" role="button" class="btn btn-link" data-toggle="modal">Editar comentário</a>					
		                  </div>
		                </div>
						
		                <!-- Fim Subcomentário -->

		               	<!-- Subcomentário -->
						<hr>
		                <div class="media">
		                  <a class="pull-left" href="#">
		                    <img class="media-object" data-src="holder.js/64x64" alt="64x64" src="img/profile-mini.png">
		                  </a>
		                  <div class="media-body">
		                    <h4 class="media-heading">Media heading</h4> 
		                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. 

							<!-- Botão pra editar comentário -->
		                    <a href="#myModal" role="button" class="btn btn-link" data-toggle="modal">Editar comentário</a>					
		                  </div>
		                </div>

		                <!-- Fim Subcomentário -->

	              	</div>
	            </div>

				<div class="comentar">
					<form action="">
						<textarea class="comentario" name="" id="" cols="30" rows="10"></textarea>
						<input type="submit" class="btn btn-large span3" value="Comentar">
					</form>
			 	</div>
			</div>
			<!-- Modal -->
			<?php include 'include2/editarcomentariomodal.php'; 


				include 'include2/rodape.php';
			?>

		</div>
		</div>
		</body>


</html>