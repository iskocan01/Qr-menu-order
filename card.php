
<?php include("partials-front/menu.php"); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZwTl" crossorigin="anonymous">
    <title>Card Design</title>

    <style>
        .card {
    width: 300px;
    margin: 20px;
}

.card img {
    height: 200px;
    object-fit: cover;
}

.card-<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Özel CSS Kodları */
    .custom-card {
        
      max-width: 25%; /* Her satıra en fazla 4 kart sığması için */
      margin-bottom: 20px;
      padding:80px;
      border: 2px solid black;
    }

    @media (max-width: 767px) {
  .custom-card {
    max-width: 100%; /* Mobil cihazlarda genişlik tam ekran olacak */
  }
}

  </style>
  <title>Card Tasarımı</title>
</head>
<body>

<div class="container">
  <div class="row">

  <?php
    			 $foods = $db->query("SELECT  * FROM tbl_food ORDER BY id DESC  ",PDO::FETCH_OBJ)->fetchAll();

    			  foreach ($foods as $food ) {
    			  	?>

    <!-- Kart 1 -->
    <div class=" col-12 col-sm-12 col-md-6 col-lg-4   custom-card d-flex justify-content-center">
      <div class="card">
        <img src="<?php echo SITEURL."images/food/".$food->image_name; ?>" class="card-img-top" alt="Ürün Resmi">
        <div class="card-body">
          <h5 class="card-title">Başlık 1</h5>
          <p class="card-text">Açıklama 1</p>
          <p class="card-text">Fiyat: $19.99</p>
          <button class="btn btn-primary">Sepete Ekle</button>
        </div>
      </div>
    </div>

      	<?php
    			  }
    		 ?>

    <!-- Kart 2 -->
    <div class="col-md-3 col-lg-4 custom-card">
      <div class="card">
        <img src="resim-url" class="card-img-top" alt="Ürün Resmi">
        <div class="card-body">
          <h5 class="card-title">Başlık 2</h5>
          <p class="card-text">Açıklama 2</p>
          <p class="card-text">Fiyat: $29.99</p>
          <button class="btn btn-primary">Sepete Ekle</button>
        </div>
      </div>
    </div>

    <!-- Kart 3 -->
    <div class="col-md-3 col-lg-4 custom-card">
      <div class="card">
        <img src="resim-url" class="card-img-top" alt="Ürün Resmi">
        <div class="card-body">
          <h5 class="card-title">Başlık 3</h5>
          <p class="card-text">Açıklama 3</p>
          <p class="card-text">Fiyat: $39.99</p>
          <button class="btn btn-primary">Sepete Ekle</button>
        </div>
      </div>
    </div>

    <!-- Kart 4 -->
    <div class="col-md-3 custom-card">
      <div class="card">
        <img src="resim-url" class="card-img-top" alt="Ürün Resmi">
        <div class="card-body">
          <h5 class="card-title">Başlık 4</h5>
          <p class="card-text">Açıklama 4</p>
          <p class="card-text">Fiyat: $49.99</p>
          <button class="btn btn-primary">Sepete Ekle</button>
        </div>
      </div>
    </div>

    <!-- Diğer kartlar buraya eklenebilir -->

  </div>
</div>

 


<?php include("partials-front/footer.php"); ?>
 
