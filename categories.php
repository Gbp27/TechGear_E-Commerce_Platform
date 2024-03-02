<!--Name: Geetha Punukollu-->
<!--Date: February 29 2024-->
<!--Course/Section: IT-202-004-->
<!--Assignment Name: Phase 1-->
<!--Email: gbp@njit.edu-->

<!DOCTYPE html>
<html>
    <header>
        <title>Home Page</title>
        
    </header>
    <body>
        <?php include('projectHeader.php'); ?>
        <table id='prods' border='1'>
            <tr>
                <td> Tech Name</td>
                <td> Description </td>
                <td> Color </td>
                <td> Price </td>
            </tr>
            
            <?php
                $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
                if ($category_id == NULL || $category_id == FALSE) {
                  $category_id = 1;
                }
                
                // Get name for selected category
                $queryCategory = 'SELECT * FROM techCategories
                          WHERE techCategoryID = :category_id';
                $statement1 = $db->prepare($queryCategory);
                $statement1->bindValue(':category_id', $category_id);
                $statement1->execute();
                $category = $statement1->fetch();
                $category_name = $category['techCategoryName'];
                $statement1->closeCursor();

                $queryAllCategories = 'SELECT * FROM techCategories ORDER BY techCategoryID';
                $statement2 = $db->prepare($queryAllCategories);
                $statement2->execute();
                $categories = $statement2->fetchAll();
                $statement2->closeCursor();

                // Get products for selected category
                $queryProducts = 'SELECT * FROM techAccessories
                        WHERE techCategoryID = :category_id
                        ORDER BY techID';
                $statement3 = $db->prepare($queryProducts);
                $statement3->bindValue(':category_id', $category_id);
                $statement3->execute();
                $products = $statement3->fetchAll();
                $statement3->closeCursor();
                ?>

            </tr>

                <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?php echo $product['techName']; ?></td>
                    <td><?php echo $product['description']; ?></td>
                    <td><?php echo $product['color']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                </tr>
                <?php endforeach; ?>            

        </table>
        <?php include('projectFooter.php'); ?>
    </body>
</html>