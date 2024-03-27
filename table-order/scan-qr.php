<?php include("../config/constants.php"); 
 
?>


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



<?php

 
  

?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sipariş Onayı</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5 text-center">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Seu pedido foi enviado!</h4>
                    <p>Seu pedido foi recebido com sucesso. Nós agradecemos.</p>
                    <hr>
                    <p class="mb-0">Continue acompanhando. Tenha um bom dia!</p>
                </div>
            </div>
        </div>
    </div>
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
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

