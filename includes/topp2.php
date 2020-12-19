
<?php
  require_once('session.php');
  confirm_logged_in();
?>            

              <?php 

                $query = 'SELECT ID, e.EMPLOYEE_ID FIRST_NAME,LAST_NAME,USERNAME,PASSWORD, t.TYPE
                          FROM users u
                          JOIN employee e ON e.EMPLOYEE_ID=u.EMPLOYEE_ID
                          JOIN type t ON t.TYPE_ID=u.TYPE_ID';
                $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
                while ($row = mysqli_fetch_assoc($result)) {
                          $a = $_SESSION['MEMBER_ID'];
                          $bbb = $_SESSION['TYPE'];
                }
                          
            ?>

                       
    