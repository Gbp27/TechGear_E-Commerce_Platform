<!--Name: Geetha Punukollu-->
<!--Date: March 05 2024-->
<!--Course/Section: IT-202-004-->
<!--Assignment Name: Phase 4-->
<!--Email: gbp@njit.edu-->

<?php
  require_once('database_njit.php');

  $tech_id = filter_input(INPUT_POST, 'tech_id', FILTER_VALIDATE_INT);
  $techCategory_id = filter_input(INPUT_POST, 'techCategory_id', FILTER_VALIDATE_INT);

  if ($tech_id != FALSE && $techCategory_id != FALSE) {
    $query = 'DELETE FROM techAccessories WHERE techID = :tech_id';
    $db = getDB();
    $statement = $db->prepare($query);
    $statement->bindValue(':tech_id', $tech_id);
    $success = $statement->execute();
    $statement->closeCursor();
    echo "<p>Your delete statement status is $success</p>";
  }
?>