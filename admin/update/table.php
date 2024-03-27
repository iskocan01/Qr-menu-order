<?php include("../../config/constants.php");  ?>
<?php require_once("../partials/getData/getData.php"); ?>

<?php 

 $tableUpdate = new tableUpdate();
	
	if (isset($_GET['p']) && isset($_GET['table_id'])) {
		
		$p = $_GET['p'];
		$table_id = $_GET['table_id'];
		if ($p == "clean") {
			// Burada masanın yazılan cart idlerini sileceğiz
			//ve masa statu durumunu değiştireceğiz
			$tableUpdate->cleanTable($table_id, $db);

			//burada tekrardan sayfayı yönlendireceğiz Ve mesajını göstereceğiz
 				$_SESSION['info-succes'] = "<h2 class='text-center'>A mesa foi limpa</h2> ";
			header("location:".SITEURL."admin");

		}
		
	}else{
		header("location:".SITEURL."admin");


	}


 ?>