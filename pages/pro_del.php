<?php
include'../includes/connection.php';
            
				$sql = 'SELECT PRODUCT_ID,BARCODE  FROM product p
				WHERE BARCODE='. $_GET['id'];
				$result1 = mysqli_query($db, $sql) or die ("Bad SQL: $sql");
				while ($row1 = mysqli_fetch_assoc($result1)) {
                    $P_id=$row1['PRODUCT_ID'];

				}

				$query2 = 'DELETE FROM inventory WHERE PRODUCT_ID='. $P_id;
				$result2 = mysqli_query($db, $query2) or die(mysqli_error($db));
				
    			$query = 'DELETE FROM product WHERE BARCODE='. $_GET['id'];
    			$result = mysqli_query($db, $query) or die(mysqli_error($db));				
            ?>
    			<script type="text/javascript">alert("Product Successfully Deleted.");window.location = "product.php";</script>					
    