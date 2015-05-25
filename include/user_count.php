<?php 
	
?>

<h2>Usuários</h2>
<hr>
<div class="inner">
	<?php
		$user_count = user_count();
		$suffix = ($user_count != 1) ? 's' : '';
	?>
	<?php echo $user_count; ?> usuário<?php echo $suffix; ?> cadastrado<?php echo $suffix; ?>
</div>