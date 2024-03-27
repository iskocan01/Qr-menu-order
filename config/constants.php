<?php 
	


	//Start Session
	 
		session_start();
		

		// Create a session
		define('SITEURL', 'http://localhost/hasan/');

	// 3. Execute query and Save data in Database

		define('LOCALHOST', 'localhost');
		define('Db_username', 'root');
		define('Db_password', '');
		define('Db_name', 'bellenay');

		//Burası kategory idleri
		define('Sogukicecek', '28');
		define('Sicakicecek', 30);
		define('Alkolluicecek', '29');

		define('Sobremesa', '12');

		define('Massas', '13');


		
	
		try {
				$db = new PDO("mysql:host=".LOCALHOST.";dbname=".Db_name.";charset=utf8",Db_username,Db_password);
				
				 

		} catch (PDOException $e) {
			echo "Hata  ". $e->getMessage();
		}
		 

	 	$conn= mysqli_connect(LOCALHOST, Db_username, Db_password);//database connection //Database bağlatısı
		$db_select = mysqli_select_db($conn, Db_name) or die(mysqli_error());//selecting Database //Veritabanını seciyotuz
		mysqli_set_charset($conn, "utf8");
 ?>