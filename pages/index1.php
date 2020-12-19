<?php
include'../includes/connection.php';
include'../includes/topp.php';
//imma make it trans uniq id
$today = date("mdGis");
 ?> 
 <li class="active"><a href="pos.php?trans_d=<?php echo $today ?>"><i class="icon-shopping-cart icon-2x"></i> Continue</a>  </li>
 <?php

?>