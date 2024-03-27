<?php 
	  
	include "constants.php";
 

//SESSİON
		/*
		*foods

		*			Kedi Maması ...... 2 ...... 1000tl......200
		*			köpek Maması ...... 2 ...... 1000tl......200
		* 
		*Summary 
		*			2 adet ürün .....400
		*/

	function totalCart($foods){
		//sepetin hesaplanması
				$total_price = 0.0;
				$total_count = 0;
		
				// todo Buraya $db parametresi eklenecek ve sepetin bütün hesaplamaları buradan yapılacak..
		
				foreach ($foods as $food) {
					 $food->total_price = $food->count * ($food->price + $food->extra_price);
					 $total_price = $total_price + $food->total_price;
					 $total_count += $food->count;
					}
					$summary["total_price"]=$total_price;
					$summary["total_count"]=$total_count;

					$_SESSION['shoppingCart']["foods"] = $foods;
					$_SESSION['shoppingCart']["summary"] = $summary;
			 		print_r($foods);
					 return $total_count;
	}


	function addToCart($product_item, $product_ids){ 
		if (isset($_SESSION['shoppingCart'])) {
			$shoppingCart= $_SESSION['shoppingCart'];
			$foods = $shoppingCart["foods"]; 
		}else{
			$foods = array();

		}
		if (empty($foods)) {
				$foods[]=$product_item;
		}else{
			foreach ($foods as $key => $value) {
					if ($value->id == $product_item->id && $value->extra == $product_ids ) {
						 $durum = true;
						 $key = $key;
						 $value = $value;
						 break;
					}else{
						$durum = false;
					}
			}

			if ($durum == true) {
					$foods[$key]->count++;
			}else{
				$foods[] = $product_item;
			}
		}



		// Adet kontrollü
		/*
		if (array_key_exists($product_item->id, $foods)) {
				$foods[$product_item->id]->count++;
		}else{
			$foods[]= $product_item;
		}
		*/

			//sepetin hesaplanması
		/*	$total_price = 0.0;
			$total_count = 0;

			foreach ($foods as $food) {
				 $food->total_price = $food->count * $food->price;
				 $total_price = $total_price + $food->total_price;
				 $total_count += $food->count;

				 
			}
			$summary["total_price"]=$total_price;
			$summary["total_count"]=$total_count;

			$_SESSION['shoppingCart']["foods"] = $foods;
			$_SESSION['shoppingCart']["summary"] = $summary;
	 		print_r($foods);
			 return $total_count;

			 */
		 totalCart($foods);

	}


 
	function removeFromCart($product_id){
		if (isset($_SESSION["shoppingCart"])) {
			
			$shoppingCart = $_SESSION['shoppingCart'];
			$foods = $shoppingCart["foods"];

			//ürünü listeden cıkar
			if (array_key_exists($product_id, $foods)) {
				unset($foods[$product_id]);
			}
		}


		//tekrardan sepeti hesaplama işlemi****
		/*
		$total_price = 0.0;
		$total_count = 0;

		foreach ($foods as $food) {
			 $food->total_price = $food->count * $food->price;
			 $total_price = $total_price + $food->total_price;
			 $total_count += $food->count; 
		}

		$summary["total_price"] = $total_price;
		$summary["total_count"] = $total_count;

		$_SESSION['shoppingCart']["foods"] = $foods;
		$_SESSION['shoppingCart']["summary"] = $summary;

		return true;
		*/
		totalCart($foods);
	}




	function incCount($product_id){
		if (isset($_SESSION["shoppingCart"])) {
			
			$shoppingCart = $_SESSION['shoppingCart'];
			$products = $shoppingCart["foods"];

			//Addet Kntrolu

			if (array_key_exists($product_id, $products)) {
				$products[$product_id]->count++;
			} 

			//sepetin hesaplanması ....
			/*
			$total_price = 0.0;
			$total_count = 0;

			foreach ($products as $product) {
					$product->total_price = $product->count * $product->price;
					$total_price = $total_price + $product->total_price;
					$total_count += $product->count;
			}

			$summary["total_price"] = $total_price;
			$summary["total_count"] = $total_count;

			$_SESSION["shoppingCart"]["foods"] = $products;
			$_SESSION["shoppingCart"]["summary"] = $summary;
			*/
			totalCart($products);

			return true;
		}
	}





	function decCount($product_id){
		if (isset($_SESSION["shoppingCart"])) {
			
			$shoppingCart = $_SESSION['shoppingCart'];
			$products = $shoppingCart["foods"];

			//Addet Kntrolu

			if (array_key_exists($product_id, $products)) {
				$products[$product_id]->count--;
				 if(!$products[$product_id]->count > 0){
   					unset($products[$product_id]);
   }
			} 

			//sepetin hesaplanması ....
			/*
			$total_price = 0.0;
			$total_count = 0;

			foreach ($products as $product) {
					$product->total_price = $product->count * $product->price;
					$total_price = $total_price + $product->total_price;
					$total_count += $product->count;
			}

			$summary["total_price"] = $total_price;
			$summary["total_count"] = $total_count;

			$_SESSION["shoppingCart"]["foods"] = $products;
			$_SESSION["shoppingCart"]["summary"] = $summary;
			*/

			totalCart($products);

			return true;
		}
	}







if (isset($_POST["p"])) {
	
	$islem = $_POST["p"];

			if ($islem == "addToCart") { 
						$id= $_POST['product_id'];
						
						$food = $db->query("SELECT * FROM tbl_food WHERE id={$id}", PDO::FETCH_OBJ)->fetch();	 
						$food->count = 1;
						if(isset($_POST["checkedValues"])){
							$product_ids = $_POST["checkedValues"];
							 
						}else{
							$product_ids = ""; 
						}

						$arr = explode(",", $product_ids);
						$extra_price = 0;
						if(empty($arr)){
							$extra_price = 0;

						}else{
							foreach($arr as $product_id){	

								$extra_product = $db->query("SELECT * FROM tbl_product WHERE id ='$product_id' ",PDO::FETCH_OBJ)->fetchAll();
								if (count($extra_product) > 0) {
										 $extra_price = $extra_price + $extra_product[0]->product_price;
										  
								} 
							//	
								//print_r($extra_product);
								 
							}
						}
						 
						 


						$food->extra = $product_ids;
						$food->extra_price = $extra_price;
						 



				   echo addToCart($food, $product_ids);
						 
						 

				}


			elseif ($islem =="removeFromCart") {

						$id = $_POST["product_id"];	 

						echo	removeFromCart($id);
				}

}

if (isset($_GET["p"])) {
	
	$islem = $_GET["p"];

			if ($islem =="incCount") { 
						$id= $_GET['product_id'];

						if (incCount($id)) {
							header("location:../sepet.php");
						} 

				} elseif ($islem == "decCount") {
						$id= $_GET['product_id'];

						if (decCount($id)) {
							header("location:../sepet.php");
						} 
				} 

				elseif ($islem == "decCountTable") {
						$id= $_GET['product_id'];

						if (decCount($id)) {
							header("location:../table-order/sepet.php");
						}
				}

				elseif ($islem =="incCountTable") { 
						$id= $_GET['product_id'];

						if (incCount($id)) {
							header("location:../table-order/sepet.php");
						} 

				}
}



 //ADD to Cart
/*
*
*urun id al
*cart-db.php  dosyasına post et
*veri tabanından ürün bilgilerini al
*SESSİON daki sepete ekle
*Sepeti tekrardan hesapla
*
*/




  ?>