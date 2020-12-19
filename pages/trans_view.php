<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
  $query = 'SELECT ID, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['TYPE'];
                   
  if ($Aa=='User'){
?>
  <script type="text/javascript">
    //then it will be redirected
    alert("Restricted Page! You will be redirected to POS");
    window.location = "pos.php";
  </script>
<?php
  }           
}

 $query = 'SELECT *, FIRST_NAME, LAST_NAME, PHONE_NUMBER, EMPLOYEE, ROLE
              FROM transaction T
              JOIN customer C ON T.`CUST_ID`=C.`CUST_ID`
              JOIN transaction_details tt ON tt.`TRANS_D_ID`=T.`TRANS_D_ID`
              WHERE TRANS_ID ='.$_GET['id'];
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
        while ($row = mysqli_fetch_assoc($result)) {
          $fname = $row['FIRST_NAME'];
          $lname = $row['LAST_NAME'];
          $pn = $row['PHONE_NUMBER'];
          $date = $row['DATE'];
          $tid = $row['TRANS_D_ID'];
          $grant = $row['GRANDTOTAL'];
          $amnt = $row['AMOUNT'];
          $cash = $row['CASH'];
          $role = $row['EMPLOYEE'];
          $roles = $row['ROLE'];
        }
        $query1 = 'SELECT * FROM transaction_details WHERE TRANS_D_ID='.$tid;
        $result1 = mysqli_query($db, $query1) or die (mysqli_error($db));
        while ($row1 = mysqli_fetch_assoc($result1)) {

          $pnumb = $row1['EMPLOYEE'];
        }
        $query11 = 'SELECT * FROM EMPLOYEE WHERE PHONE_NUMBER='.$pnumb;
        $result11 = mysqli_query($db, $query11) or die (mysqli_error($db));
        while ($row11 = mysqli_fetch_assoc($result11)) {

          $emp_id = $row11['EMPLOYEE_ID'];
          $emp_name = $row11['FIRST_NAME'];
          $emp_sname = $row11['LAST_NAME'];
        }

        $query12 = 'SELECT sum(PROFIT) FROM transaction_details WHERE TRANS_D_ID='.$tid;
        $result12 = mysqli_query($db, $query12) or die (mysqli_error($db));
        while ($row12 = mysqli_fetch_assoc($result12)) {

          $Prft = $row12['sum(PROFIT)'];

        }




        
?>
            
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="form-group row text-left mb-0">
                <div class="col-sm-9">
                  <h5 class="font-weight-bold">
                    Sales and Inventory
                  </h5>
                </div>
                <div class="col-sm-3 py-1">
                  <h6>
                    Date: <?php echo $date; ?>
                  </h6>
                </div>
              </div>
<hr>
              <div class="form-group row text-left mb-0 py-2">
                <div class="col-sm-4 py-1">
                  <h6 class="font-weight-bold">
                    <?php echo $fname; ?> <?php echo $lname; ?>
                  </h6>
                  <h6>
                    Phone: <?php echo $pn; ?>
                  </h6>
                </div>
                <div class="col-sm-4 py-1"></div>
                <div class="col-sm-4 py-1">
                  <h6 >
                    Transaction # :<?php echo $tid; ?>
                  </h6>
                  <h6 >
                    Cashier: <?php echo $emp_name; ?>  <?php echo $emp_sname; ?>
                  </h6>
                 
                  <h6 >
                    Employee ID: <?php echo $emp_id; ?>
                  </h6>
                  <h6 >
                   Role: <?php echo $roles; ?>
                  </h6>
                </div>
              </div>
          <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Products</th>
                <th width="8%">Qty</th>
                <th width="20%">Price</th>
                <th width="20%">Subtotal</th>
                <th width="20%">Profit</th>
              </tr>
            </thead>
            <tbody>
<?php  
           $query = 'SELECT *
                     FROM transaction_details
                     WHERE TRANS_D_ID ='.$tid;
            $result = mysqli_query($db, $query) or die (mysqli_error($db));
            while ($row = mysqli_fetch_assoc($result)) {
              $Sub =  $row['QTY'] * $row['PRICE'];
                echo '<tr>';
                echo '<td>'. $row['PRODUCTS'].'</td>';
                echo '<td>'. $row['QTY'].'</td>';
                echo '<td>'. $row['PRICE'].'</td>';
                echo '<td>'. $Sub.'</td>';
                echo '<td>'. $row['PROFIT'].'</td>';
                echo '</tr> ';
                        }
?>
            </tbody>
          </table>
            <div class="form-group row text-left mb-0 py-2">
                <div class="col-sm-4 py-1"></div>
                <div class="col-sm-3 py-1"></div>
                <div class="col-sm-4 py-1">
                  <h4>
                   
                  </h4>
                  <table width="100%">
                  <tr>
                      <td class="font-weight-bold">Profit</td>
                      <td class="font-weight-bold text-right text-primary">M <?php echo number_format($Prft, 2); ?></td>
                    </tr>
                  
                    <tr>
                      <td class="font-weight-bold">Total</td>
                      <td class="font-weight-bold text-right text-primary">M <?php echo number_format($grant, 2);  ?></td>
                    </tr>
                  </table>
                </div>
                <div class="col-sm-1 py-1"></div>
              </div>
            </div>
          </div>


<?php
include'../includes/footer.php';
?>
