<?php
include'../includes/connection.php';
include'../includes/sidebar.php';


$query2 = 'DELETE FROM users WHERE EMPLOYEE_ID='. $_GET['id'];
$result2 = mysqli_query($db, $query2) or die(mysqli_error($db));

  $query = 'DELETE FROM employee WHERE EMPLOYEE_ID='. $_GET['id'];
  $result = mysqli_query($db, $query) or die(mysqli_error($db));		
  		
?>


    <script type="text/javascript">alert("Employee Successfully Deleted.");window.location = "employee.php";</script>					
           
    