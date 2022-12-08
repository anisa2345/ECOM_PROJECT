<?php 
    include("header.php");
    include("session.php");
    include("config.php");
   $error="";
     // username and password sent from form 
     
     $sql = "SELECT * FROM product";
     
     $result = mysqli_query($db,$sql);
     
     //$active = $row['active'];
  
?> 

<html>
    <head>
        <title>Shop now</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"> </script>
		
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
        <div class="container mt-5">
            <div class="row">
                <?php 

                while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
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

                <div class="col-lg-3">
                    <form action="manageCart.php" method="POST">
                    <div class="card">
                          <?php echo "<a href='product.php?id=$pid'><img src='img/$thumbnail' onclick='product.php' class='card-img-top' ></a>" ?>
                            <div class="card-body text-center">
                                <?php echo "<h5 class='card-title'>$title</h5>" ?>
									<?php echo "<p class='card-text'>Rs.$price</p>" ?>
									<?php echo "<input type='button' onclick=addToCart(this,$pid) id='$pid' name='Add_To_Cart' $btn_display value='$add_cart_msg'></input>"; ?>
																		
                                    <?php echo"<input type='hidden' name='product_name' value='$title'>" ?>
									<?php echo"<input type='hidden' id='product_price' name='product_price' value='$price'>" ?>
									<?php echo "<input type='hidden' id='product_id' name='product_id' value='$pid'>" ?>
									<?php echo "<input type='hidden' id='location' name='location' value='products.php'>" ?>
                            </div>
                    </div>
        </form>
                </div>
                <?php } ?>
            </div>
        </div>

        <?php include("footer.php"); ?>
    </body>
</html>