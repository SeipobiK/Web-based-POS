<?php
include('../includes/connection.php');
			$zz = $_POST['id'];
			$pname = $_POST['prodname'];
            $desc = $_POST['description'];
			$pr = $_POST['price'];
			$wpr = $_POST['wprice'];
			$exd = $_POST['exp'];
		
	 			$query = 'UPDATE product set NAME="'.$pname.'",
					DESCRIPTION="'.$desc.'", PRICE="'.$pr.'",WHSL_PRICE="'.$wpr.'",EXPIRY_DATE="'.$exd.'" WHERE
				BARCODE ="'.$zz.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));

							
?>	
	<script type="text/javascript">
			alert("You've Update Product Successfully.");
			window.location = "product.php";
	</script>