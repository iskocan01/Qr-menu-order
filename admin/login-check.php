<?php 
	
	if (!isset($_SESSION['username'])) {
		
		$_SESSION['no-login-massage'] = "<div class='text-danger text-center'>Faça login no painel de administração</div>";

		//yönlendir

		header('location:'.SITEURL.'admin/login.php');



	}


 ?>