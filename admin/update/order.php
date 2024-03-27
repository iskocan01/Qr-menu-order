<?php include("../../config/constants.php"); ?>

<?php 
	//include("../../config/constants.php"); 
	require_once("../partials/getData/getData.php");

	$orderStatus = new orderStatus();


	if (isset($_GET['p']) && isset($_GET["cart_id"])) {
		$islem = $_GET['p'];
		$cart_id = $_GET['cart_id'];
		if ($islem == "accept") {
			$orderStatus->orderStatusUpdate($cart_id, $db);
			//echo "here";
		}
		elseif ($islem == "goesout") {
			$orderStatus->orderStatusUpdate($cart_id, $db);
		}
		elseif ($islem == "delivery") {
			$orderStatus->orderStatusUpdate($cart_id, $db);

		}elseif ($islem == "iptal") {
			$orderStatus->ordercancel($cart_id, $db);
		}
		header("location:".SITEURL."admin");
	}


 ?>