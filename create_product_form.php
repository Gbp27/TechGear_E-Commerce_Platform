<?php
//Name: Geetha Punukollu
//Date: March 22 2024
//Course/Section: IT-202-004
//Assignment Name: Phase 3
//Email: gbp@njit.edu
require_once('database_njit.php');

$query = 'SELECT *
          FROM techCategories
          ORDER BY techCategoryID';
$db = getDB();
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Add Products Page</title>
    <link rel="stylesheet" href="project_style.css" />
</head>

<!-- the body section -->
<body>
    <header>
    <?php include('projectHeader.php'); ?>
    </header>

    <main>
        <h1>Add Product</h1>
        <form action="create_product.php" method="post"
              id="create_product_form">

            <label>Category:</label>
            <select name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['techCategoryID']; ?>">
                    <?php echo $category['techCategoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br>
            <label>Code:</label>
            <input type="text" name="code" id="code" minlength="4" maxlength="10" required><br>

            <label>Name:</label>
            <input type="text" name="name" id="name" minlength="10" maxlength="100" required><br>

            <label>Description:</label>
            <input type="text" style="height:100px; width:350px;" name="description" id="description" minlength="10" maxlength="255" required><br>

            <label>Color:</label>
            <input type="text" name="color" id="color" required><br>

            <label>List Price:</label>
            <input type="number" name="price" id="price" min="1" max="100000" required><br>

            <input type="submit" value="Add Product"><br>
            <input type="reset" value="Clear Form" id="reset_button"/>
        </form>
        <p><a href="categories.php">View Product List</a></p>
    </main>
    <!-- copy-paste from releases.jquery.com -->
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <!-- copy-paste from releases.jquery.com -->
    <script src="clear_button.js"></script>
    <footer>
        <?php include('projectFooter.php'); ?>
    </footer>
</body>
</html>