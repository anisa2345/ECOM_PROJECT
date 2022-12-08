<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-Commerce Website</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"> </script>
	<script src="js/jquery-3.6.1.min.js"></script>
	<script>
		function addToCart(selectedObj, pid){
			$.ajax({
				type: "POST",
				url:"manageCart.php",
				dataType: "text",
				data: {
					"product_id": pid, 
					"Add_To_Cart":'Add_To_Cart'
					},
				success: function(response) {
					if(response == 'Success'){
						$(selectedObj).val("Added to Cart");
						setTimeout(function(){ 
						$(selectedObj).blur();
						$(selectedObj).val("Add to Cart");
						}, 1000);
					}
					else{
						alert(response);
					}
					$(selectedObj).blur();
					console.log(msg, pid);
				}
			});
		}
	</script>
</head>
<body>
<?php 
	include("config.php");
	include("header.php");
	
	$sql_new_arrival = "SELECT * FROM product where prod_highlight like '%New Arrival%'";
	$sql_popular = "SELECT * FROM product where prod_highlight like '%Popular%'";
	$sql_trending = "SELECT * FROM product where prod_highlight like '%Trending%'";
    
	$result_new_arrival = mysqli_query($db,$sql_new_arrival);
	$result_popular = mysqli_query($db,$sql_popular);
	$result_trending = mysqli_query($db,$sql_trending);

?>
<!--nav2 start-->
	<nav class="nav2">
		<div class="nav2-left">
			<i class="fa fa-phone">9337020473</i><br>
			<i class="fa fa-envelope">nd1234@gmail.com</i>
		</div>
		<div class="nav2-center">
			<h1>Apni <span>Dukan</span></h1>
			<p>Everythings you need to look better</p>
		</div>
		<div class="nav2-right">
			
		</div>
	</nav>
	<!-- nav2 end-->

<!--features start-->
		<section class="featured">
			<div class="featured-text">
				<button>Coming soon</button>
				<h2>Our new designs</h2>
			</div>
		</section>
	<!--features end-->
	<!--latest start-->

<section class="latest">
	<div class="product-intro">
		<h1>New <span>Arrivals </span></h1>
		<p>WE HOPE YOU WILL BE INTRESED ON OUR PRODUCTS!</p>
	</div>
	
	<div class="card-container">
		<?php 
				while($row = mysqli_fetch_array($result_new_arrival,MYSQLI_ASSOC)){
					$pid =  $row['id'];
					$title = $row['title'];
					$desc =  $row['desc'];
					$brand =  $row['brand'];
					$sub_category =  $row['sub_category'];
					$price =  $row['price'];
					$thumbnail =  $row['thumbnail'];
					$available_quantity =  $row['available_qty'];
					$prod_highlight =  $row['prod_highlight'];
					$add_cart_msg = $available_quantity >= 0 ? "Add To Cart" : "Out of Stock";

					$btn_display = $session && $available_quantity >=0 ? " class='btn btn-info' enabled" : " class='btn btn-secondary' disabled"; 
                 
			?>
			
						<div class="card">
							  <?php echo "<div><a href='product.php?id=$pid'><img src='img/$thumbnail' onclick='product.php' class='card-img-top'/></a></div>" ?>
								<div class="card-body text-center">
									<?php echo "<h5 class='card-title'>$title</h5>" ?>
									<?php echo "<p class='card-text'>Rs.$price</p>" ?>
									<?php echo "<input type='button' onclick=addToCart(this,$pid) id='$pid' name='Add_To_Cart' $btn_display value='$add_cart_msg'></input>"; ?>
									
									<?php echo"<input type='hidden' name='product_name' value='$title'>" ?>
									<?php echo"<input type='hidden' id='product_price' name='product_price' value='$price'>" ?>
									<?php echo "<input type='hidden' id='product_id' name='product_id' value='$pid'>" ?>
									<?php echo "<input type='hidden' id='location' name='location' value='index.php'>" ?>
								</div>
						</div>
			
		<?php } ?>
	</div>
	
</section>
	<!--latest End-->

<!--popular product start-->
<section class="latest">
	<div class="product-intro">
		<h1>Trending <span> Products</span></h1>
		<p>WE HOPE YOU WILL BE INTRESED ON OUR PRODUCTS!</p>
	</div>
	
	<div class="card-container">
		<?php 

				while($row = mysqli_fetch_array($result_trending,MYSQLI_ASSOC)){
					$pid =  $row['id'];
					$title = $row['title'];
					$desc =  $row['desc'];
					$brand =  $row['brand'];
					$sub_category =  $row['sub_category'];
					$price =  $row['price'];
					$thumbnail =  $row['thumbnail'];
					$quantity =  $row['available_qty'];
					$prod_highlight =  $row['prod_highlight'];

					$add_cart_msg = $available_quantity >= 0 ? "Add To Cart" : "Out of Stock";

					$btn_display = $session && $available_quantity >=0 ? " class='btn btn-info' enabled" : " class='btn btn-secondary' disabled"; 
                 
			?>
			<form action="manageCart.php" method="POST">
						<div class="card">
							  <?php echo "<div><a href='product.php?id=$pid'><img src='img/$thumbnail' onclick='product.php' class='card-img-top'/></a></div>" ?>
								<div class="card-body text-center">
									<?php echo "<h5 class='card-title'>$title</h5>" ?>
									<?php echo "<p class='card-text'>Rs.$price</p>" ?>
									<?php echo "<button  id='$pid' name='Add_To_Cart'$btn_display>$add_cart_msg</button>"; ?>
									
									<?php echo"<input type='hidden' name='product_name' value='$title'>" ?>
									<?php echo"<input type='hidden' id='product_price' name='product_price' value='$price'>" ?>
									<?php echo "<input type='hidden' id='product_id' name='product_id' value='$pid'>" ?>
									<?php echo "<input type='hidden' id='location' name='location' value='index.php'>" ?>
								</div>
						</div>
			</form>
		<?php } ?>
	</div>

</section>
<?php include("footer.php"); ?>
</body>
</html>
