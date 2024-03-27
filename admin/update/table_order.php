<?php 
	include("../../config/constants.php"); 
	require_once("../partials/getData/getData.php");

	$order_status = new tableOrderStatus();
	$tableUpdate = new tableUpdate();

?>

<?php 
if (isset($_GET["p"])) {
	if (isset($_GET["cart_id"])) {
		$cart_id = $_GET['cart_id'];
		$islem = $_GET["p"];
		if ($islem == "iptal") {
			$order_status->ordercancel($cart_id, $db);


			$_SESSION['info-error'] = "<h2 class='text-center'>O pedido foi cancelado</h2> ";
			header("location:".SITEURL."admin");
			//echo "sipariş iptal edildi";

		}elseif($islem == "order"){
			
				

				$order_status->orderStatusUpdate($cart_id, $db);
				$table_no = $order_status->getTableNo($cart_id, $db);
				
				$table_no = $table_no->table_id;


				$order_status->tableStatusUpdate($table_no, $db); 
				$order_status->tableOrderAddTable($table_no, $cart_id, $db);
				$tableUpdate->addCartId($table_no,$cart_id,$db);

 				//burada tekrardan sayfayı yönlendireceğiz
 				$_SESSION['info-succes'] = "<h2 class='text-center'>O pedido foi aceito </h2> ";
			header("location:".SITEURL."admin");
		}
	}
}
	
 ?>