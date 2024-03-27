<?php include("partials/menu.php"); ?>
	
	<main>
		<div class="container-fluid px-4">
		
			<h1>Manage Table</h1> 
			<div class="border">
				<div class="row ">
					<div class="position-relative">
					    <button type="button" class="btn btn-primary position-absolute top-0 end-0 mt-3 me-3" data-bs-toggle="modal" data-bs-target="#newTable">Yeni Masa</button>
					 </div>
				</div>
				<h2>Tables</h2>
				
				<br>
				<div class="row ">
					<?php 
						$tables = $db->query("SELECT * FROM tbl_table", PDO::FETCH_OBJ)->fetchAll();
						foreach ($tables as $table => $value) {
							 
							?>
								<div class="col-3  p-4">
									<div class="border p-4 <?php if ($value->status == "avaible") {
										echo "bg-primary text-white";
									}elseif($value->status == "bussy"){
										echo "bg-dark text-danger";
									} ?>">
										<h4 class="text-center "><?php echo $value->table_number; ?></h4>
									</div>
								</div>
							<?php
						}
					 ?>

					
					

				</div>	
			</div>
		</div>
	</main>
		<!-- Modal bölümü -->
	<div class="modal fade" id="newTable" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Add new Table</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>


	        <!-- Form alanları buraya gelecek -->
	      <form action="<?php echo SITEURL ?>admin/add/table.php" method="POST">
	      <div class="modal-body">
		          <div class="mb-3">
		            <label for="tableNumber" class="form-label">Table Number</label>
		            <input type="text" class="form-control" id="tableNumber" name="tableNumber">
		          </div>
		          <div class="mb-3">
		            <label for="status" class="form-label">Status</label>
		            <input type="text" class="form-control" id="status" name="status">
		          </div>
		          <div class="mb-3">
		            <label for="personNumber" class="form-label">Person Number</label>
		            <input type="number" class="form-control" id="personNumber" name="personNumber">
		          </div>
		          
		        
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
	         <input type="submit" value="Add Table" name="submit" class="btn btn-primary">
	      </div>
	      </form>
	        <!-- Form alanları buraya gelecek -->


	    </div>
	  </div>
	</div>

		<!-- Modal bölümü -->



 
	
<?php include("partials/footer.php"); ?>