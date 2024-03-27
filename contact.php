<?php include("partials-front/menu.php"); ?>
  <!-- Slider ve İletişim Formu -->
  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-7">
        <!-- Slider Buraya Gelecek -->
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="<?php echo SITEURL ;?>images/slider1.jpg" class="d-block w-100" alt="Slider 1">
            </div>
            <div class="carousel-item">
              <img src="<?php echo SITEURL ;?>images/slider2.jpg" class="d-block w-100" alt="Slider 2">
            </div>
            <div class="carousel-item">
              <img src="<?php echo SITEURL ;?>images/slider3.jpg" class="d-block w-100" alt="Slider 3">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      <div class="  col-lg-5  ">
            <!-- Hakkımızda ve Çalışma Saatleri -->
        <section class="py-5">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <h2>Nós Somos</h2>
                <p>O nosso restaurante foi fundado em 1990 e oferece experiências gastronômicas inesquecíveis aos nossos clientes, com deliciosos pratos e um serviço acolhedor.</p>
                <p>Preparamos nossas refeições com ingredientes de alta qualidade e temos uma seleção especial de vinhos para acompanhá-las.</p>
              </div>
              <div class="col-md-6">
                <h2>Horário de funcionamento</h2>
                <ul>
                  <li>Segunda-feira: 9:00 - 17:00</li>
                  <li>Terça-feira: 9:00 - 17:00</li>
                  <li>Quarta-feira: 9:00 - 17:00</li>
                  <li>Quinta-feira: 9:00 - 17:00</li>
                  <li>Sexta-feira: 9:00 - 17:00</li>
                  <li>Sábado: 9:00 - 17:00</li>
                  <li>Domingo: Estamos Fechados </li>
                </ul>
                <p>* Em dias especiais, o horário de funcionamento pode variar. Por favor, faça uma reserva com antecedência.</p>
              </div>
            </div>
          </div>
        </section>
       </div>
       <hr> 
      <div class="col-lg-4 p-2">
        <!-- İletişim Formu Buraya Gelecek -->
        <h3>Formulário de Contato</h3>
        <form>
          <div class="mb-3">
            <label for="name" class="form-label">Seu nome</label>
            <input type="text" class="form-control " id="name" disabled required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Endereço de email</label>
            <input type="email" class="form-control" id="email" disabled required>
          </div>
          <div class="mb-3">
            <label for="message" class="form-label" >sua mensagem</label>
            <textarea class="form-control " id="message" rows="4" disabled required></textarea>
          </div>
          <button type="submit" class="btn btn-primary  " disabled>Enviar</button>
        </form>
      </div>
       <div class="col-lg-8">
        <!-- Slider Buraya Gelecek -->
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="<?php echo SITEURL ;?>images/slider1.jpg" class="d-block w-100" alt="Slider 1">
            </div>
            <div class="carousel-item">
              <img src="<?php echo SITEURL ;?>images/slider2.jpg" class="d-block w-100" alt="Slider 2">
            </div>
            <div class="carousel-item">
              <img src="<?php echo SITEURL ;?>images/slider3.jpg" class="d-block w-100" alt="Slider 3">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <br>
   <h1 class=" text-center  ">Aqui estamos</h1>
     
     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d228.620543282349!2d-46.78449582102574!3d-23.53506699251674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ceff75312a52ab%3A0x88f53e978fbce224!2sBellaNay%20Restaurante!5e0!3m2!1str!2str!4v1692457780561!5m2!1str!2str" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
 



   <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Categorias</h2>
            <!-- Button trigger modal -->
 
            <?php 

                //create sql query to display Category from database
                $categories = $db->query("SELECT  * FROM tbl_category ORDER BY id DESC LIMIT 3  ",PDO::FETCH_OBJ)->fetchAll();//sonradan eklendi

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

  <!-- Menü -->
  <div class="bg-tertiary py-5">
    <div class="container">
      <h3>Menü</h3>
      <!-- Burası bizim navigation barımız -->
<div id="container-nav " class=" container-fluid  shadow    sticky-top border "          >

    <nav id="navigation" class="   nav nav-pills   " >

        <button class="prev">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                  <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
            </svg>
        </button>
        <ul>
    <?php 

$categories = $db->query("SELECT *  FROM tbl_category WHERE active ='Yes'", PDO::FETCH_OBJ)->fetchAll();

foreach($categories as $category){
?>  
      <li> <a class="shadow  " href="#<?php echo $category->id; ?>" ><?php echo $category->title; ?>  </a>   </li>
     
<?php 
} 

?> </ul>

<button class=" next "> <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
  <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
</svg> </button>

    </nav>
</div>

 
 


<div id="food-nav" class="container-fluid ">
    <?php

    foreach($categories as $category){
    ?>


        <div id="<?php echo $category->id; ?>" style="height:100px;  " class="section " >

        </div>
        <div style=" background-image: url('images/category/<?php echo $category->image_name; ?>');" class="     back-image ">
        <h2 style=""><?php echo $category->title; ?></h2>

        
        </div>
  
        
         <div class="  row" >
    <?php
     
    $foods = $db->query("SELECT * FROM tbl_food WHERE category_id = '$category->id' AND active = 'Yes'  ",PDO::FETCH_OBJ)->fetchAll();
    foreach($foods as $food){
        ?>
       
       <div  class="col-lg-6 p-3  ">
                        <div class="p-3 rounded-4 shadow-lg  ">
                            <div class="row">
                                <div class="col-4">
                                <?php 
                                    if ($food->image_name=="") {
                                        //resim yok
                                        ?>

                                        <img src="<?php echo SITEURL; ?>images/noimage.jpg" alt="No image" class="img-responsive img-curve">

                                        <?php 
                                    }
                                    else
                                    {
                                        //resim var
                                        ?>

                                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $food->image_name; ?>" alt="<?php echo $food->title; ?>" class="img-responsive img-curve">

                                        <?php
                                    }
 
                                     ?>
                                </div>

                                <div class="col-8">
                                    <div class="container-fluid">
                                        <h4><?php echo  $food->title?></h4>
                                        <p class="food-price"> <?php echo  $food->description; ?> </p> 
                                        <p class="food-price"><b> R$ <?php echo  $food->price; ?> </b></p><br> 
                                    </div>

                                    <?php if ($food->food_content == "") {
                                       ?>
                                        <button class="btn btn-dark addToCartBtn" product-id="<?php echo $food->id; ?>">Pedir</button>
                                      <?php
                                    }else{
                                       ?>
                                          <!-- Button extra eklemek için modal -->
                                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#extra-product-<?php echo $food->id ?>">
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
                            <button class="btn btn-dark addToCartBtn" product-id="<?php echo $food->id; ?>">Pedir</button>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                     <!-- Modal   extraların gösterildiği modal bitişi   -->


                                  <?php
                                    } ?>




                                    <!-- Burası Sepet buttonudur -->
                                   
                                </div>
                            </div>

 


                            <!-- Modal başlangıcı-->

                            <div class="modal fade" id="exampleModal<?php echo $food->id;?>" tabindex="-1" aria-labelledby="exampleModalLabel<?php echo $food->id;?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel<?php echo $food->id;?>">Passen Sie Ihre Mahlzeit an</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body"> 

                                        
                                           <?php

                                            if ($food->category_id == 59 ) {
                                                // code...
                                                ?>
                                                <u>Ihre Fleischsorte</u>

                                                    <div class="form-check">
                                                      <input class="form-check-input" type="radio" name="meat<?php echo $food->id; ?>" value="hahnchenfleisch" id="flexRadioDefault1" checked >
                                                      <label class="form-check-label" for="flexRadioDefault1">
                                                        mit Hahnchenfleisch
                                                      </label>
                                                    </div>

                                                    <div class="form-check">
                                                      <input class="form-check-input" type="radio" name="meat<?php echo $food->id; ?>" value="kalbsfleisch" id="flexRadioDefault2">
                                                      <label class="form-check-label" for="flexRadioDefault2">
                                                        mit Kalbsfleisch
                                                      </label>
                                                    </div>
                                                  
                                                    <hr>

                                                   

                                                <?php
                                            }

                                            ?>



                                        <?php
                                        $products = $db->query("SELECT  * FROM tbl_product WHERE product_category= '$food->category_id' ",PDO::FETCH_OBJ)->fetchAll();
                                        if(count($products)>0){


                                            $i = 0;
                                             echo "<u>Ihre Extras</u>   ";
                                            foreach($products as $product => $product_key){
                                                ?>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="product" value="<?php echo $product_key->id; ?>" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        mit <?php echo $product_key->product_name."  (+".$product_key->product_price ." €)"; ?> 
                                                    </label>
                                                </div>
                                                <?php 
                                                $i++;
                                                 if ($i >= 5) break; // İlk 4 ürünü gösterdik
                                            }if (count($products) > 3) {
                                                // Tümünü göster butonunu ekle
                                                echo '<button class="btn btn-link" onclick="showAllProducts(this)">Weitere '.count($products).' anzeigen </button>';
                                                // Tüm ürünleri gizli olarak ekle
                                                echo '<div class="all-products d-none">';
                                                foreach($products as $product => $product_key){
                                                    if ($i > 0) {
                                                        $i--;
                                                        continue;
                                                    }
                                                   ?>
                                                     <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="product" value="<?php echo $product_key->id; ?>" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            mit <?php echo $product_key->product_name."  (+".$product_key->product_price ." €)"; ?> 
                                                        </label>
                                                    </div>
                                                   <?php
                                                }
                                                echo '</div>';
                                            }


                                        }else{
                                            echo "Jetzt in den Warenkorb legen";
                                        } 
                                        ?>
                                    </div>
                                    <div class="modal-footer">
                                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                        <button   type="button" class="btn btn-success btn-block addToCartBtn" role="button"   product-id="<?php echo $food->id ;?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
                                                  <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5V8z"/>
                                                 </svg>  
                                                       In den Warenkorb
                                    </button>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <!--Modal bitişidir   -->



                        </div>
                    </div>
                    
                


 
       

 
        <?php 
    }
?>
</div>
 <?php

}
    
    ?>
     </div>
    


<script>
    const sections = document.querySelectorAll('.section');
    const nav = document.querySelector('#navigation');
    const navLinks = document.querySelectorAll('#navigation a');

    window.addEventListener('scroll', () => {
    let currentSection = '';
    
    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;
        
        if (pageYOffset >= (sectionTop - sectionHeight / 3)) {
        currentSection = section.getAttribute('id');
        }
    });
    
    navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href').slice(1) === currentSection) {
        link.classList.add('active');
        }
    });
    
   // nav.classList.toggle('bg-dark', window.scrollY > 0);
    });




var menu = document.querySelector('#navigation ul');
var menuPosition = 0;
var menuWidth = menu.offsetWidth;
var buttonPrev = document.querySelector('#navigation .prev');
var buttonNext = document.querySelector('#navigation .next');
var step = 100;

console.log(menuWidth);

buttonPrev.addEventListener('click', function() {
  if (menuPosition < 0) {
    menuPosition += step;
     menu.style.setProperty('transform', 'translateX(' + menuPosition + 'px)');
    //menu.style.transform = 'translateX(' + menuPosition + 'px)';
  }
});

buttonNext.addEventListener('click', function() {

  if (menuPosition > -(menuWidth - menu.parentNode.offsetWidth)) {
    menuPosition -= step;
     menu.style.setProperty('transform', 'translateX(' + menuPosition + 'px)');
   // menu.style.transform = 'translateX(' + menuPosition + 'px)';    
  }
});



//Burası göstermek istediği diğer extra ürünler kısmıdır.
function showAllProducts(button) {
    button.style.display = 'none'; // Tümünü Göster butonunu gizle
    var allProducts = button.nextSibling;
    allProducts.classList.remove('d-none'); // Tüm ürünleri göster
}
</script>
    </div>
  </div>

  <?php include("partials-front/footer.php"); ?>