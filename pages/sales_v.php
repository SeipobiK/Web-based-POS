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
            ?>
            
      <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h4 class="m-2 font-weight-bold text-primary">Total Sales by Cashier</h4>
             </div>
              <div class="card-body">
               <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th width=""> Cashier(Name)</th>
                     <th width="">Cashier(Surname)</th>
                     <th width="">Employee ID</th>
                     <th>Total Sales</th>
                   </tr>
               </thead>
          <tbody>

<?php                  
  
    $query = 'SELECT EMPLOYEE,sum(AMOUNT) as total,EMPLOYEE_ID,PHONE_NUMBER,FIRST_NAME,LAST_NAME
     FROM transaction t 
     join transaction_details q on t.TRANS_D_ID=q.TRANS_D_ID 
     join employee e on q.EMPLOYEE=e.PHONE_NUMBER 
     GROUP BY EMPLOYEE_ID';
    $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
                                 
                echo '<tr>';
                echo '<td>'. $row['FIRST_NAME'].'</td>';
                echo '<td>'. $row['LAST_NAME'].' </td>';
                echo '<td>'. $row['EMPLOYEE_ID'].'</td>';
                echo '<td> M'. $row['total'].'</td>';
                     
                echo '</tr> ';
                        }
           ?> 
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>

<?php
include'../includes/footer.php';
?>
