<?php include("partials/menu.php"); ?>
 <div class="container">
 	<h1>Gestao Alimentar</h1>

 	<div class="container">
 		<div class="row">

 			 <div class="position-relative">
		        <button type="button" class="btn btn-primary position-absolute top-0 end-0 mt-3 me-3" data-bs-toggle="modal" data-bs-target="#addFoodModal">
		          Adicionar novo alimento
		        </button>
		    </div>
		     <h3 class="text-center">Alimentos</h3>
        <br><br>

 			 
 			<div  class="px-4" >
 				<table class="table tbl-full ">
                <tr> 
                    <th>Foto</th>
                    <th>Titulo</th>
                    <th>Explicacao</th> 
                    <th>Preco</th> 
                    <th>Categoria  </th> 
                    <th>Fila</th>
                    <th>Movimentos</th>
                </tr>


                 <?php 

                 $sql ="SELECT * FROM tbl_food ORDER BY CAST(SUBSTRING_INDEX(id, ' ', 1) AS UNSIGNED), SUBSTRING(id, LOCATE(' ',id)+1); ";

                $res = mysqli_query($conn, $sql);

                if ($res == true) {
                    $count = mysqli_num_rows($res);
                    if ($count > 0 )
                    {
                        echo "<h3>Contagem total de alimentos : ".$count."</h3>";
                      
                        while ($rows = mysqli_fetch_assoc($res)) 
                        {
                            $id = $rows['id'];
                            $sira = $rows['sira'];
                            $title = $rows['title'];
                            $description = $rows['description'];
                            $price = $rows['price'];
                            $image_name = $rows['image_name'];
                            $current_category = $rows['category_id'];
                            $category_id = $current_category;
                            $food_content = $rows['food_content'];
                            $sira = $rows['sira'];

                             
                            $sql2 ="SELECT * FROM tbl_category WHERE id='$category_id' ";
                            $res2 = mysqli_query($conn, $sql2);
                            $row2 = mysqli_fetch_assoc($res2);
                            $category_name = $row2['title'];


                            ?>

                            <tr>
                                 
                                <td class=" ">
                                    <?php 
                                        if ($image_name!="") {
                                            ?>
                                            <img src="../images/food/<?php echo $image_name; ?>"  width="115px">
                                            <?php
                                        }
                                        else
                                        {
                                              ?>
                                            <img src="../images/noimage.jpg"  width="115px">
                                            <?php
                                        }

                                     ?>
                                    
                                </td>
                                <td style="width:20%;"><?php echo "<b>". $title."</b>"; ?></td>
                                <td style="width: 20%;"><?php echo $description; ?></td>
                                <td>R$ <?php echo $price; ?></td>
                                <td><?php echo $category_name; ?></td>
                                 
                                <form action="update">
                                    <td class="sira-td" >
                                        <i class="fa-solid fa-chevron-up "></i>
                                            <span> <?php echo $sira; ?></span>
                                        <i class="fa-solid fa-chevron-down "></i>
                                    </td>
                                </form>
                              
                                <td>
                                    <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                                       <!-- <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?>" class=" disabled btn-secondary btn p-2" type="button"> Atualizar </a>-->
                                   		 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#food-<?php echo $id; ?>">Atualizar</button>
                                        <!--<a href="sil.php">buraya bas</a>
  						
										
                                        
                                        <a href="delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-dangery btn disabled" type="button">Sil</a> -->
                                       
                                    </div>
                                    </br><br>
 
                                </td>
                            </tr>
                            <!-- Modal  food güncellemek için modal-->
                                        <div class="modal fade" id="food-<?php echo $id; ?>" tabindex="-1" aria-labelledby="editFoodModalLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="editFoodModal-<?php echo $id; ?>">Editar comida</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>

                                                  <div class="modal-body">
                                                    <form action="<?php echo SITEURL ?>admin/update/food.php" method="POST" enctype="multipart/form-data">
                                                      <div class="mb-3">
                                                        <label for="title" class="form-label">Titule:</label>
                                                        <input type="text" class="form-control" id="title" name="title" value="<?php echo $title ?>" placeholder="Title of food">
                                                      </div>

                                                      <div class="mb-3">
                                                        <label for="description" class="form-label"> Explicacao:</label>
                                                        <textarea class="form-control" id="description" name="description" rows="5" placeholder="Description of the Food"><?php echo $description ?></textarea>
                                                      </div>

                                                      <div class="mb-3">
                                                        <label for="price" class="form-label">Preco:</label>
                                                        <input type="text" class="fiyat form-control " id="price" name="price" value="<?php echo $price ?>" placeholder="Price">
                                                      </div>

                                                      <script>
                                                // Input alanına yalnızca ondalıklı sayıları kabul etmek için kontrol yapar
                                                document.getElementById('price').addEventListener('input', function() {
                                                    // Rakamlar ve ondalık nokta dışındaki tüm karakterleri kaldırır
                                                    this.value = this.value.replace(/[^0-9.]/g, '');

                                                    // Birden fazla ondalık noktasını engellemek için kontrol yapar
                                                    var parts = this.value.split('.');
                                                    if (parts.length > 2) {
                                                        parts.pop();
                                                        this.value = parts.join('.');
                                                    }
                                                });
                                                </script>

                                                      <div class="mb-3">
                                                        <label for="image" class="form-label">Imagem atual:</label>
                                                        <img src="<?php echo SITEURL."/images/food/".$image_name; ?>" width="50px">
                                                      </div>
                                                      <input type="hidden" name="current_image" value="<?php echo $image_name; ?>">
                                                      <input type="hidden" name="id" value="<?php echo $id; ?>">

                                                      <div class="mb-3">
                                                        <label for="image" class="form-label">Selecione a imagem:</label>
                                                        <input type="file" class="form-control" id="image" name="image">
                                                      </div>

                                                      <div class="mb-3">
                                                        <label for="category" class="form-label"> Categoria: </label>
                                                        <select class="form-select" id="category" name="category">
                                                          <!-- PHP code to populate category options -->
                                                          <?php
                                                           //create Php go to display catogories From data base

    											//1. Create sql to get active categories From Data base

                                                $categories = $db->query("SELECT * FROM tbl_category ",PDO::FETCH_OBJ)->fetchAll();
                                                $food_content = explode(",", $food_content);
                                                foreach ($categories as $category => $value) {
                                                	echo  "<br>". $value->title;
                                                	?>
    														<option <?php if($current_category == $value->id){echo "selected";} ?> value="<?php echo $value->id; ?>" ><?php echo $value->title; ?></option>
    													<?php
                                                }
     

    											//2.Display on Drpopdown
                                                          ?>
                                                        </select>
                                                      </div>
                                                      <div class="mb-3">
                                                          <label class="form-label">
                                                              Pila;
                                                          </label>
                                                          <input type="number" class="form-control" name="sira-no" value="<?php echo $sira; ?>">
                                                          <input type="hidden" name="current-sira-no" value="<?php echo $sira; ?>">
                                                      </div>
                                                      <!-- Burada checkboxların bulundu kısım-->
                                                      <div id="checkboxes">
                                                          <div class="row"> 
                                                            
                                                               <?php 
                                                                $products = $db->query("SELECT * FROM tbl_product", PDO::FETCH_OBJ)->fetchAll();
                                                                foreach ($products as  $product) {
                                                                    $checked = in_array($product->id, $food_content) ? 'checked': '';
                                                                    ?>
                                                                     <div class="col-3">
                                                                         <input type="checkbox" name="product_checkbox[]" <?php echo $checked; ?> value="<?php echo $product->id; ?>">
                                                                         <h5><?php echo $product->product_name."(".$product->product_price.")"; ?></h5>
                                                                     </div>
                                                                    <?php

                                                                }
                                                             ?>
                                                          </div>
                                                      </div>

                                                      <div class="text-center">
                                                        <button type="submit" name="submit" class="btn btn-primary"> Comida Atualizada </button>
                                                      </div>
                                                    </form>
                                                  </div>

                                            </div>
                                          </div>
                                        </div> 
                                        <!--Food güncelleme modali bitisi    -->


                            <?php




                        }
                    }
                    else
                    {
                        //Food not Added  in database
                        echo "<tr><td colspan='7' class='error'> Food not Added yet</td></tr>";
                    }
                }

             ?>

                <tr>
                    
                </tr>
    </table>
 			</div>
 		</div>
 	</div>


 
  

				 

			  <!-- Modal -->
<div class="modal fade" id="addFoodModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="addCategoryModalLabel"> Adicione novos alimentos </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Kategori ekleme formu -->
        <form action="<?php echo SITEURL ?>admin/add/food.php" method="POST" enctype="multipart/form-data">
    <div class="row mb-3">
        <label for="title" class="col-sm-2 col-form-label">Titulo:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="title" name="title" placeholder="Title of food">
        </div>
    </div>

    <div class="row mb-3">
        <label for="description" class="col-sm-2 col-form-label">Descricao:</label>
        <div class="col-sm-10">
            <textarea class="form-control" id="description" name="description" rows="5" placeholder="Description of the Food"></textarea>
        </div>
    </div>

    <div class="row mb-3">
        <label for="price" class="col-sm-2 col-form-label">Preco</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="price" name="price" placeholder="Price">
        </div>
    </div>

    <div class="row mb-3">
        <label for="image" class="col-sm-2 col-form-label"> Selecione a imagem: </label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="image" name="image">
        </div>
    </div>

    <div class="row mb-3">
        <label for="category" class="col-sm-2 col-form-label">Categoria:</label>
        <div class="col-sm-10">
            <select class="form-select" id="category" name="category">
                <?php
                 //create Php go to display catogories From data base

											//1. Create sql to get active categories From Data base

											$sql = "SELECT * FROM tbl_category ";

											//executing query
											$res = mysqli_query($conn, $sql);

											//count rows to check whether we have categories or not
											$count = mysqli_num_rows($res);

											//if count is greater than zero we have categories else we dont have any categories
											if ($count>0) {
												//we have categories
												while ($row = mysqli_fetch_assoc($res)) {
													// get the details of categories
													$id=$row['id'];
													$title=$row['title'];
													?>
														<option value="<?php echo $id; ?>"><?php echo $title; ?></option>
													<?php
												}
											}
											else
											{
												//we donnot have category
												?>
													<option value="0">Henüz Bir kategori Eklemediniz </option>

												<?php
											}

											//2.Display on Drpopdown
                ?>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <button type="submit" name="submit" class="btn btn-primary">Adicionar comida</button>
        </div>
    </div>
</form>



      </div>
    </div>
  </div>
</div>




			 <br>
			 <br>
			 <br>
			 

	

 </div>
<?php include("partials/footer.php"); ?>