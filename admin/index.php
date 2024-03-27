<?php
     include('../config/constants.php');
     require_once("partials/getData/getData.php");
     ob_start();

 if (!isset($_SESSION["username"])) {
        header("location:".SITEURL."admin/login.php");
    }
    

$cart = new cartOrderData();
$getFood = new foodData();
$getCustomer = new customerData(); 
$tableCart = new cartTableData();
$getProduct = new productData();




 ?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <!--<meta charset="utf-8" />-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Bella Nay</title>
        <link rel="icon" href="<?php echo SITEURL; ?>images/newlogo1.png" type="image/x-icon"/> 
        <meta http-equiv="refresh" content="20"><!--Burası sayfayı yenileyen bir kod parçaası -->
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/admin.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Bella Nay</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
             <!--   <div class="input-group">
                    <input class=" form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            -->
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                       <!-- <li><a class="dropdown-item" href="#!">Settings</a></li> -->
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Produtos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="manage-category.php">Categorias
                                    </a>
                                    <a class="nav-link" href="manage-food.php">Alimentos</a>
                                     <a class="nav-link" href="extra-product.php">Produto Extra</a>
                                </nav>
                            </div>

                            <!--

                            <a class="nav-link collapsed" href="manage-page.php" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="manage-page.php" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login-admin.php">Login</a> 
                                            <a class="nav-link" href="pasport-change.php">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Special Page
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="manage-page.php">401 Page</a>
                                            <a class="nav-link" href="manage-page.php">404 Page</a>
                                            <a class="nav-link" href="manage-page.php">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="manage-campaign.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                kanpanya
                            </a>
                            <a class="nav-link" href="manage-table.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                        
                        -->

                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">logado como:</div>
                        <?php 
				//kullanıcı ismi burada
				echo $_SESSION["username"]; 
			?>
                    </div>
                </nav>
            </div>

         <div id="layoutSidenav_content">
           
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
            

    <!--  Menü Section Ends  --> 
            
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">ordem total</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?php echo SITEURL; ?>admin/istatik.php">Ver detalhes</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Alimentos totais</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Ver detalhes</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Ganhos diarios</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Ver detalhes</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Ganhos mensais</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Ver detalhes</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                                                     <!--Burada  table Order için tablosundan gelen veriler-->
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <?php 
                                            $sql = "SELECT COUNT(DISTINCT card_id) AS unique_card_count
                                                    FROM tbl_table_order
                                                    WHERE statu = 'bekliyor...'";

                                            $result = $conn->query($sql);

                                           
                                                // Fetch the result as an associative array
                                                $row = $result->fetch_assoc();
                                                $uniqueCardCount = $row["unique_card_count"];
                                                 

                                         ?>
                                        <i class="fas fa-chart-area me-1"></i>
                                       <span class="badge bg-danger badge-lg  "><b class="bold"><?php  echo $uniqueCardCount;?></b> </span> 
ordem da mesa
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas>

                                        <table class="table table-dark table-striped table-hover">
                                            <thead>
                                                <tr>
                                                  <th scope="col">#</th>
                                                  <th scope="col">Table Number</th> 
                                                  <th scope="col">Actions</th>
                                                </tr>
                                              </thead>
                                              <tbody>


 
 
                                                   <?php //Burası table  order siparişlerimizin göründüğü  yerdir 
                                                $foods = $db->query("SELECT * FROM tbl_table_order WHERE statu ='bekliyor...' ",PDO::FETCH_OBJ)->fetchAll();

                                            
                                            $check_cart = 0;
                                            $sn =1;
                                      

                                            foreach ($foods as $key => $value) {
                                                
                                                if ($value->card_id != $check_cart) {
                                                    
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $sn++ ?></td>
                                                        <td class="">Table NO :<h4 class="text-danger"><?php echo " ".$value->table_id; ?></h4></td>
                                                        <td>
                                                            <?php //Burada sipariş görüntelemek için bir modal oluşturuyoruz başlangıç******** *****************************************?>
                                                            <!-- Button trigger modal -->
                                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tableOrder-<?php echo $value->card_id; ?>">
                                                                  ver pedido
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal modal-lg fade" id="tableOrder-<?php echo $value->card_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                  <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                      <div class="modal-header">
                                                                        <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Ordem da Tabela-<?php echo $value->table_id; ?></h1>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                      </div>
                                                                      <div class="modal-body text-dark">


                                                                        <div class="row p-4  rounded-4 shadow-lg">
                                                                            <!-- Siparişi iptal edeceğiz Yoksa yazdıracakmıyız kutusu burada -->1
                                                                            <div class="row   p-4 " > 
                                                                                <div class="col-6">
                                                                                    <?php if($value->statu != 'iptal' && $value->statu != 'teslim' ) {?>
                                                                                        <a class="text-start  text-danger" href="<?php echo SITEURL; ?>admin/update/table_order.php?cart_id=<?php echo $value->card_id; ?>&p=iptal"> 
                                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                                                                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                                                                            </svg> 
                                                                                        </a>
                                                                                    <?php } ?>
                                                                                </div>
                                                                                <div class="col-6 text-end">
                                                                                    <a class=" text-warnig " href="<?php echo SITEURL; ?>admin/print/table-print.php?cart_id=<?php echo $value->card_id; ?>" >
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-printer-fill " viewBox="0 0 16 16">
                                                                                        <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                                                                                        <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                                                                        </svg> 
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        <table class="table table-dark table-striped table-hover">
                                                                             <thead>
                                                                                <tr>

                                                                                  <th scope="col">Nome do alimento</th> 
                                                                                  <th>Produtos extras</th>
                                                                                  <th scope="col">Numero de refeicoes</th>
                                                                                  <th scope="col">Preco da refeicao</th>
                                                                                  <th scope="col">Preco total</th>
                                                                                </tr>
                                                                              </thead>
                                                                              <tbody>
                                                                                  <?php 

                                                                                   $siparis = $db->query("SELECT * FROM tbl_table_order WHERE statu ='bekliyor...' AND card_id = '$value->card_id' ORDER BY card_id DESC ",PDO::FETCH_OBJ)->fetchAll();
                                                                                    foreach ($siparis as $food) {
                                                                                        ?>
                                                                                        <tr>
                                                                                            <td> 
                                                                                                <?php echo $getFood->getFoodName($food->food_id, $db)->title; ?>
                                                                                            </td>
                                                                                            <?php if ($food->extra_name == "") {
                                                                                               echo "<td>-</td>";
                                                                                            }else{
                                                                                                $extraIDs = explode(",", $food->extra_name);
                                                                                                echo "<td>";
                                                                                                foreach ($extraIDs as $extraID ) {
                                                                                                    $extra = $db->query("SELECT * FROM tbl_product WHERE id= '$extraID' ",PDO::FETCH_OBJ)->fetchAll();
                                                                                                    echo $extra[0]->product_name. " (+R$ ".$extra[0]->product_price.") <br>";
                                                                                                }
                                                                                                echo "</td>";
                                                                                               // echo "<td>". $food->extra_name ."</td>";
                                                                                            } ?>
                                                                                            
                                                                                            <td><?php echo $food->qty; ?></td>
                                                                                            <td> R$ <?php echo $food->price; ?></td>
                                                                                            <td> R$ <?php echo $food->total_price ?></td>
                                                                                        </tr>
                                                                                        <?php
                                                                                    }
                                                                                 ?>
                                                                              </tbody>
                                                                        </table>
                                                                        
                                                                      </div>
                                                                      <div class="modal-footer">
                                                                        <a href="<?php echo SITEURL; ?>admin/update/table_order.php?cart_id=<?php echo $value->card_id; ?>&p=iptal" class="btn btn-danger">Cancelar pedido</a>
                                                                         <a href="<?php echo SITEURL; ?>admin/update/table_order.php?cart_id=<?php echo $value->card_id; ?>&p=order" class="btn btn-success">Aceitar pedido</a>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                            <?php //Burada sipariş görüntelemek için bir modal oluşturuyoruz Bitişiii******** *****************************************?>





                                                            <a href="<?php echo SITEURL; ?>admin/update/table_order.php?cart_id=<?php echo $value->card_id; ?>&p=order" class="btn btn-success">Accept</a>
                                                        </td>
                                                    </tr>

                                                    <?php
                                                     if ($value->statu =="bekliyor...") {

                                                            ?>  <audio  src="<?php echo SITEURL; ?>/ses/order.mp3" autoplay loop ></audio>  <?php 
                                                        }                        

                                
                                                    $check_cart = $value->card_id;

                                                    
                                                }
                                                else
                                                {
                                                    continue;
                                                }
                                                

                                            }
                                         ?>
                                         </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                             <!--Burada  table Order için tablosundan gelen veriler bitişidir.....-->




                                                        <!--Burada delivery food_order tablosundan gelen veriler-->
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                         <?php 
                                            $sql = "SELECT COUNT(DISTINCT cart_id) AS unique_card_count
                                                    FROM tbl_food_order
                                                    WHERE order_status = 'bekliyor...' OR order_status = 'hazırlanıyor...' OR order_status = 'yolda...' ";

                                            $result = $conn->query($sql);

                                           
                                                // Fetch the result as an associative array
                                                $row = $result->fetch_assoc();
                                                $uniqueCardCount = 0;
                                                $uniqueCardCount = $row["unique_card_count"];
                                                 

                                         ?>
                                       <span class="badge bg-danger badge-lg  "><b class="bold"><?php echo $uniqueCardCount; ?></b> </span>  
pedido para viagem
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas>
                                         <table class="table table-dark table-striped table-hover">
                                            <thead>
                                                <tr>
                                                  <th scope="col">#</th>
                                                  <th scope="col">Nome do cliente</th>
                                                  <th>Total de pedidos</th>
                                                  <th>Valor do pedido</th> 
                                                  <th scope="col">Movimentos</th>
                                                </tr>
                                            </thead>
                                            <tbody>


 
 
                                        <?php 
                                        $foods = $db->query("SELECT * FROM tbl_food_order WHERE order_status ='bekliyor...' OR order_status = 'hazırlanıyor...' OR order_status = 'yolda...'  ORDER BY order_date DESC ",PDO::FETCH_OBJ)->fetchAll();

                                            
                                            $check_cart = 0;
                                            $sn =1;
                                            foreach ($foods as $key => $value) {
                                                
                                                if ($value->cart_id != $check_cart) {
                                                    
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $sn++ ?></td>
                                                        <td class=""><?php 
                                                        $customer = $getCustomer->getCustomerAllInformation($value->customer_id, $db);
                                                        
                                                        echo $customer->customer_full_name;
                                                         ?> </td>

                                                         <td class=""><?php $countOfCart = $cart->getCountCart($value->cart_id, $db); ?> <h4 class="text-danger"><?php echo " ". $countOfCart ; ?></h4></td>

                                                        <td class=""><?php 
                                                           $priceOfCart = $cart->getTotalPrice($value->cart_id, $db);
                                                         ?> <h4 class="text-danger"><?php echo "R$ ".$priceOfCart; ?></h4></td>

                                                         <td>
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewOrder-<?php echo $value->cart_id; ?>">
                                                             ver ordem
                                                            </button>
                                                        </td>

                                                        <!--Burası gelen siparişleri görüntülendiği modladir-->
                                                        <!-- Modal -->
                                                            <div class="modal fade modal-xl" id="viewOrder-<?php echo $value->cart_id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                              <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                  <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel"><?php echo $customer->customer_full_name; ?></h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                  </div>
                                                                  <div class="modal-body">

                                                                    <?php 
                                                                        $customerInfo = $getCustomer->getCustomerAllInformation($value->customer_id, $db);
                                                                        


                                                                        ?>

                                                                     <h1>Informacao ao Cliente</h1>
                                                                        <ul>
                                                                            <li>Nome: <?php echo $customerInfo->customer_full_name; ?> </li>
                                                                            <li>Telefone: <?php echo $customerInfo->customer_number; ?></li>
                                                                            <li>Endereco: <?php echo $customerInfo->customer_address; ?></li>
                                                                             <li>Cep: <?php echo $customerInfo->customer_zip; ?></li>
                                                                        </ul>
                                                                        
                                                                         <h2>Ordens Dadas</h2>

                                                                   <ul>

                                                                       <?php 


                                                                        $food_orders = $db->query("SELECT * FROM tbl_food_order WHERE cart_id= '$value->cart_id' ",PDO::FETCH_OBJ)->fetchAll();

                                                                        foreach ($food_orders as $food_order ) {
                                                                           echo "<li><b>".$getFood->getFoodName($food_order->food_id, $db)->title."</b>";
                                                                           if ($food_order->extra_name !="") {
                                                                                $extra_product = $food_order->extra_name;
                                                                                $extra_product = explode(",", $extra_product);
                                                                              //  print_r($extra_product);
                                                                              // echo " Extra idleri = ".$food_order->extra_name."</li>";
                                                                                foreach ($extra_product as $product) {
                                                                                    $products = $db->query("SELECT * FROM tbl_product WHERE id ='$product' ", PDO::FETCH_OBJ)->fetchAll();

                                                                                    echo " ". $products[0]->product_name." (+R$".$products[0]->product_price.")";
                                                                                }
                                                                           }

                                                                            
                                                                        }
                                                                        ?>
                                                                   </ul>


                                                                                

                                                                         


                                                                  </div>

                                                                  <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button> 
                                                                    <a class="btn btn-primary" href="<?php echo SITEURL; ?>admin/print/order-print.php?cart_id=<?php echo $value->cart_id; ?>">Imprimir</a>
                                                                    <?php if ($value->order_status == "bekliyor...") {
                                                                        ?>
                                                                            <a href="<?php echo SITEURL; ?>admin/update/order.php?p=accept&cart_id=<?php echo $value->cart_id; ?>" class="btn btn-success">Aceita pedido</a>
                                                                        <?php
                                                                    } elseif ($value->order_status == "hazırlanıyor...") {
                                                                        // code...Buraya ya tesslim etme buttonu koy
                                                                        ?>
                                                                            <a href="<?php echo SITEURL; ?>admin/update/order.php?p=goesout&cart_id=<?php echo $value->cart_id; ?>" class="btn btn-warning">Pedido a caminho</a>
                                                                        <?php

                                                                    } elseif ($value->order_status == "yolda...") {
                                                                        ?>
                                                                            <a href="<?php echo SITEURL; ?>admin/update/order.php?p=delivery&cart_id=<?php echo $value->cart_id; ?>" class="btn btn-primary">Pedido entregue</a>
                                                                        <?php
                                                                    }?>
                                                                   
                                                                  </div>

                                                                </div>
                                                              </div>
                                                            </div>
                                                        <!--Burası gelen siparişleri görüntülendiği modalin bitişidirr..**-->

                                                        <?php if ($value->order_status == "bekliyor...") {
                                                            ?>
                                                             
                                                            <?php

                                                        } ?>
                                                       
                                                    </tr>

                                                    <?php
                                                     if ($value->order_status =="bekliyor...") {

                                                            ?>  <audio  src="<?php echo SITEURL; ?>/ses/order.mp3" autoplay loop ></audio>  <?php 
                                                        }                        

                                
                                                    $check_cart = $value->cart_id;
                                                }
                                                else
                                                {
                                                    continue;
                                                }
                                                

                                            }
                                         ?>
                                         </tbody>
                                        </table>
                                    </div>
                                </div> 
                            </div>
                                 <!--Burada delivery food_order tablosundan gelen veriler KISMIDIR-->







                    </div>







                             <!--Burası Masa kısımlarıdır maasaların güncelliği burada olacak -->
                        <div class="container ">
                            <div class="row">
                                <h3 class="text-center">Table</h3>

                                <?php 
                                    $tables = $db->query("SELECT * FROM tbl_table",PDO::FETCH_OBJ)->fetchAll();

                                    foreach ($tables as $table) {
                                        ?>
                                         <div class="col-xl-3 col-md-6  " > 
                                            <div class=" border my-2 d-flex justify-content-center  ">
                                                 <?php if ($table->status == "bussy") {

                                                        ?>
                                                        <div class="row   px-3">
                                                            <div class="bg-primary col-3 text-center"><h3><?php echo $table->id; ?></h3></div>

                                                             <?php 
                                                                    $cart_ids = $table->cart_ids;
                                                                    $ids = explode(",", $cart_ids);
                                                                    $totalTablePrice=0;
                                                                    foreach ($ids as $id) {
                                                                       
                                                                      $totalTablePrice +=  $tableCart->getTotalPrice($id, $db);
 
                                                                    }
                                                                    $firstTableOrder = $tableCart->getAllCart($ids[0], $db);
                                                                    $firstOrderDate = $firstTableOrder[0]->order_date;
                                                                    $dateTime = new DateTime($firstOrderDate);
                                                                    $hour = $dateTime->format("H");
                                                                    $minute = $dateTime->format("i");

                                                                 ?>
                                                            <div class="col-8"><p class="food-detail text-end"><i class="fa-regular fa-clock"></i><?php echo $hour.":".$minute ; ?></p></div>
                                                            <div class="col-12 py-4">
                                                               
                                                                ->Preco total: <b>R$ <?php echo $totalTablePrice; ?></b>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                                  <a href="<?php echo SITEURL; ?>admin/update/table.php?p=clean&table_id=<?php echo $table->id; ?>" class="btn btn-danger">Mesa Limpa</a>
                                                                  <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#table-<?php echo $table->id; ?>-modal">Ver pedidos</button>
                                                                   
                                                                </div>
                                                            </div>

                                                            
 
                                                        </div>

                                                        <!--Table tablosunda siparişi görüntülemek i.in modal-->
                                                        <div class="modal  fade " id="table-<?php echo $table->id; ?>-modal" tabindex="1" aria-labelledby="table<?php echo $table->id; ?>" aria-hidden ="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="table<?php $table->id 
                                                                        ;?>">
                                                                            Pedidos para a Tabela-<?php echo $table->id; ?>
                                                                        </h1>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                       <?php 
                                                                            $personNumber = 1;
                                                                            foreach ($ids as $id ) {
                                                                                ?>  
                                                                                    <a href="<?php echo SITEURL; ?>admin/print/table-print.php?cart_id=<?php echo $id; ?>">
                                                                                        <div class="bg-secondary mt-2 p-3">
                                                                                            <?php 

                                                                                                 echo "<h4 class='text-dark'>Pessoa  ".$personNumber++."</h4>";
                                                                                                $tableCartFoods = $tableCart->getAllCart($id, $db);
                                                                                                ?>
                                                                                                <table class="table">
                                                                                                            <th>Quantidade</th>
                                                                                                            <th>Comida</th>
                                                                                                            <th>Nome Extra</th>
                                                                                                            <th>Preco extra</th>
                                                                                                            <th>Preco total</th>
                                                                                                <?php
                                                                                                foreach ($tableCartFoods as $food ) {
                                                                                                    ?>
                                                                                                        <tr>
                                                                                                            <td><?php echo $food->qty; ?></td>
                                                                                                            <?php 
                                                                                                                $ext = $food->extra_name;
                                                                                                                $extra_product_ids = explode(",",$ext);
                                                                                                             ?>
                                                                                                            <td>
                                                                                                                <?php 
                                                                                                                    echo $getFood->getFoodName($food->food_id, $db)->title; 
                                                                                                                ?>
                                                                                                                    
                                                                                                            </td>

                                                                                                              <td>
                                                                                                            <?php 

                                                                                                            if ($food->extra_name != "") {
                                                                                                                // code...
                                                                                                            
                                                                                                                $ext = $food->extra_name;
                                                                                                                $extra_product_ids = explode(",",$ext);
                                                                                                             ?>
                                                                                                            
                                                                                                                <?php 
                                                                                                                   foreach ($extra_product_ids as $id) {
                                                                                                                        $products= $getProduct->getProductName($id, $db); 
                                                                                                                        echo "+".$products->product_name."<br> ";                                                                                   
                                                                                                                    }
                                                                                                                }
                                                                                                                ?>
                                                                                                                    
                                                                                                            </td>

                                                                                                            <td>R$ <?php echo $food->extra_price; ?></td>
                                                                                                            <td>R$ <?php echo $food->total_price; ?></td>
                                                                                                        </tr>
                                                                                                        
                                                                                                    <?php 
                                                                                                }

                                                                                             ?>
                                                                                                <tr>
                                                                                                    <td colspan="2" ><p class=" font-weight-bold">Preco total do pedido</p></td>
                                                                                                    <td colspan="3" class="text-end">$R <?php echo $tableCart->getTotalPrice($id, $db); ?></td>
                                                                                                </tr>

                                                                                             </table>
                                                                                        </div>
                                                                                    </a>
                                                                                <?php
                                                                               
                                                                                echo "<hr>";
                                                                            }

                                                                        ?>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                       

 
   
                                                        <?php

                                                    } else{ ?>
                                                     
                                               <div class="text-center">
                                                  <div class="blurry-box" style=" width: 200px;
                                                    height: 200px;
                                                    background-color: rgba(211, 211, 211, 0.8);
                                                    backdrop-filter: blur(10px);
                                                    border-radius: 10px;
                                                    display: flex;
                                                    flex-direction: column;
                                                    align-items: center;
                                                    justify-content: center;">
                                                    <h1 class="text-center" style="font-size: 48px;
                                                    margin: 0;"><?php echo $table->id; ?></h1>
                                                    <p class="text-muted" style="font-size: 12px;
                                                    margin: 0;">Nao ha ordem</p>
                                                  </div>
                                                </div>
 
                                                      
                                                
                                                 <?php } ?>

                                            </div>
                                        </div>

                                        <?php
                                    }
                                 ?>
                                
                               

                            </div>
                        </div>
                           <!--Burası Masa kısımlarıdır maasaların güncelliği burada olacak bitişiii -->




                             <!--Burası Bütün siparişlerin göründüğü kısımdır    -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                All Orders
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Card Id</th>
                                            <th>Customer Name</th>
                                            <th>Cip Code</th>
                                            <th>Total Price</th>
                                            <th>Order date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th >Card Id</th>
                                            <th>Customer Name</th>
                                            <th>Cip Code</th>
                                            <th>Total Price</th>
                                            <th>Order date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                             $sn =1;
                                          $complate_orders = $db->query("SELECT * FROM tbl_food_order WHERE (order_status = 'teslim...' OR order_status= 'iptal...') AND cart_id != '0' ORDER BY order_date DESC ",PDO::FETCH_OBJ)->fetchAll();


                                             foreach ($complate_orders as $key => $value) {

                                                  if ($value->cart_id != $check_cart) {
                                                        
                                                    ?>

                                                   <tr>

                                                      
                                                        <td><?php echo $sn++; ?></td>
                                                        <td><?php echo $getCustomer->getName($value->customer_id, $conn); ?></td>
                                                        <td><?php echo $getCustomer->getCustomerAllInformation($value->customer_id, $db)->customer_zip; ?></td>
                                                        <td> R$ <?php echo $cart->getTotalPrice($value->cart_id, $db) ;?></td>
                                                        <td><?php echo $value->order_date; ?></td>
                                                        <td><a href="<?php echo SITEURL ?>admin/view-order.php?sepet_id=<?php echo $value->cart_id; ?>" class="btn btn-success">Ver Pedido</a></td>

                                                     
                                                         
                                                    </tr>
                                               

                                                    <?php
                                                     $check_cart = $value->cart_id;
                                                  }else{
                                                    continue;
                                                  }
                                                
                                            }




                                         ?>

 

                                         

                                        
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                             <!--Burası Bütün siparişlerin göründüğü kısımbitişidi    -->



                           
                            <!--Burası Bütün Masa siparişlerin göründüğü kısımdır    -->
                        <div class="card mb-4">
                            <div class="card-header  ">
                                <i class="fas fa-table me-1"></i>
                                All Table Orders
                            </div>
                            <div class="card-body  ">
                                <table id="datatablesSimple" class="table"  >
                                    <thead>
                                        <tr>
                                            <th>Card Id</th>
                                            <th>Table Numa</th> 
                                            <th>Total Price</th>
                                            <th>Order date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php 
                                             $sn =1;
                                          $complate_orders = $db->query("SELECT * FROM tbl_table_order WHERE (statu != 'bekliyor...' ) AND card_id != '0' ORDER BY order_date DESC ",PDO::FETCH_OBJ)->fetchAll();


                                             foreach ($complate_orders as $key => $value) {

                                                  if ($value->card_id != $check_cart) {
                                                        
                                                    ?>

                                                   <tr>

                                                      
                                                        <td><?php echo $sn++; ?></td>
                                                        <td><h3 class="text-danger"><?php echo $value->table_id; ?></h3></td> 
                                                        <td> R$ <?php echo $tableCart->getTotalPrice($value->card_id, $db) ;?></td>
                                                        <td><?php echo $value->order_date; ?></td>
                                                        <td> 
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#table-modal-card-<?php echo $value->card_id; ?>">
                                                              Ver Pedido
                                                            </button>
                                                        </td>
     
                                                    </tr>
                                               
                                                    <?php
                                                     $check_cart = $value->card_id;
                                                  }else{
                                                    continue;
                                                  }


                                                
                                            }



                                         




                                         ?>

 

                                         

                                        
                                       
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th >Card Id</th>
                                            <th>Customer Name</th> 
                                            <th>Total Price</th>
                                            <th>Order date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                             <!--Burası Bütün Masa siparişlerin göründüğü kısımbitişidi    -->
                       


<?php 

    
                                             foreach ($complate_orders as $key => $value) {
                                                ?>


                                                         <!-- Modal -->
                                                                <div class="modal modal-lg fade" id="table-modal-card-<?php echo $value->card_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                  <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                      <div class="modal-header">
                                                                        <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Ordem da Tabela-<?php echo $value->table_id; ?></h1>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                      </div>
                                                                      <div class="modal-body text-dark">


                                                                        <div class="row p-4  rounded-4 shadow-lg">
                                                                            <!-- Siparişi iptal edeceğiz Yoksa yazdıracakmıyız kutusu burada -->
                                                                            <div class="row   p-4 " > 
                                                                                <div class="col-6">
                                                                                    
                                                                                </div>
                                                                                <div class="col-6 text-end">
                                                                                    <a class=" text-warnig " href="<?php echo SITEURL; ?>admin/print/table-print.php?cart_id=<?php echo $value->card_id; ?>" >
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-printer-fill " viewBox="0 0 16 16">
                                                                                        <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                                                                                        <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                                                                        </svg> 
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        <table class="table table-dark table-striped table-hover">
                                                                             <thead>
                                                                                <tr>

                                                                                  <th scope="col">Nome do alimento</th> 
                                                                                  <th>Produtos extras</th>
                                                                                  <th scope="col">Numero de refeicoes</th>
                                                                                  <th scope="col">Preco da refeicao</th>
                                                                                  <th scope="col">Preco total</th>
                                                                                </tr>
                                                                              </thead>
                                                                              <tbody>
                                                                                  <?php 

                                                                                   $siparis = $db->query("SELECT * FROM tbl_table_order WHERE card_id = '$value->card_id' ORDER BY card_id DESC ",PDO::FETCH_OBJ)->fetchAll();
                                                                                    foreach ($siparis as $food) {
                                                                                        ?>
                                                                                        <tr>
                                                                                            <td> 
                                                                                                <?php echo $getFood->getFoodName($food->food_id, $db)->title; ?>
                                                                                            </td>
                                                                                            <?php if ($food->extra_name == "") {
                                                                                               echo "<td>-</td>";
                                                                                            }else{
                                                                                                $extraIDs = explode(",", $food->extra_name);
                                                                                                echo "<td>";
                                                                                                foreach ($extraIDs as $extraID ) {
                                                                                                    $extra = $db->query("SELECT * FROM tbl_product WHERE id= '$extraID' ",PDO::FETCH_OBJ)->fetchAll();
                                                                                                    echo $extra[0]->product_name. " (+R$ ".$extra[0]->product_price.") <br>";
                                                                                                }
                                                                                                echo "</td>";
                                                                                               // echo "<td>". $food->extra_name ."</td>";
                                                                                            } ?>
                                                                                            
                                                                                            <td><?php echo $food->qty; ?></td>
                                                                                            <td> R$ <?php echo $food->price; ?></td>
                                                                                            <td> R$ <?php echo $food->total_price ?></td>
                                                                                        </tr>
                                                                                        <?php
                                                                                    }
                                                                                 ?>
                                                                              </tbody>
                                                                        </table>
                                                                        
                                                                      </div>
                                                                      <div class="modal-footer">
                                                                         
                                                                         
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                            <?php //Burada sipariş görüntelemek için bir modal oluşturuyoruz Bitişiii******** *****************************************?>



 

                                                <?php
                                             }






 ?>

 

 
                </main>

                <script>
                // Değişkeni hedef etikete yazdırma
                document.getElementsByClassName('badge').textContent = "15";
                </script>

<?php include("partials/footer.php"); ?>              
               
 