<?php

include'../includes/connection.php';

if(isset($_REQUEST["term"])){
   // Prepare a select statement
   $sql = "SELECT * SELECT * FROM product WHERE BARCODE LIKE '%$Name%' OR NAME LIKE '%$Name%' OR DESCRIPTION LIKE '%$Name%' LIMIT 5";
   
   if($stmt = mysqli_prepare($db, $sql)){
       // Bind variables to the prepared statement as parameters
       mysqli_stmt_bind_param($stmt, "s", $param_term);
       
       // Set parameters
       $param_term = $_REQUEST["term"] . '%';
       
       // Attempt to execute the prepared statement
       if(mysqli_stmt_execute($stmt)){
           $result = mysqli_stmt_get_result($stmt);
           
           // Check number of rows in the result set
           if(mysqli_num_rows($result) > 0){
               // Fetch result rows as an associative array
               while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                   echo "<p>" . $row["name"] . "</p>";
               }
           } else{
               echo "<p>No matches found</p>";
           }
       } else{
           echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
       }
   }
    
   // Close statement
   mysqli_stmt_close($stmt);
}
?>
