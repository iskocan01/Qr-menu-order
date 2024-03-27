
<?php include("../config/constants.php"); ?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Administração</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 100px;
        }
        .card {
            border: 1px solid #dcdcdc;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
    	<?php 
    		  if (isset($_SESSION["info-error"])) { 
                    ?> 
                          <div class="alert alert-danger" role="alert">
                            <?php echo $_SESSION['info-error']; ?>
                         </div>
                    <?php
                    unset($_SESSION['info-error']);
                }
    	 ?>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Painel de Administração - Desenvolvido por Mehmet Hasan Alphan
                    </div>
                    <div class="card-body">
                       <form action="" method="POST">
                            <div class="form-group">
                                <label for="username">Nome de Usuário:</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Nome de Usuário" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Senha:</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Senha" required>
                            </div>

                            <?php 
                            	if (isset($_SESSION["no-login-massage"])) {
                            		echo $_SESSION["no-login-massage"];
                            		unset($_SESSION["no-login-massage"]);
                            	}
                             ?>
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Entrar</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php 
	
	if (isset($_POST['submit'])) { 
		
	//	$username = $_POST['username'];

		//echo md5($_POST["password"]);
 

		$username = mysqli_real_escape_string($conn, $_POST['username']);


		$password= mysqli_real_escape_string($conn, md5($_POST['password']));

		$sql ="SELECT * FROM tbl_admin WHERE user_name='$username' AND password='$password'";

		$res= mysqli_query($conn, $sql);

		$count = mysqli_num_rows($res);


		if ($count == 1) {
			
			$_SESSION['info-succes'] = "<div class='success' >Login Successful </div>";

			header('location:'.SITEURL.'admin');


			$_SESSION['username'] = $username;

		}
		else
		{
			$_SESSION['info-error'] = "<div>Şifre veya Kullanıcı Adı Yanlış</div>";

			 header('location:'.SITEURL.'admin/login.php');

 
		}
	


	/*
		$if ($count == 1) {

			//user avaible and Login success

			$_SESSION['login'] = "<div class='success'> Login Successfuly </div>";
								//"<div class='success'>Admin deleted Successfully</div>";

			 // anasayfaya Yönlendir

			header('location:'.SITEURL.'admin');

		}
		else{
		
			//user avaible and Login success

			$_SESSION['login']="<div class="error">Login Failed. </div>";

			 // anasayfaya Yönlendir

			header('location:'.SITEURL.'admin/login-admin.php');
		}



		*/

		// if ($res == true) { echo "Bağlantı tamam"; 	}
	} 
	
 ?>
