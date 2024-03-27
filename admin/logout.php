<?php  include('../config/constants.php'); ?>

 

<?php unset($_SESSION['username']);
	header("location:".SITEURL."admin");
 ?>