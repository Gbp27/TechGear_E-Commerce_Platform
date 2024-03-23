<?php
//Name: Geetha Punukollu
//Date: March 22 2024
//Course/Section: IT-202-004
//Assignment Name: Phase 3
//Email: gbp@njit.edu

// Get the product data
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$code = filter_input(INPUT_POST, 'code');
$name = filter_input(INPUT_POST, 'name');
$description = filter_input(INPUT_POST, 'description');
$color = filter_input(INPUT_POST, 'color');
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

// validate inputs
if ($category_id == NULL || $category_id == FALSE || $code == NULL || 
        $name == NULL || $description == NULL || $color == NULL || $price == NULL || $price == FALSE) {
    $error = "Invalid product data. Check all fields and try again.";
    echo "$error <br>";
} else {
    
    require_once('database_njit.php');

    //validation to make sure code is unique
    $query1 = 'SELECT * FROM techAccessories WHERE techCode = :code';
    $statement1 = $db->prepare($query1);
    $statement1->bindValue(':code', $code);
    $statement1->execute();
    $result = $statement1->fetch();
    $statement1->closeCursor();

    if ($result[0] == NULL || $result[0] == '') {
        $query2 = 'INSERT INTO techAccessories
                 (techcategoryID, techCode, techName, description, color, price, dateCreated)
              VALUES
                 (:category_id, :code, :name, :description, :color, :price, NOW())';
        $statement2 = $db->prepare($query2);
        $statement2->bindValue(':category_id', $category_id);
        $statement2->bindValue(':code', $code);
        $statement2->bindValue(':name', $name);
        $statement2->bindValue(':description', $description);
        $statement2->bindValue(':color', $color);
        $statement2->bindValue(':price', $price);
        $success = $statement2->execute();
        $statement2->closeCursor();
        
        include('projectHeader.php');
        echo "<p style='color:red;'>Your insert statement status is $success</p>";
        include('projectFooter.php');
    } else {
        include('projectHeader.php');
        echo "<p style='color:red;'>Your insert statement uses a code that already has been used.";
        include('projectFooter.php');
    }
}
?>
<p><a href="categories.php">View List of Product</a></p>