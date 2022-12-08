<html>
    <head>
        <title>My Order</title>
        <link rel="stylesheet" href="css/checkout.css">
        <style>
            .body1 {
                margin: 0;
                font-size: 1rem;
                line-height: 2.5;
                color: #0d6efd;
                background-color: #fff;
            }
        </style>
    </head>
    <body class="body1">
    <?php 
        include("header.php");
        include("session.php");
        include("config.php");
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            if(isset($_POST['update_address']))
            {
                $user_id = $_SESSION['user_id'];

                $type = $_POST['type'];
                $id = $_POST['id'];
                $address = $_POST['address'];
                $country = $_POST['country'];
                $state = $_POST['state'];
                $city = $_POST['city'];
                $pin = $_POST['pin'];

                if($type == "INSERT"){
                    $sql_update_address = "insert into address (delivery_address,country,state,city,pincode,user_id) values('$address','$country','$state','$city',$pin, $id)";
                }
                else{
                    $sql_update_address = "update address set delivery_address='$address',country='$country', state='$state', city='$city', pincode=$pin where id=$id";
                }
                
                $result = mysqli_query($db,$sql_update_address);

                if($result){
                    echo "<center> <span style='color:green; font-weight:bolder;font-size:large;'>Address Updated Successfully</span> </center>";
                }
                else{
                    echo "<center> <span style='color:red; font-weight:bolder;font-size:large;'>Failed to update address</span> </center>";
                }
            }
        }
        $user_id = $_SESSION['user_id'];
        
        /* Select existing address for the user to display */
        $sql = "select id, delivery_address, country, state, city, pincode from address where user_id=$user_id";

        $result = mysqli_query($db,$sql);

        $count = mysqli_num_rows($result);
        if($count > 0){
            $type= "UPDATE";
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $id = $row['id'];
            $address = $row['delivery_address'];
            $country = $row['country'];
            $state = $row['state'];
            $city = $row['city'];
            $pin = $row['pincode'];
        }
        else{
            $type= "INSERT";
            $id = $user_id;
            $address = "";
            $country = "";
            $state = "";
            $city = "";
            $pin = "";
        }
    ?>

<div class="container my-4 ">
    <div style="font-weight: 600;">  
    <span id="msg"></span>
    <form action="" method="post">
    
        <div class="form-group"> <label>Delivery Address</label> 
        <input type="text" class="form-control" id="address" name="address" value="<?php echo $address ?>" required="required">
        
        <input type="hidden" name="id" value="<?php echo $id ?>"> 
        <input type="hidden" name="type" value="<?php echo $type ?>"> 
        </div>
   
        <div class="form-group"> 
            <label>Country</label> 
        <input type="text" class="form-control" id="country" name="country" value="<?php echo $country ?>" required="required">    
        </div>

        <div class="form-group"> 
            <label>State</label> 
        <input type="text" class="form-control" id="lastname" name="state" value="<?php echo $state ?>" required="required">    
        </div>
   
        <div class="form-group"> 
            <label for="phone">City</label> 
        <input type="text" class="form-control" id="phone" name="city" value="<?php echo $city ?>" required="required"> 
        </div>

        <div style="margin: inherit" class="form-group"> 
            <label for="phone">Pin code</label> 
        <input type="number" class="form-control" id="phone"name="pin" 
               value="<?php echo $pin ?>" min="100000" max="999999" required="required"> 
        </div>
        <div class="form-group"> 
            <button type="submit" name="update_address" class="btn btn-primary"> Update Address </button>
        </div>
	</form> 
    </div>
</div>

</body>
</html>