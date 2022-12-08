    <?php 

        include("header.php");
        include("session.php");
        include("config.php");
?>

<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="css/product.css">
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
    <?php 
        $product_id = $_GET["id"];

        $productSql = "SELECT * FROM product where id=$product_id";
        $productResult = mysqli_query($db,$productSql);
        $row = mysqli_fetch_array($productResult,MYSQLI_ASSOC);
            
        $count = mysqli_num_rows($productResult);

        if($count > 0){
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
        }
     ?>
    
    <div class="prodcontainer">
        <div class="product">
            <div class="gallery">
                <img src='img/<?php echo "$thumbnail"; ?>' id="productImg">
                <div class="controls">
                    <span class="btn active"></span>
                    <span class="btn"></span>
                    <span class="btn"></span>
                </div>
            </div>
            <div class="details">
                <h3><?php echo "$title"; ?></h3>
                <h2>Rs:<?php echo "$price"; ?></h2>
                <!-- <h3>30% OFF</h3> -->
                <p><h6><?php echo "$desc"; ?></h6></p>
             
                <?php echo "<input type='button' class='button1' onclick=addToCart(this,$pid) id='$pid' name='Add_To_Cart' $btn_display value='$add_cart_msg'></input>"; ?>
                
            
            </div>
        </div>
   </div>
</html>
</body>