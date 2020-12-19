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
            <h4 class="m-2 font-weight-bold text-primary">products about to expire</h4>
             </div>
              <div class="card-body">
               <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th width=""> Name</th>
                     <th width="">Number of dayes left before expiry </th>
                    
            
                   </tr>
               </thead>
          <tbody>

<?php                  
  
  function dateDiffInDays($date1, $date2)  
  { 
    // Calculating the difference in timestamps 
    $diff = strtotime($date2) - strtotime($date1); 
      
    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds 
    return abs(round($diff / 86400)); 
  } 

      $datee = date("m/d/y", time());



  $query = "SELECT NAME,EXPIRY_DATE FROM product WHERE EXPIRY_DATE BETWEEN CURRENT_DATE
  AND CURRENT_DATE + INTERVAL 7 DAY ORDER BY EXPIRY_DATE ASC LIMIT 10";
  $result = mysqli_query($db, $query) or die(mysqli_error($db));
  while ($row = mysqli_fetch_array($result)) {
      $days =dateDiffInDays($datee, $row[1]);


      if($days>0)
    {                                   
        echo '<tr>';
        echo '<td>'. $row[0].'</td>';
        echo '<td>'. $days.'</td>';
        echo '</tr> ';
       
          }

    else{
        echo '<tr>';
        echo '<td>'. $row[0].'</td>';
        echo '<td style="color:red">Expired</td>';
        echo '</tr> ';

    }
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
