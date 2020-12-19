<?php
include('../includes/connection.php');
include('inv_edit.php');
			
			$Q = $_POST['qty'];
			$zz=$_POST['id'];

			
			// $sql='SELECT PRODUCT_ID FROM product WHERE BARCODE= "'.$zz.'"';
			// $result = mysqli_query($db, $sql) or die(mysqli_error($db));

			

			       
			switch($_GET['action']){
                case 'edit':     
                  $sql1 = 'UPDATE inventory 
                  SET QTY_STOCK=QTY_STOCK + "'.$Q.'"
                  WHERE product_id=(SELECT PRODUCT_ID FROM product WHERE BARCODE='.$_POST['id'].')';
                 $result11 = mysqli_query($db, $sql1) or die (mysqli_error($db));
                break;
              }
            ?>
              <script type="text/javascript">
              alert("Successfully updated inventory level");
                window.location = "inventory.php";
              </script>
 