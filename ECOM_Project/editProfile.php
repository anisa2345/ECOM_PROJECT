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
            if(isset($_POST['update_profile']))
            {
                $user_id = $_SESSION['user_id'];

                $firstName = $_POST['firstname'];
                $lastName  = $_POST['lastname'];
                $phone = $_POST['phone'];

                $sql_phone_exist = "select phone from user where phone='$phone' and id <> $user_id";
                $phoneExist = mysqli_query($db,$sql_phone_exist);

                $phoneCount = mysqli_num_rows($phoneExist);
                if($phoneCount > 0){
                    echo "<center> <span style='color:red; font-weight:bolder;font-size:large;'>Phone number already exists</span> </center>";
                }
                else{
                    $sql = "update user set firstname='$firstName', lastname='$lastName', phone='$phone' where user.id=$user_id";
                    $result = mysqli_query($db,$sql);
                
                    if(!$result){
                        echo "<center> <span style='color:red; font-weight:bolder;font-size:large;'>Failed to Update profile</span> </center>";
                    }
                    else{
                        echo "<center> <span style='color:green; font-weight:bolder;font-size:large;'>Profile updated Successfully.</span> </center>";
                    }
                }
            }
        }

        $user_id = $_SESSION['user_id'];
    
        $sql = "select firstname, lastname, phone from user where user.id=$user_id";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        $firstName = $row['firstname'];
        $lastName = $row['lastname'];
        $phone = $row['phone'];
    ?>

    <div class="container my-4">
          <div style="font-weight: 600;">  
            <span id="msg"></span>
            <form action="" method="post">
    
                <div class="form-group"> 
                    <label >First name</label> 
                <input type="text" class="form-control" id="firstname"
                    name="firstname" value="<?php echo $firstName ?>" >    
                </div>
   
                <div class="form-group"> 
                    <label>Last Name</label> 
                <input type="text" class="form-control" id="lastname"
                    name="lastname" value="<?php echo $lastName ?>">    
                </div>
   
                <div style="margin: inherit" class="form-group"> 
                    <label for="phone">Phone</label> 
                <input type="text" class="form-control" id="phone"
                    name="phone" value="<?php echo $phone ?>" minlength="10" maxlength="10" onfocusout="validatePhoneNumber()">    
                </div>

                <button type="submit" name="update_profile" class="btn btn-primary"> Update </button>
        
	        </form> 
          </div>
    </div>
</body>
</html>

        