$(document).ready(function(){

	$('.addToCartBtn').click(function(){


		var id = $(this).attr("product-id");
		var meat_id = "product-"+id;



	 	 
		
		var url="http://localhost/hasan/config/cart-db.php";	
		var data = {
			p:'addToCart', 
			product_id : $(this).attr('product-id'),

			checkedValues: $('input[name="'+meat_id+'"]:checked').map(function(){ 
				return $(this).val();
			}).get().join(",")
			

		}

		

		$.post(url, data, function (response){
			$(".cart-count").text(response);
			//alert(response);
			window.location.reload(); 
		})	 
		

		  
 
	});

	$('.removeFromCartBtn').click(function(){
		var url="http://localhost/hasan/config/cart-db.php";	
		var data = {
			p:'removeFromCart', 
			product_id : $(this).attr('product-id')
		}
		$.post(url, data, function (response){
			 
			window.location.reload(); 
		})	

	});
})

	