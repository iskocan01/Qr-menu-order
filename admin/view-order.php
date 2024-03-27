<?php include("partials/menu.php"); ?>
<?php  require_once("partials/getData/getData.php"); ?>

<?php 
	
	$cart = new cartOrderData();
	$getFood = new foodData();
	$getCust = new customerData();
	$changeOrderStatus = new orderStatus();

	
	if (isset($_GET['sepet_id'])) {//eğer sepet id get edildiyse
		$cart_id = $_GET['sepet_id']; 
		$foods = $cart->getAllCart($cart_id, $db);//sipariş bilgilerinin tamamamını aldık
		$sn=0;
		$customer_id = $foods[0]->customer_id;//müsteri id sini aldık
		$info_cust = $getCust->getCustomerAllInformation($customer_id, $db);//müşterinin mütün bilgilerinin aldık

		//test ve görüntü kodları
		//$test = $changeOrderStatus->orderStatusUpdate($cart_id, $db);/// bu kodu burda unuttum ve her severin de neden çalışıyor diye düşünüyorum
		
		 

	}
 ?> 


		 
<main>
<div class="container-fluid border px-4 border ">
	<div class=" ">
		<div class="row">
			<h2 class="text-center">Ver Pedido</h2>
		</div>
		<div class="row border my-light-color my-4 p-3  rounded-4 shadow-lg">
		<div class="row  ">
			<div class=" col-6">
				<h3>Costomer info</h3>
				<h6 ><?php echo $info_cust->customer_full_name; ?></h6>
				<p><?php echo $info_cust->customer_number; ?></p>
				<p><?php echo $info_cust->customer_zip; ?></p>
				<p><?php echo $info_cust->customer_email; ?></p>  
			</div>
			<div class=" col-6">
				<h3>Adress info</h3>  
				<p><?php echo $info_cust->customer_zip; ?></p>
				<p><?php echo $info_cust->customer_address; ?></p>  
			</div>
			 
			 
	 		  

				<div class="row "><h6 class="text-end">Date :  <?php echo date("H:i:s", strtotime($foods[0]->order_date)); ?></h6></div>
			</div> 
		</div>
	</div>

	<div class="row p-4  rounded-4 shadow-lg">
		<!-- Siparişi iptal edeceğiz Yoksa yazdıracakmıyız kutusu burada -->
		<div class="row   p-4 " > 
			<div class="col-6">
				<?php if($foods[0]->order_status != 'iptal...' && $foods[0]->order_status != 'teslim...' ) {?>
					<a class="text-start  text-danger" href="<?php echo SITEURL; ?>admin/partials/islem/islem.php?p=iptal&x=<?php echo $cart_id; ?>"> 
						<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
							<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
						</svg> 
					</a>
				<?php } ?>
			</div>
			<div class="col-6 text-end">
				<a class="  " href="<?php echo SITEURL; ?>admin/print/order-print.php?cart_id=<?php echo $cart_id; ?>" >
					<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-printer-fill " viewBox="0 0 16 16">
					<path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
					<path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
					</svg> 
				</a>
			</div>
		</div>

		<table class="table table-striped border table-hover rounded-4 shadow-lg">
  			<tr>
  				<th>Pedaço</th>
  				<th>Nome do alimento</th>
  				<th>Preço</th> 
				<th>Extras </th>	
  				 
  				<th>Preço total</th>

  				
  			</tr>

  			<?php foreach ($foods as $food) {//tablo için for döngüsünün başladığı  yer burasııııı
  				
  			 ?>
  			<tr>
  				<td><?php   echo $food->qty." X";?></td>
  				<td>
  					<?php 
  						 
  						 echo $getFood->getFoodName($food->food_id ,$db)->title;
  						
  					 ?>
  				</td>
  				<td>€  <?php   echo $food->price; ?></td>
  				 
				<td>
					<?php 
						if($food->extra_name != "" ){
							$str = explode(",", $food->extra_name);
							foreach($str as $val){
								$product = $db->query("SELECT * FROM tbl_product WHERE id = '$val' ",PDO::FETCH_OBJ)->fetchAll();
								echo $product[0]->product_name."(+".$product[0]->product_price."), ";
							}
						}else{
							echo	"______";
						}

					?>
				</td>
  				 
  				<td>€ <?php echo $food->total_price ;?></td>
  			</tr>

  			<?php } //Burası foreachdöngüsünün bittiği parantez    ?>

				<?php if($foods[0]->order_note != "ordernote-null" ){  ?>
				<tr>
					<td  colspan="2"> <h5 class="text-center"><b> Müşteri notu </b></h5> </td>
					<td></td>
					<td></td>
					<td colspan="2"><?php echo $foods[0]->order_note; ?></td>
				</tr>
				<?php } ?>



		  		<?php 

				 
				
				 
				 

				 
				$servis =0;
				 


				?>			

					<tr>
							<td colspan="3">
								<strong><p class="text-center text-danger bold">Desconto de campanha</p></strong>
							</td>
							<td>
								<i>İndirim tutarı : </i>
							</td>
							<td>
								
								€ <?php $indirim=0; echo $indirim; ?>
							</td>

						</tr>
		  				<td colspan="4">Montante total :</td>
		  				<td>
		   					<strong > 
		  						 <p class=" ">€ <?php  echo ($cart->getTotalPrice($cart_id, $db))+$indirim + $servis ;?></p>
		  					</strong> 					
		  				</td>
		  			</tr>
  		 
		</table>
		<div class="row">
			<div class="col-6"></div>
			<div class="col-6">
				<div class="row m-botton-5">
					 
 					<?php 
 					if ($foods[0]->order_status == "bekliyor...") { 
 						 
 						?>
						
					  
  


						 <?php
 					}elseif ($foods[0]->order_status == "hazırlanıyor...") {
 						// Hazırlanan sipariş
 						?>
							<a class="text-end" href="<?php echo SITEURL ?>admin/partials/islem/islem.php?cart_id=<?php echo	$cart_id;?>"><div  class="col-3  btn btn-secondary">Complate</div></a> <?php
 					}elseif ($foods[0]->order_status == "yolda...") {
 						// yolda
 						?>
						<a class="text-end" href="<?php echo SITEURL ?>admin/partials/islem/islem.php?cart_id=<?php echo	$cart_id;?>">
						<div  class='col-3   btn btn-dangery'>Teslim Et</div>
						</a><?php
 					}elseif ($foods[0]->order_status == "teslim") {
 						// tamamlanmış sipariş ?>
						<div class="row text-success   ">
								<svg  xmlns="http://www.w3.org/2000/svg" width="100" height="120" fill="currentColor" class="bi bi-check-all " viewBox="-25 0 16 16">
									<path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z"/>
								</svg>					
						</div>
							<?php
 					} else{
 						//Veri tabanına kayıt edilirken hata oluştu
 					}


 					 ?>
					
					
					
				</div> 
			</div> 
		</div>

	</div>
</div> 
</main>


<?php include("partials/footer.php"); ?>