<?php 

	class productData{
		public function getProduct($category_id, $db){
			$products = $db->query("SELECT * FROM tbl_product WHERE product_category = '$category_id' ", PDO::FETCH_OBJ)->fetchAll();
			return $products;
		}

		public function getProductName($product_id, $db){
			$product_name = $db->query("SELECT product_name FROM tbl_product WHERE id = '$product_id '", PDO::FETCH_OBJ)->fetch();
			return $product_name;
		}

		 
	}





	class categoryData{
		public function getCategories($db){
			$categories = $db->query("SELECT * FROM tbl_category", PDO::FETCH_OBJ)->fetchAll();
			return $categories;
		}

		public function getCategory($id, $db){
			$category = $db->query("SELECT * FROM tbl_category WHERE id = '$id' ", PDO::FETCH_OBJ)->fetchAll();
			
			return $category;
		}
	}


	class cartOrderData{
		public function getTotalPrice($cart_id, $db){
			$price = 0;
			$total = $db->query("SELECT * FROM tbl_food_order WHERE cart_id = '$cart_id' ", PDO::FETCH_OBJ)->fetchAll();
			foreach ($total as $food ) {
			 $price +=  $food->total_price;
			}
			return $price;
		}


		public function getCountCart($cart_id, $db){
			$count = 0;
			$total = $db->query("SELECT * FROM tbl_food_order WHERE cart_id = '$cart_id' ", PDO::FETCH_OBJ)->fetchAll();
			foreach ($total as $food ) {
			 $count +=  $food->qty;
			}
			return $count;
		}


		public function getAllCart($cart_id, $db){
			
			$foods = $db->query("SELECT * FROM tbl_food_order WHERE cart_id = '$cart_id' ", PDO::FETCH_OBJ)->fetchAll(); 
			return $foods;
		}
	}



	class cartTableData{

		public function getTotalPrice($cart_id, $db){
			$price = 0;
			$total = $db->query("SELECT * FROM tbl_table_order WHERE card_id = '$cart_id' ", PDO::FETCH_OBJ)->fetchAll();
			foreach ($total as $food ) {
			 $price +=  $food->total_price;
			}
			return $price;
		}


		public function getCountCart($cart_id, $db){
			$count = 0;
			$total = $db->query("SELECT * FROM tbl_table_order WHERE card_id = '$cart_id' ", PDO::FETCH_OBJ)->fetchAll();
			foreach ($total as $food ) {
			 $count +=  $food->qty;
			}
			return $count;
		}


		public function getAllCart($cart_id, $db){
			
			$foods = $db->query("SELECT * FROM tbl_table_order WHERE card_id = '$cart_id' ", PDO::FETCH_OBJ)->fetchAll(); 
			return $foods;
		}



/* Burada cartların iki farklı versiyonlarını kullanamlıyız ....

		public function getTotalPrice($cart_id, $db){
			$price = 0;
			$total = $db->query("SELECT * FROM tbl_food_order WHERE cart_id = '$cart_id' ", PDO::FETCH_OBJ)->fetchAll();
			foreach ($total as $food ) {
			 $price +=  $food->total_price;
			}
			return $price;
		}


		public function getCountCart($cart_id, $db){
			$count = 0;
			$total = $db->query("SELECT * FROM tbl_food_order WHERE cart_id = '$cart_id' ", PDO::FETCH_OBJ)->fetchAll();
			foreach ($total as $food ) {
			 $count +=  $food->qty;
			}
			return $count;
		}


		public function getAllCart($cart_id, $db){
			
			$foods = $db->query("SELECT * FROM tbl_food_order WHERE cart_id = '$cart_id' ", PDO::FETCH_OBJ)->fetchAll(); 
			return $foods;
		}


		*/
	}






	//Burası Masa  sipariş için güncellenen adımlar*************
	class tableOrderStatus{
		public function orderStatusUpdate($cart_id, $db){
			$cart = $db->query("SELECT statu FROM tbl_table_order WHERE card_id = '$cart_id' ", PDO::FETCH_OBJ)->fetchAll();
			$status = $cart[0]->statu;

			if($status == "bekliyor..."){
				$status ="hazırlanıyor...";
			}elseif($status == "hazırlanıyor..."){
				$status = "teslim...";
			} 

			$sql = "UPDATE tbl_table_order SET statu = :value WHERE card_id = :id";
			$stmt = $db->prepare($sql);
			$stmt->bindValue(':value', $status, PDO::PARAM_STR);
			$stmt->bindValue(':id', $cart_id, PDO::PARAM_INT);
			$stmt->execute();
			 
		}
		public function tableOrderAddTable($table_no, $cart_id, $db){
			$sql = "UPDATE tbl_table_order SET table_number = :value WHERE card_id = :id";
			$stmt = $db->prepare($sql);
			$stmt->bindValue(':value', $table_no , PDO::PARAM_INT);
			$stmt->bindValue(':id', $cart_id, PDO::PARAM_INT);
			$stmt->execute();
		}
		public function ordercancel($cart_id, $db){
			$sql = "UPDATE tbl_table_order SET statu = :value WHERE card_id = :id";
			$stmt = $db->prepare($sql);
			$stmt->bindValue(':value', "iptal", PDO::PARAM_STR);
			$stmt->bindValue(':id', $cart_id, PDO::PARAM_INT);
			$stmt->execute();
		}
		public function tableStatusUpdate($table_no, $db){
			$sql = "UPDATE tbl_table SET status = :value WHERE id = :id";
			$stmt = $db->prepare($sql);
			$stmt->bindValue(':value', "bussy", PDO::PARAM_STR);
			$stmt->bindValue(':id', $table_no, PDO::PARAM_INT);
			$stmt->execute();
		}

		public function getTableNo($cart_id, $db){
			$table_no = $db->query("SELECT table_id FROM tbl_table_order WHERE card_id = '$cart_id' ", PDO::FETCH_OBJ)->fetchAll();
			return $table_no[0];
		}

	}

	class tableUpdate{
		public function cleanTable($table_id, $db){
			$sql = "UPDATE tbl_table SET status = :value, cart_ids = NULL WHERE id = :id";
			$stmt = $db->prepare($sql);
			$stmt->bindValue(':value', "active", PDO::PARAM_STR);
			$stmt->bindValue(':id', $table_id, PDO::PARAM_INT);
			$stmt->execute();
		}
		public function addCartId($table_id, $cart_id, $db){
			$check_sql = "SELECT cart_ids FROM tbl_table WHERE id = :id";
			$stmt = $db->prepare($check_sql);
			$stmt->bindValue(':id', $table_id, PDO::PARAM_INT);
    		$stmt->execute();

    		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		    $current_cart_ids = $result['cart_ids'];
		    
		    if (!empty($current_cart_ids)) {
		        $cart_id = "," . $cart_id;
		    }


			
			$sql = "UPDATE tbl_table SET status = :value, cart_ids = CONCAT(cart_ids, '$cart_id') WHERE id = :id";
			$stmt = $db->prepare($sql);
			$stmt->bindValue(':value', "bussy", PDO::PARAM_STR);
			$stmt->bindValue(':id', $table_id, PDO::PARAM_INT);
			$stmt->execute();
		}
	}


	//Burası Normal sipariş için güncellenen adımlar*************
	class orderStatus{
		public function orderStatusUpdate($cart_id, $db){
			$cart = $db->query("SELECT order_status FROM tbl_food_order WHERE cart_id = '$cart_id' ", PDO::FETCH_OBJ)->fetchAll();
			$status = $cart[0]->order_status;

			if($status == "bekliyor..."){
				$status ="hazırlanıyor...";
			}elseif($status == "hazırlanıyor..."){
				$status = "yolda...";
			} elseif($status == "yolda..."){
				$status = "teslim...";
			}

			$sql = "UPDATE tbl_food_order SET order_status = :value WHERE cart_id = :id";
			$stmt = $db->prepare($sql);
			$stmt->bindValue(':value', $status, PDO::PARAM_STR);
			$stmt->bindValue(':id', $cart_id, PDO::PARAM_INT);
			$stmt->execute();
			if ($stmt) {
				$_SESSION['info-succes'] = "<h2 class='text-center'>Succesfuly</h2> ";
				 
			}
			else
			{
				$_SESSION['info-error'] = "<h2 class='text-center'>Error</h2> ";
			}
			 
		}

		public function ordercancel($cart_id, $db){
			$sql = "UPDATE tbl_food_order SET order_status = :value WHERE cart_id = :id";
			$stmt = $db->prepare($sql);
			$stmt->bindValue(':value', "iptal", PDO::PARAM_STR);
			$stmt->bindValue(':id', $cart_id, PDO::PARAM_INT);
			$stmt->execute();
		}
	}















	class foodData{

		public function getFood($food_id, $db){
			$foods = $db->query("SELECT * FROM tbl_food WHERE id = '$food_id' ", PDO::FETCH_OBJ)->fetchAll();
			return $foods; 
		}

		public function getFoodName($food_id, $db){
			$food = $db->query("SELECT title FROM tbl_food WHERE id = '$food_id' ", PDO::FETCH_OBJ)->fetch();
			return $food; 
		}
		public function getFoodCategoryId($food_id, $db){
			$food = $db->query("SELECT category_id FROM tbl_food where id ='$food_id'", PDO::FETCH_OBJ)->fetchAll();
			return $food;

		}

	}



	class customerData{

		public function getCustomerAllInformation($id, $db){
			$customers = $db->query("SELECT * FROM tbl_customer WHERE id = '$id' ", PDO::FETCH_OBJ)->fetch();
			return $customers;
		}


		//aşağısı eski kodlar dır*********************************************************
		public function getCustomerNumber($id, $db){
			$customers = $db->query("SELECT * FROM tbl_customer WHERE id = '$id' ", PDO::FETCH_OBJ)->fetch();
			return $customers->customer_number;
		}


		public function getName($id,$conn){
			$sql = "SELECT * FROM tbl_customer WHERE id = '$id'";
			$res = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($res);
			$name = $row['customer_full_name'];
			return $name;
		}

		public function getNumber($id,$conn){
			$sql = "SELECT * FROM tbl_customer WHERE id = '$id'";
			$res = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($res);
			$name = $row['customer_number'];
			return $name;
		} 


		public function getEmail($id,$conn){
			$sql = "SELECT * FROM tbl_customer WHERE id = '$id'";
			$res = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($res);
			$name = $row['customer_email'];
			return $name;
		}

		public function getMahalle($id,$conn){
			$sql = "SELECT * FROM tbl_customer WHERE id = '$id'";
			$res = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($res);
			$name = $row['customer_mahalle'];
			return $name;
		}


		public function getAddress($id,$conn){
			$sql = "SELECT * FROM tbl_customer WHERE id = '$id'";
			$res = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($res);
			$name = $row['customer_address'];
			return $name;
		}

		public function getFoodName($food_id,$conn){
			$sql = "SELECT * FROM tbl_food WHERE id='$food_id'";
			$res = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($res);
			$name = $row['title'];
			return $name;
		}


	}

 ?>