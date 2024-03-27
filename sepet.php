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
 		<h1 class="text-center">Voce tem <span class="text-danger"> <?php echo $summuray["total_count"]; ?></span> itens no seu carrinho </h1>
 		<?php 

 				foreach ($foods as $value => $food) {
 					// code...
 				

 		 ?>
 		<div class="col-md-3">
    			  		
    			  		<div class="card p-2 " style="width: 100%;">
						  <img src="<?php echo SITEURL."images/food/".$food->image_name; ?>" class="card-img-top" alt="...">
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
						    	}  ?></p>
						     <div class="row ">
                                                     <div class="col-3 ">
                                                        <a href="<?php echo SITEURL; ?>config/cart-db.php?p=decCount&product_id=<?php echo $value; ?>" class=" btn text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-dash-square" viewBox="0 0 16 16">
                                                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                                        <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                                        </svg></a>
                                                      </div> 
                                                    <div class="col-2 "><p class="food-detail"><?php echo  $food->count; ?></p></div>
                                                    <div class="col-3">
                                                        <a href="<?php echo SITEURL; ?>config/cart-db.php?p=incCount&product_id=<?php echo $value; ?>" class="btn  text-success"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                                            </svg></a>
                                                    </div>
                                                    <div class="col-4 rounded-4  bg-success"> <strong><p class="mt-2 text-center">R$ <?php echo  $food->total_price?></p></strong></div>
                                                     
                                                </div>  
						    <button product-id="<?php echo $value; ?>" class="btn btn-danger removeFromCartBtn">Excluir</button>
						  </div>
						</div>

    			  	</div>
    		<?php } //Foreach döngüsünün bittiği yer burası*******************

    		?>

 	</div>
 	<div class="container">
	 	<div class="row">
	 		<h4 class="text-center">Preco total = <?php echo $summuray["total_price"]." "; ?> R$ </h4>
	 		<br>
	 		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#customer_info">
			 Peca agora
			</button>
		 
	 		 
	 	</div>
 	</div>
 	<br>
 </div>





















<!--customer info  Modal -->

<div class="modal fade modal-xl " id="customer_info" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Entrega de informacoes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>


      <div class="modal-body">
      	
        <!--Modal boodyy****** start-->
        
    		<form method="POST" action="" class="row g-3 needs-validation" novalidate>
			  <div class="col-md-4">
			    <label for="validationCustom01" class="form-label">Nome completo</label>
			    <input type="text" class="form-control" id="validationCustom01" name="customer-name" value="" required>
			    <div class="valid-feedback">
			     Parece bom!
			    </div>
			  </div>
			  <div class="col-md-4">
			    <label for="validationCustom02" class="form-label">Numero</label>
			    <input type="Number" class="form-control" id="validationCustom02" name="customer-number" value="Otto" required>
			    <div class="valid-feedback">
			      Parece bom!
			    </div>
			  </div>
			  <div class="col-md-4">
			    <label for="validationCustomUsername" class="form-label">E Mail</label>
			    <div class="input-group has-validation">
			      <span class="input-group-text" id="inputGroupPrepend">@</span>
			      <input type="text" class="form-control" id="validationCustomUsername" name="customer-email" aria-describedby="inputGroupPrepend" required>
			      <div class="invalid-feedback">
			       Escolha um nome de usuario.
			      </div>
			    </div>
			  </div>
			  <div class="col-md-6">
			    <label for="validationCustom03" class="form-label">Cidade</label>
			    <input type="text" class="form-control" name="customer-city" id="validationCustom03" required>
			    <div class="invalid-feedback">
			      Forneca uma cidade valida.

			    </div>
			  </div>
<!--
			  <div class="col-md-3">
			    <label for="validationCustom04" class="form-label">State</label>
			    <select class="form-select" id="validationCustom04" name="customer-neigh" required>
			  
			      <option selected value="neighbourhood-1">neigborf-1</option>
			      <option value="neighbourhood-2">neigborf-2</option>
			      <option value="neighbourhood-3" >neigborf-3</option>
			    </select>
			    <div class="invalid-feedback">
			      Please select a valid state.
			    </div>
			  </div>
			-->

			  <div class="col-md-3">
			    <label for="validationCustom05" class="form-label">Cep</label>
			    <input type="text" class="form-control" name="customer-zip" id="validationCustom05" required>
			    <div class="invalid-feedback">
			      Forneca um CEP valido.
			    </div>
			  </div>
 


			  <div class="col-12">
			    <div class="form-check">
			      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
			      <label class="form-check-label" for="invalidCheck">
			        
			        Concorde com os <a href="#"> termos e condicoes</a>
			      </label>
			      <div class="invalid-feedback">
			        Voce deve concordar antes de enviar.
			      </div>
			    </div>
			  </div>

			  <div class="modal-footer">
			  	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
			  	<input class="btn btn-primary" name="submit" type="submit" value="Peca agora">
				  <div class="col-12">
				    
				  </div>
				</div>
			</form>

        <!--Modal boodyy****** End-->  

          <script>
document.addEventListener("DOMContentLoaded", function () {
    var form = document.querySelector(".needs-validation");
    var cepInput = document.getElementById("validationCustom05");

    form.addEventListener("submit", function (event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }

        // Cep numarası format kontrolü
        var cepPattern = /^\d{5}-\d{3}$/;
        if (!cepPattern.test(cepInput.value)) {
            event.preventDefault();
            event.stopPropagation();
            cepInput.classList.add("is-invalid");
        } else {
            cepInput.classList.remove("is-invalid");
            cepInput.classList.add("is-valid");
        }

        form.classList.add("was-validated");
    });

    cepInput.addEventListener("input", function () {
        var cepValue = cepInput.value;
        var cepPattern = /^\d{5}-\d{3}$/;

        // Sadece rakam kabul et
        cepValue = cepValue.replace(/\D/g, "");

        // Otomatik "-" işareti ekleme
        if (cepValue.length > 5) {
            cepValue = cepValue.slice(0, 5) + "-" + cepValue.slice(5);
        }

        // Fazla karakterleri kesme
        if (cepValue.length > 9) {
            cepValue = cepValue.slice(0, 9);
        }

        cepInput.value = cepValue;

        if (!cepPattern.test(cepValue)) {
            cepInput.classList.add("is-invalid");
            cepInput.classList.remove("is-valid");
        } else {
            cepInput.classList.remove("is-invalid");
            cepInput.classList.add("is-valid");
        }
    });
});




    </script>




      </div>
       
    </div>
  </div>
</div> 

<?php if (isset($_POST["submit"])) {

	$full_name = $_POST['customer-name']; 
	$number = $_POST['customer-number'];
	$email = $_POST['customer-email'];
	$city = $_POST["customer-city"];
	$neighbourdhood = " ";
	$zip = $_POST['customer-zip'];


	if ($_SESSION['shoppingCart']) {
		 $customer = array();
		 $customer["customer_full_name"] = $full_name;
		 $customer["customer_number"] = $number;
		 $customer["customer_email"] = $email;
		 $customer["customer_mahalle"]= $neighbourdhood;
		 $customer["customer_address"] = $city;
		 $customer["customer_zip"] = $zip;
		 $_SESSION['shoppingCart']['customer'] = $customer;

		 header("location:".SITEURL."delivery.php");

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
				echo "<h1 class='text-center'>Nao ha comida Adicionar comida ao carrinho</h1>";
			}
 ?>


 <?php include("partials-front/footer.php"); ?>