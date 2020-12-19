<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $br = $_POST['barcode'];
              $name = $_POST['name'];
              $desc = $_POST['description'];
              $pr = $_POST['price']; 
              $wpr = $_POST['wprice'];
              $cat = $_POST['category'];
              $supp = $_POST['supplier'];
              $expdt = $_POST['Expiry_Date'];
              
        
              switch($_GET['action']){
                case 'add':  
             
                  //  $query = "INSERT INTO product
                    //           (PRODUCT_ID, NAME, DESCRIPTION,  PRICE, CATEGORY_ID, SUPPLIER_ID, DATE_STOCK_IN)
                     //        VALUES (Null,'{$name}','{$desc}','{$pr}','{$cat}','{$supp}','{$dats}')";
                    mysqli_query($db,"INSERT INTO product
                    (PRODUCT_ID,BARCODE, NAME, DESCRIPTION,  PRICE,WHSL_PRICE, CATEGORY_ID, SUPPLIER_ID, DATE_STOCK_IN,EXPIRY_DATE)
                  VALUES (Null,'{$br}','{$name}','{$desc}','{$pr}','{$wpr}','{$cat}','{$supp}',current_timestamp(),'{$expdt}')");//or die ('Error in updating product in Database '.$query);
                   
                   //$query1 = "INSERT INTO inventory
                  //  (PRODUCT_ID, QTY_STOCK)
                //  VALUES (Null,'0')";
                  mysqli_query($db,"INSERT INTO inventory
                  (PRODUCT_ID, QTY_STOCK)
                VALUES ((select PRODUCT_ID from product ORDER BY PRODUCT_ID DESC LIMIT 1),0)") ;//or die ('Error in updating product in Database '.$query1);
          
                break;
              }
            ?>
              <script type="text/javascript">window.location = "product.php";</script>
          </div>

<?php
include'../includes/footer.php';
?>