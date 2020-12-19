<?php
include'../includes/connection.php';
include'../includes/topp2.php';
//imma make it trans uniq id


                $query = 'SELECT ID, t.TYPE
                          FROM users u
                          JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
                $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
                while ($row = mysqli_fetch_assoc($result)) {
                          $Aa = $row['TYPE'];
                   
if ($Aa=='Admin'){
      
  include'../includes/topp.php';
   }
}
if ($Aa=='User'){

include'../includes/topp1.php';

}

$today = date("mdGis");
 ?>             
                    <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
                    <script src="lib/jquery.js" type="text/javascript"></script>
                    <script src="src/facebox.js" type="text/javascript"></script>
                    <script type="text/javascript">
                      jQuery(document).ready(function($) {
                        $('a[rel*=facebox]').facebox({
                          loadingImage : 'src/loading.gif',
                          closeImage   : 'src/closelabel.png'
                        })
                      })
                    </script>

<script src="vendors/jquery-1.7.2.min.js"></script>
    <script src="vendors/bootstrap.js"></script>


                      <div class="row">
                <div class="col-lg-12">
                  <div class="card shadow mb-0">
                  <div class="card-header py-2">
                    <h4 class="m-1 text-lg text-primary">SELECT PRODUCT</h4>
                  </div>
                    <div class="card-body">
                           <ul class="nav nav-tabs">
                              <li class="nav-item"><form action="incoming.php" method="post" >
                          <script type="text/javascript" src="jquery-1.7.1.min.js"></script>
                             <script type="text/javascript" src="script.js"></script>
                    
                      <input type="hidden" name="role" value="<?php echo $_SESSION['JOB_TITLE']; ?>" />  
                      <input type="hidden" name="employee" value="<?php echo $_SESSION['PHONE_NUMBER']; ?>" />
                      <input type="hidden" name="trans_d" value="<?php echo $_GET['trans_d']; ?>" />
                   
                      <div id="display"></div>
                      <select name="product" style="width:650px; "class="chzn-select" required>
                      <div id="display"></div>
                      <option></option>
                         <?php

                         $sql = "SELECT * FROM product";
                          $result = mysqli_query($db,$sql);
                          while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <option value="<?php echo $row['PRODUCT_ID'];?>"><?php echo $row['BARCODE']; ?> - <?php echo $row['NAME']; ?> - <?php echo $row['DESCRIPTION']; ?> </option>
                        <?php
                        }
                        ?>
                      </select>
                      <input type="number" name="qty" value="1" min="1" placeholder="Qty" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" / required>
                      <input type="hidden" name="discount" value="" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" />
                      <input type="hidden" name="date" value="<?php echo date("m/d/y"); ?>" />
                      
                      <Button type="submit" class="btn btn-info" name ="add" style="width: 123px; height:35px; margin-top:-5px;" /><i class="icon-plus-sign icon-large"></i> Add</button>
                      </form>
                      </li> </ul>
                 <br></br>
                
                      
                <table class="table table-bordered" id="resultTable" data-responsive="table">
	              <thead>
                   <tr>
                     <th>Product Name</th>
                     <th>Quantity</th>
                     <th>Price</th>
                     <th>Amount</th>
                     <th>Action</th>
                   </tr>
               </thead>
          <tbody>

<?php                  


    $trans_d = $_GET['trans_d'];
    $query = 'SELECT *FROM transaction_details  WHERE  TRANS_D_ID = '.$_GET['trans_d'];
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
         
            while ($row = mysqli_fetch_assoc($result)) { 

                $total = $row['QTY']*$row['PRICE'];               
                echo '<tr>';
                echo '<td>'. $row['PRODUCTS'].'</td>';
                echo '<td>'. $row['QTY'].'</td>';
                echo '<td>'. $row['PRICE'].'</td>';                                    
                echo '<td>'. $row['AMOUNT'].'</td>';
           ?>

			<td width="90"><a href="delete.php?id=<?php echo $row['ID']; ?>&trans_d=<?php echo $_GET['trans_d']; ?>&qty=<?php echo $row['QTY'];?>&code=<?php echo $row['PRODUCT_ID'];?>"><button class="btn btn-mini btn-warning"><i class="icon icon-remove"></i> Cancel </button></a></td>
    <?php                 
             }

?> 
    <tr>
    <td> Total Amount: </td>
			<th>  </th>
			<th>  </th>
			<th><?php
    				function formatMoney($number, $fractional=false) {
              if ($fractional) {
                $number = sprintf('%.2f', $number);
              }
              while (true) {
                $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
                if ($replaced != $number) {
                  $number = $replaced;
                } else {
                  break;
                }
              }
              return $number;
            }

    $query = 'SELECT sum(AMOUNT)FROM transaction_details  WHERE  TRANS_D_ID = '.$_GET['trans_d'];
    $result = mysqli_query($db, $query) or die (mysqli_error($db));
     
        while ($rowas = mysqli_fetch_assoc($result)) { 
				$fgfg=$rowas['sum(AMOUNT)'];
				echo formatMoney($fgfg, true);
				}
				?>  </th>
            <th>  </th>
        
				</strong></td>
		</tr>

                           
                                </tbody>
                                </table><br>
<a rel="facebox" href="checkout.php?trans_d=<?php echo $_GET['trans_d']?>&total=<?php echo $fgfg ?>&cashier=<?php echo $_SESSION['FIRST_NAME']?>"><button class="btn btn-success btn-large btn-block"><i class="icon icon-save icon-large"></i> PROCEED</button></a>
<div class="clearfix"></div>
                            </table>
                        </div>
                    </div>
                  </div>




<?php include ('footer.php'); ?>
   
 <?php

include'../includes/footer.php';
?>