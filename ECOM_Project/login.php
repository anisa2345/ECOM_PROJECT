<?php
    $error="";
    include("config.php");
	session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form submit
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql_get_uer_id = "SELECT id FROM user WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql_get_uer_id);
	  
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
	
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
		 $_SESSION['user_id'] = $row['id'];
		 header("location: index.php");
      }else {
         $error = "Your user Name or password is invalid";
      }
   }
?>

	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>LogIn Form</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style3.css">
	</head>
	<body>
	<div class="center">
		<h1>LogIn</h1>
		
		<span style="color:red; padding-left: 60px;"><?php echo $error ?></span>
		
		<form method="post" action="login.php">
			<div class="txt_field">
				<input type="text" name="username" id="username" required>
				<span></span>
				
			</div>
			<div class="txt_field">
				<input type="password" id="password" name = "password" required>
				<span></span>
			</div>

			<input type="submit" value="Login">
			
			<div class="signup_link">
				Not a member?	<a href="signup.php">Signup</a>
			</div>
			<div>
			<a style="color: red;padding-left:125px" href="index.php" ><i style="margin:5px; font-size:10px" class="fa fa-home">Home</i></a>
			</div>
		</form>
	</div>
	</body>
	</html>