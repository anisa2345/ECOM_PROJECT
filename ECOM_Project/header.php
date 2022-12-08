<?php
 session_start();
 $session = false;
 if(isset($_SESSION['login_user'])){
	$session = true;
	$userName = strtoupper($_SESSION['login_user']);
 }
?>

<header>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="css/style.css">
<style>
/* Style The Dropdown Button */
.dropbtn {
	background-color: #4CAF50;
	color: white;
	padding: 16px;
	font-size: 16px;
	border: none;
	cursor: pointer;
}

.dropdown {
	position: relative;
	display: inline-block;
}

.dropdown-content {
	display: none;
	position: absolute;
	right: 0;
	background-color: #f9f9f9;
	min-width: 160px;
	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	z-index: 1;
}

	.dropdown-content a {
		color: black;
		padding: 12px 16px;
		text-decoration: none;
		display: block;
	}

		.dropdown-content a:hover {
			background-color: #f1f1f1;
		}

.dropdown:hover .dropdown-content {
	display: block;
}

.dropdown:hover .dropbtn {
	background-color: #3e8e41;
}
.btn {
  background-color: DodgerBlue;
  border: none;
  color: white;
  font-size: 15px;
  cursor: pointer;
}
.fafont{
	font-size:23px;
}

</style>
	<!--nav1 start-->
	<nav class="nav1">
		<div class="left">
				<a href="index.php" ><button class="btn"><i class="fafont fa fa-home"></i> Home</button></a>
				<!-- <a style="color: red;margin:5px" href="index.php" ><i style="margin:5px; font-size:22px" class="fa fa-home">Home</i></a> -->
		</div>
		<div>
			<?php
			if(!$session){
			?>	
				<a href="login.php" ><button class="btn"><i  class="fafont fa fa-user"></i> Login </button></a>
				<a href="signup.php" ><button class="btn"><i class="fafont fa fa fa-bars"></i> Register </button></a>
				
				<!-- <button type="button" class="btn btn-primary"><a style="color:white" href="login.php">Login</a></button>
				<button type="button" class="btn btn-success"><a style="color:white" href="signup.php">Register</a></button> -->
			<?php 
				}
			?>

		</div>

		<div class="right">
			<a href="#" class="fa fa-facebook"></a>
			<a href="#" class="fa fa-twitter"></a>
			<a href="#" class="fa fa-instagram"></a>
			<a href="#" class="fa fa-whatsapp"></a>
			<a href="#" class="fa fa-google"></a>
			<a href="#" class="fa fa-pinterest"></a>
		</div>
		
		<?php
			if($session){
		?>
		<div>
			<a href="myCart.php" ><button class="btn"><i class="fafont fa fa-shopping-bag"></i> MyCart </button></a>
			<a href="products.php" ><button class="btn"><i class="fafont fa fa-shopping-bag"></i> Shop </button></a>
				
			<!-- <a style="margin:20px" href="myCart.php" ><i style="margin:5px; font-size:20px" class="fa fa-shopping-bag">MyCart</i></a>
			<a style="margin:40px" href="products.php" ><i style="margin:5px; font-size:20px" class="fa fa-shopping-bag">Shop</i></a> -->

			
			<div class="dropdown">
			  <button class="btn"><i class="fafont fa fa fa-user"></i> <?php echo "$userName" ?> </button>
			  <div class="dropdown-content">
				<a href="myOrders.php" >My Orders</a>
				<a href="editProfile.php" >Edit Profile</a>
				<a href="updateAddress.php" >Update Address</a>
				<a href="logout.php" >Logout</a>
			</div>
			</div>

		</div>	
		<?php
		}
		?>
	</nav>
	<!-- nav1 end-->

</header>
		