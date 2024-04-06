<!--Name: Geetha Punukollu-->
<!--Date: March 05 2024-->
<!--Course/Section: IT-202-004-->
<!--Assignment Name: Phase 4-->
<!--Email: gbp@njit.edu-->

<?php
 
  session_destroy();     // Clean up the session ID
  $_SESSION = array();  // Clear all session data from memor//  unset('is_valid_admin');
  $login_message = 'You have been logged out.';
  include('login.php');
?>