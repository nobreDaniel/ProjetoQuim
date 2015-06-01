<?php  

	// Senha alterada
	if(isset($_GET['alterada'])==true){
		echo "
		<script type='text/javascript'>
			$(document).ready(function(){
				$('#modalSenhaAlterada').modal('show');
			});
		</script>";
	}

	// Responder comentário
	if(isset($_GET['id'])==true){
		echo "
		<script type='text/javascript'>
			$(document).ready(function(){
				$('#modalResponderComentario').modal('show');
			});
		</script>";
	}

	// Editar comentário
	if(empty($_GET['mode'])==false && $_GET['mode'] == 'edit'){
		echo "
		<script type='text/javascript'>
			$(document).ready(function(){
				$('#modalEditarComentario').modal('show');
			});
		</script>";
	}

	//Excluir comentário
	if(isset($_GET['comment_id'])){
		if(empty($_GET['ok']) == false){
			if($_GET['mode']=='delete' && $_GET['ok']=='false'){
				echo "
				<script type='text/javascript'>
					$(document).ready(function(){
						$('#modalExcluirComentario').modal('show');
					});
				</script>";
			}
		}
	}		
?>