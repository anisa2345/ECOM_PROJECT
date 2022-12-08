<html>
    <head>
        <title>My Order</title>
        <link rel="stylesheet" href="css/checkout.css">
        <style>
              div#container{
              justify-content: center;
            }
        </style>
    </head>
    <body>
    <?php 
        include("header.php");
        include("session.php");
        include("config.php");

        $user_id = $_SESSION['user_id'];
    
        $sql = "select p.id as product_id, p.title, p.`desc`, o.qty, o.item_price, o.total_price, o.status, o.order_date, o.address,o.country, o.state,o.city,o.pincode from order_details o 
                left join product p on o.product_id = p.id
                where o.user_id=$user_id
                order by o.order_date desc";

        $orderDetails = mysqli_query($db,$sql);

        $count = mysqli_num_rows($orderDetails);
        if($count == 0){
            echo "<h3> <center> No Orders <br> 
			      <a style='margin:40px' href='products.php'><i style='margin:5px; padding-right:90px; font-size:25px' class='fa fa-shopping-bag'>Shop</i></a>
			      </center> </h3>";
        }
        else{

    ?>

    <div id="container">
          <div id="inner1">  
            <table  class="styled-table">
                <thead class="text-center">
                <tr style="background-color:#dc3545">
                    <th scope="col">Serial No.</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Item Price</th>
                    <th scope="col">Quantinty</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Address</th>
                </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                            $key = 1;
                            while($row = mysqli_fetch_array($orderDetails,MYSQLI_ASSOC)){
                                $product_id=$row['product_id'];
                                $title = $row['title'];
                                $desc = $row['desc'];
                                $qty = $row['qty'];
                                $price= $row['item_price'];
                                $total_price= $row['total_price'];
                                $status= $row['status'];
                                $orderDate= $row['order_date'];
                                $deliveryAddress= $row['address'];
                                $country= $row['country'];
                                $state= $row['state'];
                                $city= $row['city'];
                                $pincode= $row['pincode'];

                                $address = $deliveryAddress . "," . $country . "," . $state . "," . $city . "," . $pincode;
                                    
                                $sr=$key++;
                                echo"
                                <tr>
                                    <td>$sr</td>
                                    <td><a href='product.php?id=$product_id'>$title</a></td>
                                    <td>$price</td>
                                    <td>$qty</td>
                                    <td>$total_price</td>
                                    <td>$status</td>
                                    <td>$orderDate</td>
                                    <td>$address</td>
                                </tr>
                                ";
                            }
                    ?>
                            
                </tbody>
            </table>
    
          </div>
        </div>
    </div>

<?php } ?>

</body>
</html>