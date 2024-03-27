<?php include("partials/menu.php"); ?>
	
	<main>
		<div class="container px-5 mt-5  "> 
			
			<div class="position-relative">
				<button type="button" class="btn btn-primary position-absolute top-0 end-0 mt-3 me-3" data-bs-toggle="modal" data-bs-target="#addExtraProductModal">
				  Adicionar produto extra
				</button>
			</div>
     <h1>Extra Products</h1>
			
		</div>

     <div class="container ">
        <div class="row">
          <div class="col-6 p-3">
            <div class="border">
              <?php 
                $products = $db->query("SELECT * FROM tbl_product ", PDO::FETCH_OBJ)->fetchAll();
                ?>

                  <table class="table tbl-full ">
                   <tr> 
                      <th>Nome</th>
                      <th>Preco</th> 
                      <th>Movimentos</th>
                  </tr>
                <?php
                foreach ($products as $key => $product) {
                 // echo $product->product_name;

                  ?>
                    <tr>
                      <td><?php echo $product->product_name ?></td>
                      <td> <?php echo $product->product_price; ?></td>
                      <td>
                           
                                   
                                   <!-- <button type="button" class="btn btn-danger">Sil</button> -->
                                   <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?php echo "product-".$product->id; ?>">Atualizar</button>
                                  </div>
                                  <!-- Modal for update product information -->
<div class="modal fade" id="<?php echo "product-".$product->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="<?php echo "product-label-".$product->id; ?>"><?php echo $product->product_name; ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
       <form action="<?php echo SITEURL."admin/update/extra-product.php"; ?>" method="post">
      <div class="modal-body">
          
                <div class="form-group">
                    <label for="isim">Nome:</label>
                    <input type="text" class="form-control" id="isim" name="extra_name" value="<?php echo $product->product_name; ?>" required>
                </div>
                <div class="form-group">
                    <label for="fiyat">Preco:</label>
                    <input type="text" class="form-control" id="fiyat" name="extra_price" value="<?php echo $product->product_price; ?>" required>
                    <input type="hidden" name="id" value="<?php echo $product->id; ?>">
                </div> 
            
      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="submit" name="submit" class="btn btn-primary">Atualizar</button>
      </div>
       </form>
    </div>
  </div>
</div>
                      </td>
                    </tr>
                  <?php
                }
               ?>

             </table>
            </div>

          </div>
        </div>
      </div>
	</main>

	<!-- Button to trigger modal -->


<!-- Modal -->
<div class="modal fade" id="addExtraProductModal" tabindex="-1" aria-labelledby="addExtraProductModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addExtraProductModalLabel">Adicionar produto extra</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php echo SITEURL ?>admin/add/product.php" method="POST">
          <div class="mb-3">
            <label for="extra_name" class="form-label">Nome Extra:</label>
            <input type="text" class="form-control" id="extra_name" name="extra_name" placeholder="Extra Name">
          </div>

          <div class="mb-3">
            <label for="extra_price" class="form-label">Preco Extra:</label>
            <input type="text" class="form-control" id="extra_price" name="extra_price" placeholder="Extra Price">
          </div>

          <div class="mb-3">
            <label for="product_category" class="form-label">Categoria de Produto:</label>
            <input type="text" class="form-control" id="product_category" name="product_category" placeholder="Product Category">
          </div>

          <div class="text-center">
            <button type="submit" name="submit" class="btn btn-primary">Adicionar produto extra</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
// Input alanına yalnızca ondalıklı sayıları kabul etmek için kontrol yapar
document.getElementById('fiyat').addEventListener('input', function() {
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







	
<?php include("partials/footer.php"); ?>