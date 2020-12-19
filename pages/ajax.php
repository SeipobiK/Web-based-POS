<?php
//Including Database configuration file.
include'../includes/connection.php';
//Getting value of "search" variable from "script.js".
if (isset($_POST['product'])) {
//Search box value assigning to $Name variable.
   $Name = $_POST['product'];
//Search query.
   $Query = "SELECT * FROM product WHERE BARCODE LIKE '%$Name%' OR NAME LIKE '%$Name%' OR DESCRIPTION LIKE '%$Name%' LIMIT 5";
//Query execution
   $ExecQuery = MySQLi_query($db, $Query);
//Creating unordered list to display result.
   echo '
<ul>
   ';
   //Fetching result from database.
   while ($Result = MySQLi_fetch_array($ExecQuery)) {
       ?>
   <!-- Creating unordered list items.
        Calling javascript function named as "fill" found in "script.js" file.
        By passing fetched result as parameter. -->
   <li onclick='fill("<?php echo $Result['BARCODE']; ?>")'>


   <a class="nav-link">
   <!-- Assigning searched result in "Search box" in "search.php" file. -->
   
   <ul class="nav-item">
   <a class="nav-link" ><?php echo $Result['BARCODE'];     echo $Result['NAME'];     echo $Result['DESCRIPTION'];  ?></a>
   </ul>
  
 
   </li></a>

   <!-- Below php code is just for closing parenthesis. Don't be confused. -->
   <?php

}}
?>
</ul>


