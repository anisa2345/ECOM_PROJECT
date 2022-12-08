<?php
session_start();// for session.php we need to start session
include("session.php");
include("config.php");

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['Add_To_Cart']))
    {
            $product_id = $_POST['product_id'];

            $user_id = $_SESSION['user_id'];

            $cart_message = "";
            

            /* Check if the item already there in cart */
            $sql = "SELECT * FROM cart where product_id=$product_id and user_id=$user_id";
            $result = mysqli_query($db,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            
            $count = mysqli_num_rows($result);
            if($count > 0){
                $id = $row['id'];
                $product_id=$row['product_id'];
                $qty= $row['qty'];
                $mrp= $row['item_price'];
                $user_id = $row['user_id'];

                if($qty >= 5){
                    $cart_message = "Maximum quantity for this item already in cart";
                }
                else{
                    $sql = "update cart set qty= $qty+1, total_price=qty*item_price where product_id=$product_id and user_id=$user_id";
                    $result = mysqli_query($db,$sql);
                
                    if($result){
                        $cart_message = "Success";
                    }
                    else{
                        $cart_message = "Failed to add item to cart";
                    }
                }
            }
            else{ /* If item is not in the cart */
               
                /* Get product price just to make sure there is no manupulation at UI level */
                $sql = "SELECT price FROM product where id=$product_id";
                $result = mysqli_query($db,$sql);
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                $product_price = $row['price'];

                $sql = "insert into cart (product_id,qty,item_price,total_price, user_id) values($product_id, 1, $product_price,$product_price, $user_id)";
                $result = mysqli_query($db,$sql);
                
                
                if($result){
                    $cart_message = "Success";
                }
                else{
                    $cart_message = "Failed to add item to cart";
                }
            }
            //$location =  $_POST['location'];
            //header("Location: $location?cart_msg=$cart_message&product_id=$product_id");
            echo "$cart_message";
    }
    else if(isset($_POST['Remove_From_Cart']))
    {
        $cartId = $_POST['cart_id'];
        $sql = "delete from cart where id=$cartId";
        $result = mysqli_query($db,$sql);
        header("location:myCart.php");
    }
}
else { // REQUEST_METHOD is not POST

    /* If nothing matches, it goes to home page. */
     header("location:index.php");
}
?>