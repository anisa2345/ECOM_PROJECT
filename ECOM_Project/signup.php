<?php
    
    
    $showAlert = false; 
    $showError = false; 
    $exists=false;
    
if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    include ("config.php");  
    $username = $_POST["username"]; 
    $password = $_POST["password"]; 
    $cpassword = $_POST["cpassword"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $phone = $_POST["phone"];
            
    
       
        if(($password == $cpassword)) {

            // This sql query is use to check if
            // the username is already present 
            // or not in our Database
            $sql = "Select * from user where username='$username' or phone='$phone'";
            $result = mysqli_query($db, $sql);
            $num = mysqli_num_rows($result); 

            if($num == 0) {
                // Password Hashing is used here. 
                $sql = "INSERT INTO user ( firstname,lastname,username, 
                password,phone) VALUES ('$firstname','$lastname','$username', 
                    '$password','$phone')";
    
                $result = mysqli_query($db, $sql);
            
                if ($result) {
                    $showAlert = true; 
                }
            } 
            else { 
                $exists="Username or phone already exists"; 
            }      
        }// end if 
    
        else 
        {
          $showError = "Passwords do not match"; 
        } 
    
}//end if   
    
?>
   
<html>
    
<head>
    <script src="js/jquery-3.6.1.min.js"></script>

    <script type="text/javascript">
           
    </script>
    <!-- Required meta tags --> 
    <meta charset="utf-8"> 
    <meta name="viewport" content=
        "width=device-width, initial-scale=1, 
        shrink-to-fit=no">
    
    <!-- Bootstrap CSS --> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

        
</head>
    
<body>
    
<?php
    
    if($showAlert) {
    
        echo '<center> <div class="alert alert-success 
            alert-dismissible fade show" role="alert">
    
            <strong>Success!</strong> Your account is 
            now created and you can <a href="login.php">Login Here</a>. 
            <button type="button" class="close"
                data-dismiss="alert" aria-label="Close"> 
                <span aria-hidden="true" style="font-size:medium">✕</span> 
            </button> 
        </div> </center>'; 
    }
    
    if($showError) {
    
        echo '<center> <div class="alert alert-danger 
            alert-dismissible fade show" role="alert"> 
        <strong>Error!</strong> '. $showError.'
    
       <button type="button" class="close" 
            data-dismiss="alert aria-label="Close">
            <span aria-hidden="true" style="font-size:medium">✕</span> 
       </button> 
     </div> </center>'; 
   }
        
    if($exists) {
        echo '<center> <div class="alert alert-danger 
            alert-dismissible fade show" role="alert">
    
        <strong>Error!</strong> '. $exists.'
        <button type="button" class="close" 
            data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true" style="font-size:medium">✕</span> 
        </button>
       </div> </center>'; 
     }
   
?>
    
<div class="container my-4 ">
    <span>
    
    <h2 class="text-center">Signup</h2>
    </span>
    <form action="signup.php" method="post">
    
        <div class="form-group"> 
            <label for="first">First name</label> 
        <input type="text" class="form-control" id="firstname"
            name="firstname" required="required">    
        </div>
   
        <div class="form-group"> 
            <label for="lastname">Last Name</label> 
        <input type="text" class="form-control" id="lastname"
            name="lastname" required="required">    
        </div>
   

        <div class="form-group"> 
            <label for="username">Username</label> 
        <input type="text" class="form-control" id="username"
            name="username" required="required">    
        </div>

        <div class="form-group"> 
            <label for="phone">Phone</label> 
        <input type="number" class="form-control" id="phone"
            name="phone" aria-describedby="phone" min="1000000000" max="9999999999" required="required">    
        </div>

        <div class="form-group"> 
            <label for="password">Password</label> 
            <input type="password" class="form-control"
            id="password" name="password" required="required"> 
        </div>
    
        <div class="form-group"> 
            <label for="cpassword">Confirm Password</label> 
            <input type="password" class="form-control"
                id="cpassword" name="cpassword" required="required">
    
            <small id="emailHelp" class="form-text text-muted">
            Password and confirm password must match
            </small> 
        </div>      
    
        <button type="submit" class="btn btn-primary">
        SignUp
        </button>
        <span>
        &emsp; &emsp;
        <b>Already have an account? </b> <a href="login.php">Login Here</a>
        <a style="color: red;padding-left:25px" href="index.php" ><i style="margin:5px; font-size:16px" class="fa fa-home">Goto Home</i></a>
        
        </span>
        
	    </form> 
</div>
    
<!-- Optional JavaScript --> 
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
<script src="
https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="
sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous">
</script>
    
<script src="
https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity=
"sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" 
    crossorigin="anonymous">
</script>
    
<script src="
https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" 
    integrity=
"sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
    crossorigin="anonymous">
</script> 
</body> 
</html>