<?php
include("header.php");
include("session.php");
include("config.php");
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['Confirm_Order'])){
        $user_id = $_SESSION['user_id'];
        $addressID = $_POST['addressId'];
		
        /*
           Get the address details, as the address for this order will be recorded in order_details table
           as if in future user changes address, the delivered address for this order remains same. 
        */
        $addressSql = "select delivery_address, country, state, city, pincode from address where id=$addressID";
        $addressResult = mysqli_query($db, $addressSql);
        $row = $row = mysqli_fetch_array($addressResult,MYSQLI_ASSOC);
        
        $address = $row['delivery_address'];
        $country = $row['country'];
        $state = $row['state'];
        $city = $row['city'];
        $pincode = $row['pincode'];

        /* Get the cart details and insert those to order_details in order to confirm the order */
        $sql = "SELECT * FROM cart where user_id=$user_id";
        $cart_result = mysqli_query($db,$sql);
        
        date_default_timezone_set('Asia/Calcutta');
        $orderDate = date('Y-m-d H:i:s');
		
        while($row = mysqli_fetch_array($cart_result,MYSQLI_ASSOC)){

            $product_id=$row['product_id'];
            $qty = $row['qty'];
            $price= $row['item_price'];
            $total_price= $row['total_price'];
            
            echo("order Date= $orderDate");
            $sql = "insert into order_details (product_id, qty, item_price,total_price, status, user_id, order_date, address, country, state, city, pincode) 
                    values($product_id, $qty, $price, $total_price, 'Confirmed', $user_id, '$orderDate', '$address', '$country', '$state', '$city', '$pincode')";
            mysqli_query($db,$sql);

            echo "<h3> inserted order for product:$product_id </h3>";
            
            
            $sql = "update product set available_qty = available_qty-$qty where id=$product_id";
            $result = mysqli_query($db,$sql);
            echo "<h3> Updated product Qty:$result</h3>";
        
		}
        $sql = "delete from cart where user_id=$user_id";
        mysqli_query($db,$sql);
        echo "<h3> Deleted the cart for user. </h3>";

        header("location: orderSuccess.php?date=$orderDate");
    }

}
?>