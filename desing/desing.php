<?php if (isset($categorySection)) {
	
	public function categorySection ($categories){
		?>
			  <!-- CAtegories Section Starts Here -->
	    <section class="categories">
	        <div class="container">
	            <h2 class="text-center">Categorias</h2>
	            <!-- Button trigger modal -->
	 
	            <?php 

	                //create sql query to display Category from database
	                

	                 foreach ($categories as $category) {
	        // code...
	    
	                        ?>
	                            <a href="<?php echo SITEURL; ?>#<?php echo $category->id; ?>">
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
		<?php

	}

} ?>