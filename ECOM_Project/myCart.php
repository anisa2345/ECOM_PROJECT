<html>
<?php 
    include("header.php");
    include("session.php");
    include("config.php");

    $user_id = $_SESSION['user_id'];
    
    $sql = "SELECT cart.id as cart_id, qty, item_price, total_price, product_id, title, `desc`, available_qty FROM cart left join product on cart.product_id = product.id where cart.user_id = $user_id";
    $result = mysqli_query($db,$sql);
	
	$count = mysqli_num_rows($result);
    if($count == 0){
        echo "<h3> <center> Cart is empty <br> 
			  <a style='margin:40px' href='products.php'><i style='margin:5px; padding-right:90px; font-size:25px' class='fa fa-shopping-bag'>Shop</i></a>
			  </center> </h3>";
    }
    else{
?>

<head>
<title>Cart</title>
<style>
	div#container{
		justify-content: center;
	}
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"> </script>
	<script>
		function updateQty(selectedObj, cartId, srNo){
					
			$.ajax({
				type: "POST",
				url:"updateQty.php",
				dataType: "text",
				data: {
					"qty": selectedObj.value, 
					"cartId":cartId
					},
				success: function(response) {
					var array = response.split(',');
					$("#cart_total").html(array[0]);
					$("#totPrice"+srNo).html(array[1]);
					console.log("Completed");
        }
			})
		}
	</script>
	
</head>

<body>
	<div class="container">
		<div id="inner1" class="row">
			<div class="col-lg-12 text-center border rounded bg-light my-5">
				<h1>MY CART</h1>
			</div>
				<div>

					<div class="col-lg-9">
						<table class="table">
							<thead class="text-center">
								<tr>
									<th scope="col">Serial No.</th>
									<th scope="col">Item Name</th>
									<th scope="col">Item Desc</th>
									<th scope="col">Item Price</th>
									<th scope="col">Total Price</th>
									<th scope="col">Quantinty</th>
									<th scope=" "></th>
								</tr>
							</thead>
							<tbody class="text-center">
								<?php
                                   $cart_total=0;
                                   $key = 0;
                                   while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                        $cart_id = $row['cart_id'];
                                        $product_id=$row['product_id'];
                                        $title = $row['title'];
                                        $desc = $row['desc'];
                                        $qty = $row['qty'];
										$available_qty = $row['available_qty'];
                                        $price= $row['item_price'];
                                        $total_price= $row['total_price'];
                                    
                                        $sr=++$key;
                                        $cart_total=$cart_total+$total_price;
                                    
										$outOfStock = "";
										$maxQty = 5;
										if($available_qty <= 0){
											$outOfStock = "<span style='color:Red'> <h5> Out Of Stock </h5> </span>";
										}
										else if($qty > $available_qty){
											$outOfStock = "<span style='color:Red'> <h5> Only $available_qty items available </h5> </span>";
											$qty = $available_qty;
											$maxQty = $available_qty;
										}
										echo"
                                        <tr>
                                            <td>$sr</td>
                                            <td><a href='product.php?id=$product_id'>$title</a></td>
                                            <td>$desc</td>
                                            <td>$price</td>
                                            <td id='totPrice$sr'>$total_price</td>
                                            <td>
												<input onchange=updateQty(this,$cart_id,$sr) class='text-center' onkeypress='return false' type='number' value='$qty' min='1' max='$maxQty' >
											</td>
                                            <td>
                                            <form action='manageCart.php' method='POST'>
                                                <button type='submit' name='Remove_From_Cart' class='btn btn-sm btn-outline-danger'>REMOVE</button>
                                                <input type='hidden' name='cart_id' value='$cart_id'/>
                                            </form>
                                            </td>
                                        </tr>
                                        ";
                                    }
                            ?>
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-lg-3">
					<form action="checkout.php" method="post">
						<div class="border bg-light rounded p-4">
							<h4>Total:</h4>
							<h5 class="text-right">
								<span id="cart_total"> <?php echo $cart_total ?> </span>
							</h5>
							<br>
							<div class="form-check">
								<input class="form-check-input" type="radio"
									name="flexRadioDefault" id="flexRadioDefault1" checked>
								<label class="form-check-label" for="flexRadioDefault1">
									Cash On Delivery </label>
							</div>
							<br>
							<button type="submit" name="make_purchase" class="btn btn-primary btn-block">Make Purchase</button>
						</div>
					</form>
				</div>
	</div>
	</div>
</body>
<?php } ?>
</html>