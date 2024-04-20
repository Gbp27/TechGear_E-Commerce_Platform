<!--Name: Geetha Punukollu-->
<!--Date: April 19 2024-->
<!--Course/Section: IT-202-004-->
<!--Assignment Name: Phase 5-->
<!--Email: gbp@njit.edu-->

<!DOCTYPE html>
<html>
    <header>
        <title>Details Page</title>
        <link rel="stylesheet" href="project_style.css" />
    </header>
    <body>
        <?php include('projectHeader.php'); ?>

        <?php
        require_once('database_njit.php');

        $tech_id = filter_input(INPUT_GET, 'tech_id', FILTER_VALIDATE_INT);
        $techName = filter_input(INPUT_GET, 'techName');
        $description = filter_input(INPUT_GET, 'description');
        $color = filter_input(INPUT_GET, 'color');
        $price = filter_input(INPUT_GET, 'price', FILTER_VALIDATE_FLOAT);
        
        //print_r($_GET);

        if ($tech_id != FALSE && $techName != FALSE && $description != FALSE && $color != FALSE && $price != FALSE) {
            echo '<h4>' . $techName . '</h4>';
            echo '<img src = "images/' . $tech_id . '.jpg" alt = "image unable to load" class="prodimgs" style = "float: right;" width = 200 px>';

            echo '<p> Description: ' . $description . '</p>';
            echo '<p> Available Colors: ' . $color . '</p>';
            echo '<p> Price: ' . $price . '</p>';
            
        } else {
            echo "<p> Sorry, the item your looking for has information that has not been processed yet. </p>";
        }
        ?>


        <?php include('projectFooter.php'); ?>
    </body>
</html>