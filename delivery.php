<?php include("config/constants.php"); 

	/*
		Burada table no var ise burayı al yoksa sipariş veremez*********
	if (isset($_SESSION["table"])) {
		$table = $_SESSION['table'];
		 
	} else{
		header("location:".SITEURL);
		die();

	}*/

	$cart_id = $db->query("SELECT cart_id FROM tbl_food_order ORDER BY id DESC LIMIT 1",PDO::FETCH_OBJ)->fetch();


	  
	 $cart_id = $cart_id->cart_id + 1;

	 echo   $cart_id;

	if(isset($_SESSION["shoppingCart"])){ 
		$foods = $_SESSION["shoppingCart"]["foods"];
		$total_price = $_SESSION["shoppingCart"]["summary"];
		$customer = $_SESSION['shoppingCart']["customer"]; 
	}else{
		// todo burada sepetin boş olduğunu ve ürün eklemesi gerektiği söylemek zorundayız.
		echo "sepet boş ";
		die();
	}

	$add_cutomer = "INSERT INTO tbl_customer SET
		customer_full_name = ?,
		customer_number = ?,
		customer_email = ?,
		customer_mahalle = ?,
		customer_address = ?,
		customer_zip = ?
		";

		$add_new_cus = $db->prepare($add_cutomer);
		$kontrol = $add_new_cus->execute(array(      $customer["customer_full_name"],
														$customer["customer_number"],
														$customer["customer_email"],
														$customer["customer_mahalle"],
														$customer["customer_address"],
														$customer["customer_zip"]


													));

		if ($kontrol) {
			echo "tamamlandı";
		}else{
			echo "hata aldık";
		}

		$customer_id = $db->lastInsertId();

		$order_date = date("Y-m-d H:i:s");




	foreach($foods as $food => $value){ 

			$food_id = $value->id;
			$price = $value->price;
			$qty = $value->count;
			$total_price = $value->total_price;
			//$food_note = $value->note;  //food note henüz eklenmedi ve burayı daha sonrta ekleriz
			$extra_name = $value->extra;
			$extra_price = $value->extra_price;

			 

			$send_order = "INSERT INTO tbl_food_order SET
						cart_id = ?,
						customer_id =?,
						food_id = ?, 
						extra_name = ?,
						extra_price = ?,
						price = ?,
						qty = ?,
						order_note = ?,
						food_note = ?,
						total_price = ?,
						order_status = ?,
						payment_status = ?,
						order_type = ?,
						timed = ?,
						order_date = ? 
						"; 
			
			$add_food = $db->prepare($send_order);
			$kontrol= $add_food->execute(array($cart_id,$customer_id,$food_id,$extra_name,$extra_price,$price,$qty,"ordernote-null","Food-Note-null",$total_price,"bekliyor...","odeme sekli","order_type","timed",$order_date));

	
		}
		
		if ($kontrol) {
				//$_SESSION['siparis-durum'] = "<br><h3><div class='success text-center'> succes </div></h3>";
				unset($_SESSION["shoppingCart"]); 
				$_SESSION["info-succes"] = "<h2 class='text-center'>Seu pedido foi recebido</h2>";
				header("location:".SITEURL);
			
				
			}else {
				
					$_SESSION["info-error"] = "<h2 class='text-center'>Seu pedido não pôde ser recebido</h2>";
				header("location:".SITEURL);
			
				}

				

?>