<?php
    //Slide 24
    //function getDB() {
        //modify line 3
        $dsn = 'mysql:host=localhost;port=3306;dbname=gbp;';
        $username = 'geetha';
        $password = 'geetha';

        try {
            $db = new PDO($dsn, $username, $password);
            echo '<p>You are connected to the local database!</p>';
        } catch (PDOException $ex) {
            echo '<p>You are NOT connected ot the NJIT database!</p>';
            $error_message = $ex->getMessage();
            include("database_error.php");
            exit();
        }
    // Modify line 18 and 19

    //}

?>