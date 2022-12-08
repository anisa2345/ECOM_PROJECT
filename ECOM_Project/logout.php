<?php
   session_start();
   
   if(session_destroy()) {
      header("Location: index.php?lgout_msg=Logged out successfully");
   }
?>