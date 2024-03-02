<!--Name: Geetha Punukollu-->
<!--Date: February 16 2024-->
<!--Course/Section: IT-202-004-->
<!--Assignment Name: Phase 1-->
<!--Email: gbp@njit.edu-->

<header>
    <h1>Essential Tech Accessories</h1>
    <h4>
    <table>
        <tr>
            <td><a href="home.php">Home </a> 
            
            <?php require_once('database_njit.php') ;
        $queryAllCategories = 'SELECT * FROM techCategories ORDER BY techcategoryID';
        $statement2 = $db->prepare($queryAllCategories);
        $statement2->execute();
        $categories = $statement2->fetchAll();
        //$statement2->closeCursor();

        //for ($counter = 0; $counter < $total_column; $counter ++) {
            //$meta = $statement2->getColumnMeta($counter);
          //  $column[] = $meta['name'];
        //}
        //print_r($column);
        ?>

                <?php foreach($categories as $category) : ?>                  
                        | 
                        <a href="categories.php?category_id=<?php echo $category[0]; ?>"><?php echo $category[1]; ?></a>
                <?php endforeach ?>
            
            <a href="shipping.php">| Purchase Link</a></td>
        </tr>
    </table>
    <h4>
</header>