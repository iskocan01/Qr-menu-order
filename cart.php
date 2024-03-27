<?php include("partials-front/menu.php");?>

 

<?php 
	if (isset($_SESSION["shoppingCart"])) {
		echo "<pre>";
		print_r($_SESSION["shoppingCart"]);

		echo "<pre>";
	}else{
		echo "cart yok";
	}

	?>

	


	<?php
	


	include("partials-front/footer.php");

 ?>