<?php
session_start();
include'../includes/connection.php';
$a = $_POST['trans_d'];
$b = $_POST['product'];
$c = $_POST['qty'];
// $w = $_POST['pt'];
$em = $_POST['employee'];
$role = $_POST['role'];


$query = 'SELECT PRODUCT_ID,NAME,DESCRIPTION, PRICE,WHSL_PRICE FROM product WHERE PRODUCT_ID='.$b.'';
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
              while($row = mysqli_fetch_array($result))
              {   
                $des=$row['DESCRIPTION'];
                
                $name=$row['NAME'];

                $pr1=$row['PRODUCT_ID'];
            
                $pr=$row['PRICE'];
                
                $pl=$row['WHSL_PRICE'];
            
              }
              $query1 = 'SELECT * FROM inventory WHERE product_id='.$b.'';
              $result1 = mysqli_query($db, $query1) or die(mysqli_error($db));
              while($row1 = mysqli_fetch_array($result1)){
                $qty=$row1['QTY_STOCK'];
              }

              


           if ($qty>=$c){



             $profit=($pr-$pl)*$c;
             $d=$pr*$c;
            //  $p=$pr-$pW;
        
            // $sql = 'UPDATE inventory 
            // SET QTY_STOCK=QTY_STOCK- "'.$c.'"
            // WHERE product_id="'.$pr1.'"';
            // $result = mysqli_query($db, $sql) or die (mysqli_error($db));

              
                  $query = "INSERT INTO `transaction_details`
                            (`ID`, `TRANS_D_ID`,`PRODUCT_ID`, `PRODUCTS`, `QTY`, `PRICE`, `AMOUNT`,`PROFIT`,`EMPLOYEE`, `ROLE`)
                            VALUES (Null, '".$a."','".$pr1."', '".$name."', '".$c."','".$pr."','".$d."', '".$profit."','".$em."' , '".$role."')";

                  mysqli_query($db,$query)or die (mysqli_error($db));
                  

                  header("location:pos.php?trans_d=$a");
                }
            else{
            
            ?>

          <script type="text/javascript">
	        alert("Not enough stock");
	         window.location = "pos.php?trans_d=<?php echo $a?>";
            	</script>
           <?php
            }   

?>
      

                   
             

                  

<!-- <script type="text/javascript">
                alert("Success.");
                window.location = "pos.php";
</script> -->