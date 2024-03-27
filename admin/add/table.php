<?php 
	include("../../config/constants.php");

	if (isset($_POST["submit"])) { 
		$tableNumber = $_POST['tableNumber'];
		$status = $_POST['status'];
		$personNumber = $_POST['personNumber'];

		$add_table = "INSERT INTO tbl_table SET
			table_number = :tableNumber,
			status = :status,
			person_number = :personNumber
			";

	// PDO prepare() yöntemini kullanarak sorguyu hazırlayın
	$stmt = $db->prepare($add_table);

	// Parametreleri bağlayın
	$stmt->bindParam(':tableNumber', $tableNumber);
	$stmt->bindParam(':status', $status);
	$stmt->bindParam(':personNumber', $personNumber);

	// Sorguyu çalıştırın
	$check = $stmt->execute();

	if ($check) {
		$_SESSION['info-succes'] = "<h3> Table is added </h3>";
		header("location:".SITEURL."admin/manage-table.php");
	}else {
	$_SESSION['info-error'] = "<h3> Table is not added </h3>";
		header("location:".SITEURL."admin/manage-table.php");
}
}
else {
	$_SESSION['info-error'] = "<h3> Table is not added </h3>";
		header("location:".SITEURL."admin/manage-table.php");
}
 ?>