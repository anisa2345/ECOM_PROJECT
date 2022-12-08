<?php  
	session_start();
	include("session.php");
    include("config.php");
    $qty = $_POST["qty"];
	$cartId = $_POST["cartId"];
	
	$sql = "update cart set qty= $qty, total_price=qty*item_price where id=+$cartId";
	$result = mysqli_query($db,$sql);

	$sql = "select sum(total_price) sum, (select total_price from cart c2 where id=$cartId) as total_price from cart";
	$result = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	
	$sum = $row['sum'];
	$total_price = $row['total_price'];
	echo "$sum,$total_price";

?>
