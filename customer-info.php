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
			 

			</div>

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
			    <label for="validationCustom05" class="form-label">Zip</label>
			    <input type="text" class="form-control" name="customer-zip" id="validationCustom05" required>
			    <div class="invalid-feedback">
			      Forneça um CEP valido.
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
            form.addEventListener("submit", function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add("was-validated");
            });
        });
    </script>



<?php } ?>






			 <?php include("partials-front/footer.php"); ?>