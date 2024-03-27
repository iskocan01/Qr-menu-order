<?php include("partials-front/menu.php"); ?>

<?php if (isset($_GET['id'])) {
	//echo $_GET['id'];
	$category_id = $_GET['id'];
	$foods = $db->query("SELECT * FROM tbl_food WHERE category_id='$category_id' ",PDO::FETCH_OBJ)->fetchAll();

	?>
		<div class="container-fluid">
			<div class="row">
				
				<?php 
					foreach ($foods as $food ) {
						?>
							<div class="card" style="width: 18rem;">
							  <img class="<?php echo SITEURL; ?>images/food/<?php echo $food->image_name; ?>" src="<?php echo SITEURL; ?>images/food/<?php echo $food->image_name; ?>" alt="<?php echo $food->title; ?>">
							  <div class="card-body">
							    <h5 class="card-title"><?php echo $food->title; ?></h5>
							    <p class="card-text bold">R$ <?php echo $food->price; ?></p>
							    <p class="card-text"><?php echo $food->description; ?></p>


							     <?php 

							     //Burasıı sepete ekleme buttonu başlangıcı
                            
                                if ($food->food_content == "") {
                                    ?>
                                        <button class="btn btn-primary addToCartBtn" product-id="<?php echo $food->id; ?>">Pedir</button>
                                    <?php
                                }else{
                                    ?>
                                          <!-- Button extra eklemek için modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#extra-product-<?php echo $food->id ?>">
                                  Pedir
                                </button>

                                <!-- Modal   extraların gösterildiği  button  -->
									<div class="modal fade" id="extra-product-<?php echo $food->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h1 class="modal-title fs-5" id="exampleModalLabel">Gostaria de adicionar produtos extras?</h1>
									        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									      </div>
									      <div class="modal-body">
									          <?php 
									           
									             $food_content = explode(",", $food->food_content);
									             foreach ($food_content as $product) {
									                 $productData = $db->query("SELECT * FROM tbl_product WHERE id = '$product' ",PDO::FETCH_OBJ)->fetchAll();

									                   ?>
									                                                 
									                                                <div class="form-check">
									                                                    <input class="form-check-input" type="checkbox" name="product-<?php echo $food->id; ?>" value="<?php echo $product; ?>" id="flexCheckDefault">
									                                                    <label class="form-check-label" for="flexCheckDefault">
									                                                        com <?php echo $productData[0]->product_name."  (+R$ ".$productData[0]->product_price ." )"; ?> 
									                                                    </label>
									                                                </div>
									                                                <?php

									             }

									          ?>
									      </div>
									      <div class="modal-footer">
									        <button class="btn btn-primary addToCartBtn" product-id="<?php echo $food->id; ?>">Pedir</button>
									        
									      </div>
									    </div>
									  </div>
									</div>

                            
                                    <?php
                                }

                                //Burası Button için gerekli kodun bitişidir**************************************
                             ?>



							  </div>
							</div>
						<?php
					}
				 ?>
			</div>
		</div>
	<?php

}elseif(isset($_GET['p'])){
	if ($_GET["p"]=="icecekler") {
		//echo "Buraya içecekler gelecek";
		?>

		<div class="container">
			<div class="row">
				<h2 class="  mt-3">Bebidas Frias</h2>
				<?php 
									$id = Sogukicecek;
									$foods = $db->query("SELECT * FROM tbl_food WHERE category_id = '$id' ",PDO::FETCH_OBJ)->fetchAll();
									foreach ($foods as $food ) {
										?>
										
										 
										 <div class="col-md-4 col-6">
									        <div class="card">
									          <img src="<?php echo SITEURL ;?>images/food/<?php echo $food->image_name; ?>" class="card-img-top" alt="Food 1">
									          <div class="card-body">
									            <h5 class="card-title"><?php echo $food->title; ?></h5>
									            <p class="card-text"><?php echo $food->description; ?></p>
									            <p class="card-text">R$ <?php echo $food->price; ?></p>
									          </div>
									          <div class="card-body">
									          	<?php 
					                                if ($food->food_content == "") {
					                                    ?>
					                                        <button class="btn btn-primary addToCartBtn" product-id="<?php echo $food->id; ?>">Pedir</button>
					                                    <?php
					                                }else{
					                                    ?>
					                                          <!-- Button extra eklemek için modal -->
					                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#extra-product-<?php echo $food->id ?>">
					                                  Pedir
					                                </button>

					                                <!-- Modal   extraların gösterildiği  button  -->
														<div class="modal fade" id="extra-product-<?php echo $food->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
														  <div class="modal-dialog">
														    <div class="modal-content">
														      <div class="modal-header">
														        <h1 class="modal-title fs-5" id="exampleModalLabel">Gostaria de adicionar produtos extras?</h1>
														        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														      </div>
														      <div class="modal-body">
														          <?php 
														           
														             $food_content = explode(",", $food->food_content);
														             foreach ($food_content as $product) {
														                 $productData = $db->query("SELECT * FROM tbl_product WHERE id = '$product' ",PDO::FETCH_OBJ)->fetchAll();

														                   ?>
														                                                 
														                                                <div class="form-check">
														                                                    <input class="form-check-input" type="checkbox" name="product-<?php echo $food->id; ?>" value="<?php echo $product; ?>" id="flexCheckDefault">
														                                                    <label class="form-check-label" for="flexCheckDefault">
														                                                        com <?php echo $productData[0]->product_name."  (+R$ ".$productData[0]->product_price ." )"; ?> 
														                                                    </label>
														                                                </div>
														                                                <?php

														             }

														          ?>
														      </div>
														      <div class="modal-footer">
														        <button class="btn btn-primary addToCartBtn" product-id="<?php echo $food->id; ?>">Pedir</button>
														        
														      </div>
														    </div>
														  </div>
														</div>

					                            
					                                    <?php
					                                }
					                             ?>






									          </div>
									        </div>
									      </div>



										<?php
									}
								 ?>
				<h2 class=" mt-3">Bebidas Quentes</h2>
				<?php 
									$id = Sicakicecek;
									$foods = $db->query("SELECT * FROM tbl_food WHERE category_id = '$id' ",PDO::FETCH_OBJ)->fetchAll();
									foreach ($foods as $food ) {
										?>
										
										 
										 <div class="col-md-4 col-6">
									        <div class="card">
									          <img src="<?php echo SITEURL ;?>images/food/<?php echo $food->image_name; ?>" class="card-img-top" alt="Food 1">
									          <div class="card-body">
									            <h5 class="card-title"><?php echo $food->title; ?></h5>
									            <p class="card-text"><?php echo $food->description; ?></p>
									            <p class="card-text">R$ <?php echo $food->price; ?></p>
									          </div>
									          <div class="card-body">
									          	<?php 
					                                if ($food->food_content == "") {
					                                    ?>
					                                        <button class="btn btn-primary addToCartBtn" product-id="<?php echo $food->id; ?>">Pedir</button>
					                                    <?php
					                                }else{
					                                    ?>
					                                          <!-- Button extra eklemek için modal -->
					                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#extra-product-<?php echo $food->id ?>">
					                                  Pedir
					                                </button>

					                                <!-- Modal   extraların gösterildiği  button  -->
														<div class="modal fade" id="extra-product-<?php echo $food->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
														  <div class="modal-dialog">
														    <div class="modal-content">
														      <div class="modal-header">
														        <h1 class="modal-title fs-5" id="exampleModalLabel">Gostaria de adicionar produtos extras?</h1>
														        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														      </div>
														      <div class="modal-body">
														          <?php 
														           
														             $food_content = explode(",", $food->food_content);
														             foreach ($food_content as $product) {
														                 $productData = $db->query("SELECT * FROM tbl_product WHERE id = '$product' ",PDO::FETCH_OBJ)->fetchAll();

														                   ?>
														                                                 
														                                                <div class="form-check">
														                                                    <input class="form-check-input" type="checkbox" name="product-<?php echo $food->id; ?>" value="<?php echo $product; ?>" id="flexCheckDefault">
														                                                    <label class="form-check-label" for="flexCheckDefault">
														                                                        com <?php echo $productData[0]->product_name."  (+R$ ".$productData[0]->product_price ." )"; ?> 
														                                                    </label>
														                                                </div>
														                                                <?php

														             }

														          ?>
														      </div>
														      <div class="modal-footer">
														        <button class="btn btn-primary addToCartBtn" product-id="<?php echo $food->id; ?>">Pedir</button>
														        
														      </div>
														    </div>
														  </div>
														</div>

					                            
					                                    <?php
					                                }
					                             ?>






									          </div>
									        </div>
									      </div>


										<?php
									}
								 ?>

				<h2 class=" mt-3">Bebidas Alcoolicas</h2>
				<?php 
									$id = Alkolluicecek;
									$foods = $db->query("SELECT * FROM tbl_food WHERE category_id = '$id' ",PDO::FETCH_OBJ)->fetchAll();
									foreach ($foods as $food ) {
										?>
										
										 
										 <div class="col-md-4 col-6">
									        <div class="card">
									          <img src="<?php echo SITEURL ;?>images/food/<?php echo $food->image_name; ?>" class="card-img-top" alt="Food 1">
									          <div class="card-body">
									            <h5 class="card-title"><?php echo $food->title; ?></h5>
									            <p class="card-text"><?php echo $food->description; ?></p>
									            <p class="card-text">R$ <?php echo $food->price; ?></p>
									          </div>
									          <div class="card-body">
									          	<?php 
					                                if ($food->food_content == "") {
					                                    ?>
					                                        <button class="btn btn-primary addToCartBtn" product-id="<?php echo $food->id; ?>">Pedir</button>
					                                    <?php
					                                }else{
					                                    ?>
					                                          <!-- Button extra eklemek için modal -->
					                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#extra-product-<?php echo $food->id ?>">
					                                  Pedir
					                                </button>

					                                <!-- Modal   extraların gösterildiği  button  -->
														<div class="modal fade" id="extra-product-<?php echo $food->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
														  <div class="modal-dialog">
														    <div class="modal-content">
														      <div class="modal-header">
														        <h1 class="modal-title fs-5" id="exampleModalLabel">Gostaria de adicionar produtos extras?</h1>
														        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														      </div>
														      <div class="modal-body">
														          <?php 
														           
														             $food_content = explode(",", $food->food_content);
														             foreach ($food_content as $product) {
														                 $productData = $db->query("SELECT * FROM tbl_product WHERE id = '$product' ",PDO::FETCH_OBJ)->fetchAll();

														                   ?>
														                                                 
														                                                <div class="form-check">
														                                                    <input class="form-check-input" type="checkbox" name="product-<?php echo $food->id; ?>" value="<?php echo $product; ?>" id="flexCheckDefault">
														                                                    <label class="form-check-label" for="flexCheckDefault">
														                                                        com <?php echo $productData[0]->product_name."  (+R$ ".$productData[0]->product_price ." )"; ?> 
														                                                    </label>
														                                                </div>
														                                                <?php

														             }

														          ?>
														      </div>
														      <div class="modal-footer">
														        <button class="btn btn-primary addToCartBtn" product-id="<?php echo $food->id; ?>">Pedir</button>
														        
														      </div>
														    </div>
														  </div>
														</div>

					                            
					                                    <?php
					                                }
					                             ?>






									          </div>
									        </div>
									      </div>


										<?php
									}
								 ?>

			</div>
		</div>

		<!--
		<div class="container-fluid ">
			<div class="row">	
		
				<h2 class="  mt-3">Bebidas Frias</h2>
					<div class="body-cart">

						<div class="wrapper">

							<i id="left" class="fa-solid fa-angle-left"></i>
							<div class="carousel">
								<?php 
									$foods = $db->query("SELECT * FROM tbl_food WHERE category_id = 28",PDO::FETCH_OBJ)->fetchAll();
									foreach ($foods as $food ) {
										?>
										
											<a href="<?php echo SITEURL;?>food-detail.php?id=<?php echo $food->id; ?>">
												<div class="img ">
													<img src="<?php echo SITEURL ;?>images/food/<?php echo $food->image_name; ?>">
													<h2><?php echo $food->title; ?></h2>
													R$ <?php echo $food->price; ?> 
													<div>
														 
													</div>

												</div>
											</a>

										



										<?php
									}
								 ?>
								
							</div>
							<i id="right" class="fa-solid fa-angle-right"></i>
						</div>			
					</div>
				</div> 

				<div class="row">	 
				<h2 class=" mt-3">Bebidas Frias</h2>
					<div class="body-cart"> 
						<div class="wrapper"> 
							<i id="left" class="fa-solid fa-angle-left"></i>
							<div class="carousel">
								<?php 
									$foods = $db->query("SELECT * FROM tbl_food WHERE category_id = 32",PDO::FETCH_OBJ)->fetchAll();
									foreach ($foods as $food ) {
										?>
											<a href="<?php echo SITEURL;?>food-detail.php?id=<?php echo $food->id; ?>">
												<div class="img ">
													<img src="<?php echo SITEURL ;?>images/food/<?php echo $food->image_name; ?>">
													<h2><?php echo $food->title; ?></h2>
													R$ <?php echo $food->price; ?> 
													<div>
														 
													</div>

												</div>
											</a>										<?php
									}
								 ?> 
							</div>
							<i id="right" class="fa-solid fa-angle-right"></i>
						</div>			
					</div>
				</div> 

				<div class="row">	 
				<h2 class=" mt-3">Bebidas Alcoólicas</h2>
					<div class="body-cart"> 
						<div class="wrapper"> 
							<i id="left" class="fa-solid fa-angle-left"></i>
							<div class="carousel">
								<?php 
									$foods = $db->query("SELECT * FROM tbl_food WHERE category_id = 33",PDO::FETCH_OBJ)->fetchAll();
									foreach ($foods as $food ) {
										?>
											<a href="<?php echo SITEURL;?>food-detail.php?id=<?php echo $food->id; ?>">
												<div class="img ">
													<img src="<?php echo SITEURL ;?>images/food/<?php echo $food->image_name; ?>">
													<h2><?php echo $food->title; ?></h2>
													R$ <?php echo $food->price; ?> 
													<div>
														 
													</div>

												</div>
											</a>
										<?php
									}
								 ?> 
							</div>
							<i id="right" class="fa-solid fa-angle-right"></i>
						</div>			
					</div>
				</div>
		</div>
 
-->
		<?php
	}
}
else{
	header("location:".SITEURL);
} 

?>
<?php include("partials-front/footer.php"); ?>