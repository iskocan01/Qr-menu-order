<?php include("../config/constants.php"); 

	/*
		Burada table no var ise burayı al yoksa sipariş veremez*********
	if (isset($_SESSION["table"])) {
		$table = $_SESSION['table'];
		 
	} else{
		header("location:".SITEURL);
		die();

	}*/

	$cart_id = $db->query("SELECT card_id FROM tbl_table_order ORDER BY id DESC LIMIT 1",PDO::FETCH_OBJ)->fetch();


	  
	 $cart_id = $cart_id->card_id + 1;

	 echo   $cart_id;

	if(isset($_SESSION["shoppingCart"])){ 
		$foods = $_SESSION["shoppingCart"]["foods"];
		$total_price = $_SESSION["shoppingCart"]["summary"];
		$table_no = $_SESSION['shoppingCart']["table_no"]; 
	}else{
		// todo burada sepetin boş olduğunu ve ürün eklemesi gerektiği söylemek zorundayız.
		echo "sepet boş ";
		die();
	}

	 

		$order_date = date("Y-m-d H:i:s");




	foreach($foods as $food => $value){ 

			$food_id = $value->id;
			$price = $value->price;
			$qty = $value->count;
			$total_price = $value->total_price;
			//$food_note = $value->note;  //food note henüz eklenmedi ve burayı daha sonrta ekleriz
			$extra_name = $value->extra;
			$extra_price = $value->extra_price;

			 

			$send_order = "INSERT INTO tbl_table_order SET
						card_id = ?,
						table_id =?,
						food_id = ?, 
						extra_name = ?,
						extra_price = ?,
						price = ?,
						qty = ?, 
						food_note = ?,
						total_price = ?, 
						statu = ?,
						table_number = ?,  
						order_date = ? 
						"; 
			
			$add_food = $db->prepare($send_order);
			$kontrol= $add_food->execute(array($cart_id,$table_no,$food_id,$extra_name,$extra_price,$price,$qty,"Food-Note-null",$total_price,"bekliyor...", $table_no, $order_date));

	
		}
		
			if ($kontrol) {
				$_SESSION['info-succes'] = "Recebemos o seu pedido. O número da sua mesa é ".$table_no.". O serviço será feito o mais rápido possível. Bom apetite";
				unset($_SESSION["shoppingCart"]); 
				header("location:".SITEURL."table-order");
			
				
			}else {
				$_SESSION['info-error'] = "Error!!! Try Again or Cal the waiter";
				header("location:".SITEURL."table-order");
				 
				}

				

?>