<?php
session_start();
include'../includes/connection.php';
$a = $_POST['trans_d'];
$b = $_POST['cashier'];
$c = $_POST['date'];
$e = $_POST['amount'];
$z = $_POST['cash'];
$cname = $_POST['customer'];

$query = 'SELECT *FROM transaction_details  WHERE  TRANS_D_ID = '.$a ;
$result = mysqli_query($db, $query) or die (mysqli_error($db));
$Arrrp = array();
$Arrrq = array();
while ($rowas = mysqli_fetch_assoc($result)) { 

    array_push($Arrrp, $rowas['PRODUCT_ID']);
    array_push($Arrrq,$rowas['QTY']);

// $Arrrp[]=$rowas['PRODUCT_ID'];
// $Arrrq[]=$rowas['QTY'];
}
//confirm tramsaction if tendered cash is greater or equal to total amount
if($z>=$e){
           $count='SELECT COUNT(PRODUCT_ID) FROM transaction_details WHERE TRANS_D_ID = '.$a ;
           $rescount=mysqli_query($db,$count) or die (mysqli_error($db));
           while ($rowac = mysqli_fetch_assoc($rescount)) {
                $countID=$rowac['COUNT(PRODUCT_ID)'];

           }
         
      
             for($i = 0;$i<$countID;$i++){

              $sql = 'UPDATE inventory 
              SET QTY_STOCK=QTY_STOCK- "'.$Arrrq[$i].'"
              WHERE product_id="'.$Arrrp[$i].'"';
              $result = mysqli_query($db, $sql) or die (mysqli_error($db));

           }
            $sql = "INSERT INTO transaction (TRANS_ID,CUST_ID,GRANDTOTAL,CASH,DATE,TRANS_D_ID) VALUES (NULL,'".$cname."','".$e."','".$z."',current_timestamp(),'".$a."')";
            $result1 = mysqli_query($db, $sql) or die(mysqli_error($db));
            header("location: preview.php?trans_d=$a");
            exit();
}else 
{ 
   
    ?>
    		<script type="text/javascript">
	        alert("Not enough cash,please try again. ");
	         window.location = "pos.php?trans_d=<?php echo $a?>";
            	</script>
   
    <?php
    
}
// query

?>