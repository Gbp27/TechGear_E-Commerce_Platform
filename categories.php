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
                <td> Information </td>
                <td> Delete </td>
            </tr>
            
            <?php
                $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
                if ($category_id == NULL || $category_id == FALSE) {
                  $category_id = 1;
                }
                
                // Get name for selected category
                $queryCategory = 'SELECT * FROM techCategories
                          WHERE techCategoryID = :category_id';
                $db = getDB();
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
                        ORDER BY techID ' ;
                $db = getDB();
                $statement3 = $db->prepare($queryProducts);
                $statement3->bindValue(':category_id', $category_id);
                $statement3->execute();
                $products = $statement3->fetchAll();
                $statement3->closeCursor();
                ?>

            </tr>
            
            <!--copy/paste from releases.jquery.com-->
            <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
            <!--copy/paste from releases.jquery.com-->
            
                
                <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?php echo $product['techName']; ?></td>
                    <td><?php echo $product['description']; ?></td>
                    <td><?php echo $product['color']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td>
                    <form action="product_details.php" method="get" id=info_page>
                            <input type="hidden" name="tech_id" value="<?php echo $product['techID']; ?>" />
                            <input type="hidden" name="techName" value="<?php echo $product['techName']; ?>" />
                            <input type="hidden" name="description" value="<?php echo $product['description']; ?>" />
                            <input type="hidden" name="color" value="<?php echo $product['color']; ?>" />
                            <input type="hidden" name="price" value="<?php echo $product['price']; ?>" />
                            <input type="submit" value="more info" />
                        </form>
                        </td>
                    <?php if ($_SESSION['is_valid_admin'] == true) { ?>
                        <td>
                        <form action="delete_product.php" method="post" id="delete_form<?php echo $product['techID']; ?>">
                        <input type="hidden" name="tech_id"
                            value="<?php echo $product['techID']; ?>" />
                        <input type="hidden" name="techCategory_id"
                            value="<?php echo $product['techCategoryID']; ?>" />
                        <input type="submit" value="Delete"/>
                        <script src="scripts/confirmation.js"></script>
                        <script>
                            $(document).ready( () => {
                           
                            $("#delete_form<?php echo $product['techID']; ?>").submit( event => {
                                var isValid = false;
                                if(confirm("Are your sure?")) {
                                    isValid = true;
                                } else {
                                    isValid = false;
                                }
                                if(isValid == false) {
                                    event.preventDefault();
                                }
                            })
                        });
                        </script>
                    </form>
                    </td>
                    <?php } ?>
                    
                    
                </tr>
                <?php endforeach; ?>            

        </table>
        <?php include('projectFooter.php'); ?>
    </body>
</html>