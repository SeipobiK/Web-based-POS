<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
?><?php 
$time = $_SERVER['REQUEST_TIME'];

/**
* for a 30 minute timeout, specified in seconds
*/
$timeout_duration = 18;

/**
* Here we look for the user's LAST_ACTIVITY timestamp. If
* it's set and indicates our $timeout_duration has passed,
* blow away any previous $_SESSION data and start a new one.
*/
if (isset($_SESSION['LAST_ACTIVITY']) && 
   ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    session_unset();
    session_destroy();
    session_start();
}

/**
* Finally, update LAST_ACTIVITY so that our timeout
* is based on it and not the user's login time.
*/
$_SESSION['LAST_ACTIVITY'] = $time;


                $query = 'SELECT ID, t.TYPE
                          FROM users u
                          JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
                $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
                while ($row = mysqli_fetch_assoc($result)) {
                          $Aa = $row['TYPE'];
                   
if ($Aa=='User'){
   $today = date("mdGis"); 
   
   
             ?>    <script type="text/javascript">
                      //then it will be redirected
                      alert("Restricted Page! You will be redirected to POS");
                      window.location = "pos.php?trans_d=<?php echo $today ?>";
                  </script>
             <?php   }
                         
           
}   
            ?>
     <style>    
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  padding: 0 10px;
}

/* Remove extra left and right margins, due to padding in columns */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* this adds the "card" effect */
  padding: 16px;
  text-align: center;
  background-color: #f1f1f1;
}

/* Responsive columns - one column layout (vertical) on small screens */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}
</style> 


<div class="row">
  <div class="column">
    <div class="card">
    <img src="expi.jpg"   style="width:100%;max-width:400px" alt="Lights"></img> 
    <div> Products ordered by expiry date </div>
    <a  href="expiProd.php">here</a></div>
  </div>
  <div class="column">
    <div class="card">
    <img src="download.jpg"   style="width:100%;max-width:400px" alt="Lights"></img>
     <div>Click    <a  href="low_inv.php">here</a> to view more</div>
     
    
    </div>
  </div>
  <div class="column">
    <div class="card">
    <img src="report1.png"   style="width:100%;max-width:400px" alt="Lights"></img>  
          
         <div> sales report by cashier</div>
        <a  href="sales_v.php">here</a>

      
    </div>
   
    
  </div>
  <div class="column">
  <div class="card">
    <img src="sales.jpg"   style="width:100%;max-width:400px" alt="Lights"></img>
     <div>Click    <a  href="tot_sales.php">here</a> to view total sales</div>
     
    
    </div>
  </div>
</div>










<?php
include'../includes/footer.php';
?>