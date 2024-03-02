<?php
    //Slide 24 (sort of)

    $dsn = 'mysql:host=sql1.njit.edu;port=3306;dbname=gbp';
    $username = 'gbp';
    $password = 'MySequal-202';

    try {
        $db = new PDO($dsn, $username, $password);
        //echo '<p>You are connected ot the NJIT database!</p>';
    } catch (PDOExcpetion $ex) {
        echo '<p>You are NOT connected ot the NJIT database!</p>';
        $error_message = $ex->getMessage();
        include('database_error.php');
        exit();
    }