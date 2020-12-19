<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
?><?php 

                $query = 'SELECT ID, t.TYPE
                          FROM users u
                          JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
                $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
                while ($row = mysqli_fetch_assoc($result)) {
                          $Aa = $row['TYPE'];
                   
if ($Aa=='User'){
           
             ?>    <script type="text/javascript">
                      //then it will be redirected
                      alert("Restricted Page! You will be redirected to POS");
                      window.location = "pos.php";
                  </script>
             <?php   }
                         
           
}   
            ?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $P = $_POST['PRODUCT_ID'];
              $Q= $_POST['QUANTITY'];

                // $quer='SELECT PRODUCT_ID FROM product WHERE BARCODE='.$_POST['PRODUCT_ID'].'';
                
                // $res=mysql_query($db,  $quer) or die (mysql_error($db));

                // while($rows = mysqli_fetch_assoc($res) ){
                  
                //         $P_ID=$rows['PRODUCT_ID'];

                // }
  
        
              switch($_GET['action']){
                case 'add':     
                  $sql1 = 'UPDATE inventory 
                  SET QTY_STOCK=QTY_STOCK + "'.$Q.'"
                  WHERE product_id=(SELECT PRODUCT_ID FROM product WHERE BARCODE='.$_POST['PRODUCT_ID'].')';
                 $result11 = mysqli_query($db, $sql1) or die (mysqli_error($db));
                break;
              }
            ?>
              <script type="text/javascript">
              alert("Successfully updated inventory level");
                window.location = "inventory.php";
              </script>
          </div>

<?php
include'../includes/footer.php';
?>