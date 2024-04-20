<!--Name: Geetha Punukollu-->
<!--Date: February 16 2024-->
<!--Course/Section: IT-202-004-->
<!--Assignment Name: Phase 1-->
<!--Email: gbp@njit.edu-->

<header>
<link rel="stylesheet" href="project_style.css" />
    <h1>Essential Tech Accessories</h1>

    <?php 
 
    
    if ($_SESSION['is_valid_admin'] == true) {
        echo 'The user email is: ';
        print_r($_SESSION['email']);
        print_r($_SESSION['is_valid_admin']);
    } ?>
    
    <h4>
    <table>
        <tr>
            <td><a href="home.php">Home </a> 
            
            <?php require_once('database_njit.php') ;
        $queryAllCategories = 'SELECT * FROM techCategories ORDER BY techcategoryID';
        $db = getDB();
        $statement2 = $db->prepare($queryAllCategories);
        $statement2->execute();
        $categories = $statement2->fetchAll();
        $statement2->closeCursor();

        ?>

                <?php foreach($categories as $category) : ?>                  
                        | <a href="categories.php?category_id=<?php echo $category[0]; ?>"><?php echo $category[1]; ?></a>
                <?php endforeach ?>
                <?php if ($_SESSION['is_valid_admin'] = true) { ?>
                    | <a href="shipping.php">Purchase Link</a> | 
                    <a href="create_product_form.php">Create Product</a> | 
                    <a href="shipping.php">Ship Product</a>
                <?php } ?>

            <?php 
            if ($_SESSION['is_valid_admin'] == true) {
    ?>
      <p>
        <a href="logout.php">Logout</a>
      </p>
    <?php } else { ?>
        <p>
        <a href="login.php">Login</a>
      </p>
    <?php } ?></td>
        </tr>
    </table>
    <h4>
</header>