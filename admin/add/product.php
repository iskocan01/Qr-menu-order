<?php  include("../../config/constants.php"); 

		if (isset($_POST["submit"])) {
			$extra_name = $_POST['extra_name'];
			$extra_price = $_POST["extra_price"];
			$extra_category = $_POST["product_category"];






			echo "name = ".$extra_name."<br>";

			echo "price = ".$extra_price."<br>";


			echo "categrory = ".$extra_category."<br>";
		

		$sql2 = "INSERT INTO tbl_product SET 
					product_name ='$extra_name',
					product_price ='$extra_price',
					product_category = '$extra_categort',
					product_active = 'Yes' 
					";

					//execute Query

					$res2 = mysqli_query($conn, $sql2);

	if ($res2) {
		$_SESSION['info-succes'] = "<h3> O produto e adicionado </h3>";
		header("location:".SITEURL."admin/extra-product.php");
	}else {
	$_SESSION['info-error'] = "<h3> O produto e adicionado </h3>";
		header("location:".SITEURL."admin/extra-product.php");
	}
}
else {
	 	//BUttona basılmadığı zaman buraya geliyoruz..
		header("location:".SITEURL."admin/extra-product.php");
}

 

?>
 ?>