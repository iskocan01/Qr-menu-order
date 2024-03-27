<?php include("../config/constants.php"); ?>

<?php ob_start();
 



if (isset($_SESSION["shoppingCart"])){

  $shoppingCart = $_SESSION['shoppingCart'];

  if (isset($_SESSION['shoppingCart']['summary'])) {
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



 






if (isset($_GET['table_no'])) {

	$table = $_GET['table_no'];

	$_SESSION['shoppingCart']['table_no'] = $table;

   
   

	}else{
		if (!isset($_SESSION['shoppingCart']["table_no"])) {
			header("location:".SITEURL."table-order/scan-qr.php");
		}
	 
}

 


?>


<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   
    

    <title>Bellanay-Table Order</title>

    <!-- Link our CSS file -->

<link rel="icon" href="<?php echo SITEURL; ?>images/newlogo1.png" type="image/x-icon"/> 

<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
 
<link rel="stylesheet" href="<?php echo SITEURL; ?>css/style.css">
<!-- <link rel="stylesheet" type="text/css" href="css/customer.css"> -->


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>

<script src="<?php echo SITEURL; ?>js/jquery-3.6.3.min.js" ></script> 


</head>

<body>
 

    <nav class="navbar navbar-expand-lg bg-body-dark  ">


        <div class="container-fluid">
        <a class="navbar-brand  " href="<?php echo SITEURL ;?>table-order"> <img src="<?php echo SITEURL ?>images/newlogo1.png" width="150px"  ></a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
             
            <li class="nav-item">
              <a class="nav-link active" href="<?php echo SITEURL; ?>table-order">MENU</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo SITEURL; ?>table-order/food-category.php?p=icecekler">BEBIDAS</a>
            </li>
 
          
            <li class="nav-item">
                <a href="<?php echo SITEURL; ?>table-order/food-category.php?id=<?php echo Sobremesa; ?>" class="nav-link ">SOBREMESA</a> 
            </li>
            <li class="nav-item">
                <a href="<?php echo SITEURL; ?>table-order/food-category.php?id=<?php echo Massas; ?>" class="nav-link ">MASSAS & MOLHOS PARA VIAGEM</a> 
            </li>

               

          </ul> 

        </div>


         <form class="d-flex  " method="POST" action="<?php echo SITEURL; ?>table-order/search-food.php" style="width: 40%;" role="search">
          <input
            class="form-control me-2 border "
            type="search"
            name="search"
            placeholder="Search"
            aria-label="Search"
          />
          <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>

        <button  class="navbar-toggler  " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
                         


        
      </div>



      
    
      
    </nav>



    <div class="container">
      <?php 
        if (isset($_SESSION['info-succes'])) {
          echo ' <div class="alert alert-success" role="alert">
         '.$_SESSION["info-succes"].'
      </div>';
          unset($_SESSION['info-succes']);
        }

        if (isset($_SESSION['info-error'])) {
          echo ' <div class="alert alert-danger" role="alert">
        '.$_SESSION["info-error"].'
      </div>';

          unset($_SESSION['info-error']);
        }
       ?>
     
     
    </div>




 
                <!--Sepet iconumuz -->
    <div class="fixed-top cart-area text-end " style="   margin-top: 150px; margin-right:30px; font-size: 32px!important; float:right;">
    
      <a href="<?php echo SITEURL; ?>table-order/sepet.php" class="text-dark">
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
