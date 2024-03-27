<?php 
	include("../../config/constants.php");

	if (isset($_POST["submit"])) {
			$id = $_POST["id"];
		 $title = $_POST['title'];
		 $description = $_POST["description"];
		 $price = $_POST["price"];
		 $category_id = $_POST["category"];

		 $current_sira_no = $_POST['current-sira-no'];
		 $sira_no = $_POST['sira-no'];



		
		 $current_image = $_POST["current_image"];

		 	if(isset($_POST['product_checkbox'])){
						$food_content = $_POST['product_checkbox'];
					$string = implode(",", $food_content);
					$food_content = $string;
				}else{
					$food_content = "";
				}



		 
		 

		

		 if (isset($_FILES["image"]["name"])) {

		 	 $new_image = $_FILES['image']['name'];
		 	 if ($new_image != "") {

		 	 	 $part = explode(".",$new_image);
		 	 	 $ext = end($part);
				$new_image ="Food-name-".$category_id."-".rand(0000,9999).".".$ext;
				$source_path = $_FILES['image']['tmp_name'];
				$destination_path = "../../images/food/".$new_image;
				$upload = move_uploaded_file($source_path, $destination_path);

				if ($upload == false) {
					$_SESSION['info-error']="İmage could not upload folder";
					echo "image couldnt upload to the folder";
					die();
				} 

				if ($current_image != "") {
					$remove_path = "../../images/food/".$current_image;
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
		 // 4. yemekği veri tabanın da güncelle

					$sql3 = "UPDATE tbl_food SET 
						sira = $sira_no,
						title ='$title',
						description ='$description',
						food_content = '$food_content',
						price =$price,
						image_name ='$new_image',
						category_id ='$category_id' 
						WHERE id=$id 
					";

					$res3 = mysqli_query($conn, $sql3);

					if ($res3 == true) {
						//veriler güncellendi
						 //echo "veriler güncellendi";

				/*		if ($current_sira_no != $sira_no) {
						 	
						 	try {

							 	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

							 	 // Sıra numarasından sonraki tüm satırların sıra numaralarını bir artırma

							 	$stmt = $db->prepare("SELECT sira FROM tbl_food ORDER BY sira");
							 	$stmt->execute();
							 	$sira_numaralari = $stmt->fetchAll(PDO::FETCH_COLUMN);

							 	$sn=1;

							 	 foreach ($sira_numaralari as $value) {
							        if ($value != $sn) {
							            $stmt = $db->prepare("UPDATE tbl_food SET sira = :sira WHERE sira = :eski_sira_no");
							            $stmt->bindParam(':sira', $sn);
							            $stmt->bindParam(':eski_sira_no', $current_sira_no);
							            $stmt->execute();

							            echo "burası değişti = ".$sn;
							        }
							        $sn++;
							    }


							    $stmt = $db->prepare("UPDATE tbl_food SET sira = sira + 1 WHERE sira >= :eski_sira_no");
							    $stmt->bindParam(':eski_sira_no', $current_sira_no);
							    $stmt->execute();

							     echo "Güncelleme işlemi başarıyla tamamlandı.";

							 	echo "yeni sira"; $sira; 

						 	} catch (PDOException $e) {
						 		echo "Hata: " . $e->getMessage();
						 	}



						}else{
							echo "sira no değişmedi.";
						}
				*/


						$_SESSION['info-succes'] ="Sucesso alimentar atualizado";
						header("location:".SITEURL."admin/manage-food.php");


					}
					else
					{
						//veriler güncellenemedi
						$_SESSION['info-error'] ="nao foi possivel atualizar o alimento com sucesso";
						header("location:".SITEURL."admin/manage-food.php");

						 
					}
		  


//burada güncellenen yemek bilgilerini alabiliyoruz. şimdide veri tabanına kayıt edebiliriz
		 echo "yemeğin id si = ". $id;
		 echo $description."<br>"; 
		 echo "price = ".$price."<br>";
		 echo "image name = ".$new_image."<br>";
		 echo "  current image name = ".$current_image."<br>";
		 echo "category is = ". $category_id ."<br>";



	}
 ?>