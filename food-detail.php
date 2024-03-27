<?php include("partials-front/menu.php"); ?>

<?php 
    
    if (isset($_GET["id"])) {
        $id = $_GET['id'];
        $foods = $db->query("SELECT * FROM tbl_food WHERE id = '$id' ", PDO::FETCH_OBJ)->fetchAll();
        foreach ($foods as $food ) {
            ?>
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="card">
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $food->image_name; ?>" class="card-img-top" alt="Yemek Resmi">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $food->title; ?></h5>
                                    <p class="card-text"><?php echo $food->description; ?></p>
                                    <p class="card-text">Price: R$<?php echo $food->price; ?></p>
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
                    </div>
                </div>
            <?php
        }
    }else{
        header("location:".SITEURL);
    }

 ?>



<?php include("partials-front/footer.php"); ?>
