<?php
	include'../includes/connection.php';
	$c=$_GET['trans_d'];
	$qty=$_GET['qty'];
	$wapak=$_GET['code'];
	
	//edit qty
	// $sql = 'UPDATE inventory 
	//  		SET QTY_STOCK=QTY_STOCK+ "'.$qty.'"
	//  		WHERE product_id="'.$wapak.'"';
	// 		$result = mysqli_query($db, $sql) or die (mysqli_error($db));

	$query = "DELETE FROM transaction_details WHERE ID=".$_GET['id'];
	$result = mysqli_query($db, $query) or die (mysqli_error($db));
	
	header("location: pos.php?trans_d=$c");
?>