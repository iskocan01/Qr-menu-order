<?php include("../../config/constants.php"); ?>

<?php 
	if (isset($_POST['submit'])) {
		//echo "buttona basıldı";
		$id=$_POST["id"];
		$extra_name = $_POST['extra_name'];
		$extra_price = $_POST['extra_price'];



		$sql3 = "UPDATE tbl_product SET 
						product_name ='$extra_name',
						product_price ='$extra_price' 
						WHERE id=$id 
					";

					$res3 = mysqli_query($conn, $sql3);

					if ($res3 == true) {
						//veriler güncellendi
						 //echo "veriler güncellendi";
						$_SESSION['info-succes'] ="Produto atualizado com sucesso";
						header("location:".SITEURL."admin/extra-product.php");


					}
					else
					{
						//veriler güncellenemedi
						$_SESSION['info-error'] =" O produto nao foi atualizado";
						header("location:".SITEURL."admin/extra-product.php");

						 
					}




 

	}else{
		header("location:".SITEURL."admin/extra-product.php");
	}
 ?>