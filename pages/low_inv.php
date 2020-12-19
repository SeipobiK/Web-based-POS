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
            <h4 class="m-2 font-weight-bold text-primary">Low Inventory</h4>
             </div>
              <div class="card-body">
               <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th width=""> Name</th>
                     <th width="">Quantity left</th>
                    
            
                   </tr>
               </thead>
          <tbody>

          <?php 
                                $query = "SELECT NAME,BARCODE ,QTY_STOCK  FROM product p JOIN inventory i WHERE p.PRODUCT_ID=i.PRODUCT_ID AND QTY_STOCK<10  ORDER BY QTY_STOCK ASC ";
                                $result = mysqli_query($db, $query) or die(mysqli_error($db));
                                while ($row = mysqli_fetch_array($result)) {

                                   echo '<tr>';

                                          echo '<td>'. $row[0].'</td>';
                                          echo '<td>'. $row[2].'</td>';

                                          echo '</tr>';       
                                            
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
