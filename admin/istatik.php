<?php include("partials/menu.php"); ?>
<?php  require_once("partials/getData/getData.php");  ?>
		 


<?php 
	
	$cart = new cartOrderData();
	$getFood = new foodData();
	$getCustomer = new customerData(); 
	$tableCart = new cartTableData();
	$getProduct = new productData();


	

 ?>

 <div class="container">
 	<h2 class="text-center">Statistiken</h2>
 	<hr>
 	<div class="row">

 		<div class="col-6">
 			<h4 class="text-center">Table Order</h4>
 			<div class=" m-2">
 				<div class="row">
 					<?php 

 	// Siparişleri çek
$sql = "SELECT * FROM tbl_table_order WHERE DATE(order_date) = CURDATE() ORDER BY card_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $currentCartId = null;
    $totalPrice = 0;
    $totalday = 0; 

    while($row = $result->fetch_assoc()) {
        if ($row['card_id'] != $currentCartId) {
            // Yeni bir siparişin başlangıcı
            if ($currentCartId !== null) {
                // Önceki siparişi kapat
                echo "<p><h3>Toplam Fiyat: $totalPrice</h3></p>";

                echo "<hr></div>"; // Sipariş kutusunu kapat
                 $totalday += $totalPrice;
            }

            // Yeni bir siparişin başlangıcı
            echo "<div class='order-box mt-4'>";
            ?>
            	<div class='mt-0 mr-0 <?php echo $row['statu'] == "iptal" ? "bg-danger" : "bg-success"; ?> p-2'>
				    <small>Durum <?php echo $row['statu']; ?> </small>
				</div>


            <?php
            
            echo "<h4>Table number #{$row['table_id']}</h4>";
            $totalPrice = 0;
            $currentCartId = $row['card_id'];
        }

        echo "<div class='row'>";
        echo "<div class='col-6'>" . ($getFood->getFoodName($row['food_id'], $db)->title ?? '') . "</div>";


        echo "<div class='col-6'> R$ {$row['total_price']}</div>";
        // Diğer bilgileri ekleyebilirsiniz
        echo "</div>";

        // Fiyatları topla
        if ($row['statu'] == "iptal") {
        	$totalPrice -= $row['total_price'];
        }

      
        $totalPrice += $row['total_price'];

       
    }

    // Son siparişi kapat
    echo "<p><h3>Toplam Fiyat: $totalPrice</h3></p>";
    echo "</div>"; // Sipariş kutusunu kapat

    echo "<h2 class='text-center '>Gününün toplamı : ".$totalday."</h2>";


} else {
    echo "Bugün hiç sipariş yok.";
}

 
 					 ?>
 				</div>
 			</div>

 		</div>

 		







 		<div class="col-6">
    <h4 class="text-center">Order</h4>
    <div class=" m-2">
        <div class="row">
            <?php
            // Siparişleri çek
            $sql = "SELECT * FROM tbl_food_order WHERE DATE(order_date) = CURDATE() ORDER BY cart_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $currentCartId = null;
                $totalPrice = 0;
                $totaldayorder = 0;

               

                while ($row = $result->fetch_assoc()) {

                    if ($row['cart_id'] != $currentCartId) {
                        // Yeni bir siparişin başlangıcı
                        if ($currentCartId !== null) {
                            // Önceki siparişi kapat
                            echo "<p><h3>Toplam Fiyat: $totalPrice</h3></p>";

                            echo "<hr></div>"; // Sipariş kutusunu kapat
                             $totaldayorder += $totalPrice;
                        }

                        // Yeni bir siparişin başlangıcı
                        echo "<div class='order-box mt-4'>";
                        ?>
                        <div class='mt-0 mr-0 <?php echo $row['order_status'] == "iptal" ? "bg-danger" : "bg-success"; ?> p-2'>
                            <small>Durum <?php echo $row['order_status']; ?> </small>
                        </div>

                        <?php

                        echo "<h4>Customer name # ". $getCustomer->getName($row['customer_id'], $conn ) ."</h4>";
                        $totalPrice = 0;
                        $currentCartId = $row['cart_id'];

                    }



                    echo "<div class='row'>";
                    echo "<div class='col-6'>" . ($getFood->getFoodName($row['food_id'], $db)->title ?? '') . "</div>";
                    echo "<div class='col-6'> R$ {$row['total_price']}</div>";
                    // Diğer bilgileri ekleyebilirsiniz
                    echo "</div>";

                    

                    // Fiyatları topla
                    if ($row['order_status'] == "iptal") {
                        $totalPrice -= $row['total_price'];
                    }

                    $totalPrice += $row['total_price'];
 
                 

                } 

                // Son siparişi kapat
                echo "<p><h3>Toplam Fiyat: $totalPrice</h3></p>";
                echo "</div>"; // Sipariş kutusunu kapat

                echo "<h2 class='text-center '>Gününün toplamı : " . $totaldayorder . "</h2>";
            } else {
                echo "Bugün hiç sipariş yok.";
            }
            ?>
        </div>
    </div>
</div>

















 	</div>

 	<div class="row border	">
 		
 		 <?php echo "<h2 class='text-center'> Günlük ciro : ".$totalday+$totaldayorder."</h2>"; ?>
 	</div>

 </div>







<?php include("partials/footer.php"); ?>