<!--Name: Geetha Punukollu-->
<!--Date: March 05 2024-->
<!--Course/Section: IT-202-004-->
<!--Assignment Name: Phase 4-->
<!--Email: gbp@njit.edu-->

<?php
  require_once('database_njit.php');
  
  function is_valid_admin_login($email, $password) {
    $db = getDB();
    $query = 'SELECT * FROM EssentialTechManagers WHERE emailAddress = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $row = $statement->fetch();
    $statement->closeCursor();  
    if ($row === false) {
      return false;
    } else {
      $hash = $row['password'];
      return password_verify($password, $hash);
    }
  }

  session_start();

  $email = filter_input(INPUT_POST, 'email');
  $password = filter_input(INPUT_POST, 'password');
  if (is_valid_admin_login($email, $password)) {
    $_SESSION['is_valid_admin'] = true;
    $_SESSION['email'] = $email;
    // redirect logged in user to default page
    include('projectHeader.php');
    
    //welcome page statement with full name
    $_SESSION['firstName'] = 'te';
    $firstName = $_SESSION['firstName'];
    $_SESSION['lastName'] = 'st';
    $lastName = $_SESSION['lastName'];
    
    //checking what's in the session array
    //print_r($_SESSION);

    echo "<p>You have successfully logged in. Welcome back $firstName $lastName. </p>";

    echo "<p>Use the task bar above to navigate through the pages.</p>";

    include('projectFooter.php');

  } else {
  if ($email == NULL && $password == NULL) {
    $login_message ='You must login to view this page.';
  } else {
    $login_message = 'Invalid credentials.';
  }
    include('login.php');
  }
?>