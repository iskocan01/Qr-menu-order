<?php  
	include("../../config/constants.php");


	$foods = $db->query("SELECT * FROM tbl_food ", PDO::FETCH_OBJ)->fetchAll();

	echo "<pre>";

	print_r($foods);

	echo "<pre>";
	$sn=0;
	foreach ($foods as $food ) {
		$sn++;
		$id=$food->id;
		//echo "bu yemeğin sırası = ". $food->sira."<br>";
		$sql = "UPDATE tbl_food SET 
						sira ='$sn' WHERE id=$id 
					";

		$res = mysqli_query($conn, $sql);

		if ($res == true ) {
			echo $food->title ."yemek sıra no güncellendi = " . $id. "<br>";
		}else{
			echo "yemek güncellenmedi ";
		}
	}

	 ?>