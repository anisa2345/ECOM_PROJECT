<?php 
    include("header.php");
    include("session.php");
    include("config.php");

    /* unauthorised access */
    if(!$_SERVER["REQUEST_METHOD"]=="POST" || !isset($_POST['make_purchase']))
    {
        header("location: index.php");
    }
    $user_id = $_SESSION['user_id'];
    
    $sql = "SELECT cart.id as cart_id, qty, item_price, total_price, product_id, title, `desc` FROM cart left join product on cart.product_id = product.id where cart.user_id = $user_id";
    $cart_result = mysqli_query($db,$sql);
    
	$sql = "SELECT id, delivery_address,country,state,city,pincode from address where user_id = $user_id";
    $address_result = mysqli_query($db,$sql);

?>
<html>
    <head>
        <title>Review Your Order</title>
        <link rel="stylesheet" href="css/checkout.css">
    </head>
  
    <body>

<form action="confirmOrder.php" method="post">
    <div id="container">
            <div id="inner1">  
                <table class="styled-table">
                    <thead class="text-center">
                    <tr>
                        <th scope="col">Serial No.</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Item Price</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Quantinty</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                                $cart_total=0;
                                $key = 1;
                                while($row = mysqli_fetch_array($cart_result,MYSQLI_ASSOC)){
                                    $cart_id = $row['cart_id'];
                                    $product_id=$row['product_id'];
                                    $title = $row['title'];
                                    $desc = $row['desc'];
                                    $qty = $row['qty'];
                                    $price= $row['item_price'];
                                    $total_price= $row['total_price'];
                                    
                                    $sr=$key++;
                                    $cart_total=$cart_total+$total_price;
                                    echo"
                                    <tr>
                                        <td>$sr</td>
                                        <td><a href='product.php?id=$product_id'>$title</a></td>
                                        <td>$price</td>
                                        <td>$total_price</td>
                                        <td>$qty</td>
                                    </tr>
                                    ";
                                }
                        ?>
                            
                    </tbody>
                </table>
            </div>

            <div id="inner2">  
                <table class="styled-table">
                    <thead class="text-center" style="background-color:orange; font-size: large;">
                        <tr style="text-align: left;">
                            <th scope="col"> </th>
                            <th scope="col">Shipping Address </th>
                        </tr>
                    </thead>
                <tbody class="text-center">
                
                <?php
                     $count = mysqli_num_rows($address_result); 
                     if($count == 0){
                         echo " <tr style='text-align: left;'>
                                     <td>  </td>
                                     <td> <strong style='background-color:yellow'> Please <a href='updateAddress.php' >add address</a> first to continue checkout</strong> <br/> </td>
                                  </tr>";
                     }
                    while( $row = mysqli_fetch_array($address_result,MYSQLI_ASSOC)){
                        $deliveryAddress = $row['delivery_address'];
                        $country = $row['country'];
                        $state = $row['state'];
                        $city = $row['city'];
                        $pin = $row['pincode'];
                        $addressId =$row['id'];
                        echo " <tr style='text-align: left;'>
                                <td> <input checked type='radio' name='addressId' value='$addressId'> </input> </td>
                                <td> <p> <span> $deliveryAddress,$country, $state,$city,$pin </span>  </p>
                                </td>
                              </tr>";
                    }
                ?>
                </tbody>
                </table>
            </div>
            <?php
           
    			if($count > 0){
				
			?>
            <div id="inner3">
                
			    <div class="border bg-light rounded p-4">
				    <h5 style="color: blue">Total Rs:</h5>
				    <h5>
					    <span class="text-right" style="color: orange" name="cart_total" id="cart_total"> <?php echo $cart_total ?> </span>
				    </h5>
				    <br>
                    <div class="form-check">
					    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
					    <label class="form-check-label" for="flexRadioDefault1"> Cash On Delivery </label>
				    </div>
				    <br>
                        
                        <button type="submit" name="Confirm_Order" class="btn btn-success btn-block">Make Purchase</button>      
			    </div>
		    </div>
			<?php
            }
			?>
            
    </div>
</form>  

</body>
</html>