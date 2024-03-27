<?php include("../../config/constants.php"); 

if (isset($_POST["submit"])) { 
//Add the food in Database
					

					//1. Get the data from Form 
					$title = $_POST['title'];
					$description = $_POST['description'];
					$price	= $_POST['price'];
					$category = $_POST['category'];

					 

					// 2.Upload the image if slected
					// Check whether the select image is clicked or not and upload the image only  if the image is slected 
					if (isset($_FILES['image']['name']))////// ***************************************************************************** ************************** * **buradaki if bloğuna giremedik
					{
						//Get the details of the selected image

						$image_name= $_FILES['image']['name'];

						// check İmage selected or not and upload image only upload if  selected

						if ($image_name !="") 
						{ 
							// its main image is selected
							

							//A.Rename the image

							$parts = explode(".", $image_name);
							$ext = end($parts);

							 
							//Create a new name for image

							$image_name="Food-name-".$category."-".rand(0000,9999).".".$ext;

							//B.Upload the image

							//sourch path is the current location of the image 

							$src = $_FILES['image']['tmp_name'];

							//destinetion path for the image to be uploaded 
							$dst= "../../images/food/".$image_name;

							//finnaly upload the food image
							$upload = move_uploaded_file($src, $dst);

							//check whether image uploaded or not
							if ($upload==false) 
							{
								//Faild the upload image 	
								//redirect to Add food page with error message
								$_SESSION['upload'] = "<div class='error'> re Yüklenmedi</div>";

									//header("location:".SITEURL."admin/manage-food.php");
								//Stop the process
								die();
							}
							else
							{
								//Faild the upload image 	
								//redirect to Add food page with error message
								$_SESSION['upload'] = "<div class='success'>Resim dizine yüklendi</div>";

									//header("location:".SITEURL."admin/manage-food.php");
								//Stop the process	
								//die();
							}


						}
						else
						{
							//Faild the upload image 	
								//redirect to Add food page with error message
								$_SESSION['kontrol'] = "<div class='error'>image-name ye geğer atanmdı ve boş</div>";

								//	header("location:".SITEURL."admin/manage-food.php");
								//Stop the process	
								
						}

						
					}
					else 
					{
						$image_name=""; //setting defauld value as blank
						$_SESSION['kontrol'] = "<div class='success'> Hataa </div>";

									//header("location:".SITEURL."admin/manage-food.php");
								//Stop the process	
								die();
					}

					// 3.Insert  into Database

					//create a sql query to Save or add Food

					$sql2 = "INSERT INTO tbl_food SET 
					title ='$title',
					description ='$description',
					price = $price,
					image_name = '$image_name',
					category_id = $category ,
					active = 'Yes'
					";

					//execute Query

					$res2 = mysqli_query($conn, $sql2);

	if ($res2) {
		$_SESSION['info-succes'] = "<h3> A comida e adicionada </h3>";
		header("location:".SITEURL."admin/manage-food.php");
	}else {
	$_SESSION['info-error'] = "<h3> erro </h3>";
		header("location:".SITEURL."admin/manage-food.php");
	}
}
else {
	 	//BUttona basılmadığı zaman buraya geliyoruz..
		header("location:".SITEURL."admin/manage-food.php");
}

 

?>