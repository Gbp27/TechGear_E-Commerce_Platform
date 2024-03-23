<?php
// TODO Change to database_local.php or database_njit.php
require_once('database_njit.php');

$query = 'SELECT *
          FROM techCategories
          ORDER BY techCategoryID';
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
            <input type="text" name="code"><br>

            <label>Name:</label>
            <input type="text" name="name"><br>

            <label>Description:</label>
            <input type="text" style="height:100px; width:350px;" name="description"><br>

            <label>Color:</label>
            <input type="text" name="color"><br>

            <label>List Price:</label>
            <input type="text" name="price"><br>

            <input type="submit" value="Add Product"><br>
        </form>
        <p><a href="categories.php">View Product List</a></p>
    </main>

    <footer>
        <?php include('projectFooter.php'); ?>
    </footer>
</body>
</html>