<?php

	include 'core/init.php';

	if(empty($_POST) == false){
		$update_data = array(
			'first_name' => $_POST['first_name'],
			'last_name' => $_POST['last_name'],
		);

		update_user($update_data);
	}
?>