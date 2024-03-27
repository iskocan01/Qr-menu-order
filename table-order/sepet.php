<?php include("partials-front/menu.php"); ?>

<?php 
		
			if (isset($_SESSION["shoppingCart"]) ) {
				 $cart = $_SESSION["shoppingCart"];
				  
				 $foods = $cart["foods"];
				 $summuray = $cart["summary"];

				/* echo "<pre>";
				 print_r($foods);
				 echo "</pre>";
 				*/
				 
			?>
 <div class="container">
 	<div class="row">
 		<h1 class="text-center">Card</h1>
 		<?php 

 				foreach ($foods as $value => $food) {
 					// code...
 				

 		 ?>
 		<div class="col-xl-4 p-2 ">
    			  		
    			  	<div class="card p-2 " style="width: 100%;">
    			  		<div class="row">
    			  			<div class="col-4">
    			  				<img src="<?php echo SITEURL."images/food/".$food->image_name; ?>" class="card-img-top" alt="<?php echo $food->title; ?>"> 
    			  			</div>
    			  			<div class="col-8">
    			  				<div class="card-body">

									    <h5 class="card-title"><?php echo $food->title; ?></h5>
									    <p class="card-text"><?php echo $food->description; ?></p>
									    
									    <p><?php
									    	if ($food->food_content != "" || $food->food_content != null) {
									    		$extra = $food->extra;
									    		if ($extra != "") {
									    			// code...
			                                                    $arr = explode(",", $extra);
			                                                     

			                                                    foreach($arr as $product){
			                                                        $extra_product = $db->query("SELECT * FROM tbl_product WHERE id='$product' ", PDO::FETCH_OBJ)->fetchAll();
			                                                        
			                                                         $diz=$extra_product[0];
			                                                        echo "+com ". $diz->product_name." (".$diz->product_price." R$ )<br>";
			                                                    }
									    		}
									    	}  ?>
									    		
									    </p>

									     <div class="row ">
			                                                     <div class="col-3 ">
			                                                        <a href="<?php echo SITEURL; ?>config/cart-db.php?p=decCountTable&product_id=<?php echo $value; ?>" class=" btn text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-dash-square" viewBox="0 0 16 16">
			                                                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
			                                                        <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
			                                                        </svg></a>
			                                                      </div> 
			                                                    <div class="col-2 "><p class="food-detail"><?php echo  $food->count; ?></p></div>
			                                                    <div class="col-3">
			                                                        <a href="<?php echo SITEURL; ?>config/cart-db.php?p=incCountTable&product_id=<?php echo $value; ?>" class="btn  text-success"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
			                                                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
			                                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
			                                                            </svg></a>
			                                                    </div>
			                                                    <div class="col-4 rounded-4  "> <strong><p class="mt-2 card-title text-center">Total R$ <?php echo  $food->total_price?></p></strong></div>
			                                                     
			                                                </div> 
			                                                <div class="position-relative">
			                                                	<button product-id="<?php echo $value; ?>" class="btn btn-danger removeFromCartBtn float-end">Excluir</button>
			                                                </div> 
									    
									  </div>
    			  			</div>
    			  		</div>

							  


							</div>

    			  	</div>
    		<?php } //Foreach döngüsünün bittiği yer burası*******************

    		?>

 	</div>
 	<div class="row">
 		<h4 class="text-center">Preco total = R$ <?php echo $summuray["total_price"]." "; ?> </h4>
 		<br>
 		
 		<a href="<?php echo SITEURL."table-order/delivery.php"; ?>" class="btn btn-primary m-4 p-2">Pedir</a>
 	</div>
 	<br>
 </div>





<?php if (isset($_POST["submit"])) {

	 

	if ($_SESSION['shoppingCart']) {
		 $table_no = 

		 $customer["customer_full_name"] = $full_name;
		 $customer["customer_number"] = $number;
		 $customer["customer_email"] = $email;
		 $customer["customer_mahalle"]= $neighbourdhood;
		 $customer["customer_address"] = $city;
		 $customer["customer_zip"] = $zip;

		 $_SESSION['shoppingCart']['customer'] = $customer;

		 header("location:".SITEURL."table-order/delivery.php");

	}else{
		echo "burası hata anlamına gelir sepete eklediğimiz ürünler var ama cerezlere kaydedilmemiştir";
	}

 
	 
		
} 

 ?>

			<?php


			/*
		for ($i=0; $i < 20; $i++) { 
			echo $i+1 ."<br>";
			echo "domain";
		}



*/


			}else{
				echo "<h1 class='text-center'>There is no food Add  Food to cart</h1>";
			}
 ?>


 <?php include("partials-front/footer.php"); ?>