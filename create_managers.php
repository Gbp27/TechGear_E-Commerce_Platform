<!--Name: Geetha Punukollu-->
<!--Date: March 05 2024-->
<!--Course/Section: IT-202-004-->
<!--Assignment Name: Phase 4-->
<!--Email: gbp@njit.edu-->

<?php 
    require_once('database_njit.php');

    function EssentialTechmanager($email, $password, $firstName, $lastName) {
        $db = getDB();
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = 'INSERT INTO EssentialTechManagers (emailAddress, password, firstName, lastName, dateCreated)
                VALUES (:email, :password, :firstName, :lastName, NOW())';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $hash);
        $statement->bindValue(':firstName', $firstName);
        $statement->bindValue(':lastName', $lastName);
        $statement->execute();
        $statement->closeCursor();
    }

    EssentialTechmanager('test@gmail.com', 'test123', 'te', 'st');
    EssentialTechmanager('user1@gmail.com', 'test123', 'one', 'uno');
    EssentialTechmanager('user2@gmail.com', 'test123', 'two', 'dos');

?>