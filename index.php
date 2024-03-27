<?php include("partials-front/menu.php"); ?>

<div class="container-xxl position-relative p-0 ">

  <div class="container-xxl py-5    hero-header mb-5" style="background:linear-gradient(rgba(15, 23, 43, .9), rgba(15, 23, 43, .9)), url('images/bg-hero.jpg') ;  width:100%;">
                <div class="container my-5 py-5">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="display-3 text-white animated slideInLeft">BEM VINDO <br>A BELLANAY </h1>
                            <p class="text-white animated slideInLeft mb-4 pb-2" style="font-family: 'Lucida Console', 'Courier New', monospace; font-size: 28px;">A melhor comida caseira da regiao</p>
                           <!-- <a href="" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Start</a>  -->
                        </div>
                        <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                            <img class="img-fluid" src="images/hero.png" alt="">
                        </div>
                    </div>
                </div>
            </div>

        </div>




<div class="container">
	<div class="row">
		<div class="col">


 





			 <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Categorias</h2>
            <!-- Button trigger modal -->
 
            <?php 

                //create sql query to display Category from database
                $categories = $db->query("SELECT  * FROM tbl_category ORDER BY id DESC LIMIT 3",PDO::FETCH_OBJ)->fetchAll();//sonradan eklendi

                 foreach ($categories as $category) {
        // code...
    
                        ?>
                            <a href="<?php echo SITEURL; ?>food-category.php?id=<?php echo $category->id; ?>">
                                <div class="  box-3 float-container">
                                    
                                    <?php 

                                    //resim olup olmadığını kontrol et 
                                        if ($category->image_name=="") {
                                            //image name is not avaible
                                            echo "<div class='error'>İmage not Added.</div>";
                                        }
                                        else
                                        {
                                            //image is avaible
                                            ?>
                            <img src="<?php echo SITEURL.'images/category/'. $category->image_name ?>" alt="<?php echo $category->title; ?>" class="img-responsive img-curve">
                                            <?php
                                        }

                                        $length = strlen($category->title);
                                        if ($length > 80) {
                                             $category->title = "Long food Name";
                                        }
                                     ?>

                                    

                                         <h3 class="float-text text-white"><?php echo $category->title; ?></h3>
                                      
                                    
                                </div>
                            </a>
                        <?php
                    }
 


             ?>

           

            

            <div class="clearfix"></div>
        </div> 
    </section>
    <!-- Categories Section Ends Here -->

    <!-- Food Section starts here  -->

    	<div class="bg-tertiary p-5">
    		<div class="row">

           
 

    			<h1 class="text-center">Cardápio</h1>
                

    		<?php
    			 $foods = $db->query("SELECT  * FROM tbl_food ORDER BY sira ASC  ",PDO::FETCH_OBJ)->fetchAll();

    			  foreach ($foods as $food ) {
    			  	?>
    			  	<div class=" col-12 col-sm-12 col-md-6 col-lg-4   custom-card d-flex justify-content-center">
    			  		<div class="card">
						  <img src="<?php echo SITEURL."images/food/".$food->image_name; ?>" class=" card-img-top image" alt="...">
						  <div class="card-body">
						    <h5 class="card-title"><?php echo $food->title; ?></h5>
						    <p class="card-text"><?php echo $food->description; ?></p>
                            <p class="bold">Preco: R$ <?php echo $food->price. " "; ?> </p>
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

    <!-- Food Section ends here  -->
		</div>
	</div>
</div>
<?php include("partials-front/footer.php"); ?>