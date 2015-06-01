			<div id="modalResponderComentario" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			    <h3 id="myModalLabel">Responder comentário</h3>
			  </div>
			  <div class="modal-body">
			  	<p>Seja educado ao comentar</p>
			  	<form action="" method="post">
			    <textarea name="comentario" class="editarComentario"name="" id="" cols="30" rows="10"></textarea>
			  </div>
			  <div class="modal-footer">
			    <a class="btn" data-dismiss="" href="?cancel"aria-hidden="true">Cancelar</a>
			    <button class="btn btn-primary">Responder</button>
			    </form>
			  </div>
			</div>

			<div id="modalEditarComentario" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			    <h3 id="myModalLabel">Editar comentário</h3>
			  </div>
			  <div class="modal-body">
    		  	<form action="" method="post">
			    <textarea name="comentario" class="editarComentario"name="" id="" cols="30" rows="10"><?php if(empty($_GET['mode']) == false && $_GET['mode']=='edit'){echo get_comment_from_id($comment_id, $page_id);} ?></textarea>
			  </div>
			  <div class="modal-footer">
			    <a class="btn" data-dismiss="" href="?success" aria-hidden="true">Cancelar</a>
			    <button class="btn btn-primary">Editar</button>
			    </form>
			    </div>
			</div>

			<div id="modalExcluirComentario" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			    <h3 id="myModalLabel">Excluir comentário</h3>
			  </div>
			  <div class="modal-body">
    		  	<form action="" method="post">
    		  	<p>Tem certeza que quer excluir o comentário?</p>
			  </div>
			  <div class="modal-footer">
			    <a class="btn" data-dismiss="" href="?success" aria-hidden="true">Cancelar</a>
			    <a href="?comment_id=<?php echo $comment_id?>&mode=delete&ok=true"class="btn btn-primary">Excluir</a>
			    </form>
			    </div>
			</div>

			</div>
			</div>