<?php include('config/constants.php'); ?>
<?php ob_start();


if (isset($_SESSION["shoppingCart"])){

  $shoppingCart = $_SESSION['shoppingCart'];
  if (isset($shoppingCart["summary"])) {
    
     $total_count = $shoppingCart["summary"]["total_count"];
      $total_price = $shoppingCart["summary"]["total_price"];
  }else{
    $total_count=0;
    $total_price = 0.0;
  }
 
  

} else{
  $total_count=0;
  $total_price = 0.0;
}

?>


<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   
    

    <title>Bellanay</title>








        <!-- Favicon -->
    <link href="images/newlogo1.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet 
    <link href="css/bootstrap.min.css" rel="stylesheet">
-->
    <!-- Template Stylesheet -->
    <link href="css/style1.css" rel="stylesheet">











<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />





    <!-- Link our CSS file -->
 

<link rel="icon" href="<?php echo SITEURL; ?>images/newlogo1.png" type="image/x-icon"/> 

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
 
<link rel="stylesheet" href="css/style.css">
<!-- <link rel="stylesheet" type="text/css" href="css/customer.css"> -->





<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>

<script src="js/jquery-3.6.3.min.js"></script> 



</head>

<body>
  <?php


  $current_page = basename($_SERVER['SCRIPT_NAME']);
 // echo $current_page; 

  if (isset($_GET['p'])) {
    $parametreDegeri = $_GET['p'];
    // Parametre değeri ile yapılacak işlemleri burada gerçekleştirebilirsiniz
   // echo "GET parametresi: " . htmlspecialchars($parametreDegeri);
    $durum = "icecekler";
} elseif(isset($_GET['id'])){
  $durum = $_GET["id"]; 
} else {
    $durum = "";
} 

   ?>
 
 
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0  ">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo SITEURL ?>"> <img src="<?php echo SITEURL ?>images/newlogo1.png" width="45px"  ></a>

       


        <button  class="navbar-toggler  " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
                         

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link <?php if ($current_page == "index.php") echo "active" ?> " aria-current="page" href="<?php echo SITEURL; ?>">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if ($current_page == "menu-page.php") echo "active" ?> " href="<?php echo SITEURL; ?>menu-page.php">MENU</a>
            </li>

            <li class="nav-item">
              <a class="nav-link <?php if ($current_page == "food-category.php" AND $durum == "icecekler" ) echo "active" ?> " href="<?php echo SITEURL; ?>food-category.php?p=icecekler">BEBIDAS</a>
            </li>

            
          


          
            <li class="nav-item">
                <a href="<?php echo SITEURL; ?>food-category.php?id=<?php echo Sobremesa; ?>" class="nav-link    <?php if ($current_page == "food-category.php" && $durum == Sobremesa ) echo "active" ?> ">SOBREMESA</a> 
            </li>
            <li class="nav-item">
                <a href="<?php echo SITEURL; ?>food-category.php?id=<?php echo Massas ;?>" class="nav-link  <?php if ($current_page == "food-category.php" && $durum == Massas ) echo "active" ?> ">MASSAS & MOLHOS PARA VIAGEM</a> 
            </li>

              
          
             
                <li class="nav-item">
                  <a class="nav-link <?php if ($current_page == "contact.php") echo "active" ?>" href="<?php echo SITEURL; ?>contact.php "> CONTATO</a></li>
             

          </ul> 

        </div>

        
      </div>
    
      
    </nav>  
    
    <?php 
                if (isset($_SESSION['info-succes'])) { 
                    ?>

                         <div class="alert alert-primary" role="alert">
                            <?php echo $_SESSION['info-succes']; ?>
                         </div>
                    <?php
                    unset($_SESSION['info-succes']);

                }
                if (isset($_SESSION["info-error"])) { 
                    ?> 
                          <div class="alert alert-danger" role="alert">
                            <?php echo $_SESSION['info-error']; ?>
                         </div>
                    <?php
                    unset($_SESSION['info-error']);
                }
               ?>
            



 




    
    
  
                
    <div class="fixed-top cart-area text-end " style="   margin-top: 80px; margin-right:30px; font-size: 32px!important; float:right;">
    
      <a href="<?php echo SITEURL; ?>sepet.php" class="text-success">
      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
        <?php echo $total_count; ?>
          
        </span>

          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-basket-fill" viewBox="0 0 16 16">
            <path d="M5.071 1.243a.5.5 0 0 1 .858.514L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 6h1.717L5.07 1.243zM3.5 10.5a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3z"/>
          </svg>
        </a>
    </div>


    <div class="modal-dialog "></div>

    

  
 
 
  
 
        <!-- Navbar Section Ends Here -->


    
