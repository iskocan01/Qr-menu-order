<?php 	include("../../config/constants.php"); ?>


<?php 
	
	if (isset($_POST['update'])) {
		//echo "buttona basıldı";
		$category_id = $_POST['category_id'];
		$category_title = $_POST['title'];
		$current_image = $_POST['current_image'];


		// 3.burada yeni resim olup olmadığı kontrol edeceğiz
		 if (isset($_FILES["category-image"]["name"])) {

		 	 $new_image = $_FILES['category-image']['name'];
		 	 if ($new_image != "") {

		 	 	 $part = explode(".",$new_image);
		 	 	 $ext = end($part);
				$new_image ="Food-Category-".rand(0000,9999).".".$ext;
				$source_path = $_FILES['category-image']['tmp_name'];
				$destination_path = "../../images/category/".$new_image;
				$upload = move_uploaded_file($source_path, $destination_path);

				if ($upload == false) {
					$_SESSION['info-error']="A imagem nao pode carregar a pasta";
					//echo "image couldnt upload to the folder";
					die();
				} 

				if ($current_image != "") {
					$remove_path = "../../images/category/".$current_image;
					$remove = unlink($remove_path);
					if ($remove == false) {
						$_SESSION['info-error'] = "a imagem nao pode ser excluida da pasta";
					}
				}

		 	 }
		 	 else  // Burada filles iimage ile hiç bir dopsya secilmediği gösteriyor
		 	 {
		 	 	$new_image = $current_image;
		 	 }

		 }


		 // 4.veritabanı güncelleme

					$sql3 = "UPDATE tbl_category SET 
						title ='$category_title',   
						image_name ='$new_image' 
						WHERE id=$category_id 
					";

					$res3 = mysqli_query($conn, $sql3);

					if ($res3 == true) {
						//veriler güncellendi
						 //echo "veriler güncellendi";
						$_SESSION['info-succes'] ="Categoria atualizada com sucesso";
						header("location:".SITEURL."admin/manage-category.php");


					}
					else
					{
						//veriler güncellenemedi
						$_SESSION['info-error'] =" nao foi possível atualizar a categoria com sucesso";
						header("location:".SITEURL."admin/manage-category.php");

						 
					}
		  


	}
	else{
		header("location:".SITEURL."admin/manage-category.php");
	}

 ?>