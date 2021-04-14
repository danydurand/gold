<?php
   if (isset($_GET['m'])) {
      $_SESSION['m'] = $_GET['m']
   } else {
      $_SESSION['m'] = 'h';
   }
   header('Location: index.php');
?>