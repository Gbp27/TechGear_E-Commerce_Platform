<!--Name: Geetha Punukollu-->
<!--Date: February 16 2024-->
<!--Course/Section: IT-202-004-->
<!--Assignment Name: Phase 1-->
<!--Email: gbp@njit.edu-->

<?php
    $first_name = filter_input(INPUT_POST, 'first_name');
    $last_name = filter_input(INPUT_POST, 'last_name');
    $street = filter_input(INPUT_POST, 'street');
    $city = filter_input(INPUT_POST, 'city');
    $state = filter_input(INPUT_POST, 'state');
    $zip = filter_input(INPUT_POST, 'zip_code');
    $date = filter_input(INPUT_POST, 'shipping_date');
    $order = filter_input(INPUT_POST, 'order_number');
    $dimensions = filter_input(INPUT_POST, 'dimensions');
    $total = filter_input(INPUT_POST, 'total_value');
    $errormsg = '';

    if ($total > 1000) {
        $errormsg .= 'The total must be a valid number.<br>';
    } else if ($total < 0){
        $errormsg .= 'The total must be a valid number.<br>';
    }

    if ($dimensions > 36) {
        $errormsg .= "The dimensions of the package are too big.<br>";
    } else if ($dimensions < 0){
        $errormsg .= 'The dimensions of the package must be a valid number.<br>';
    }

    if (10000 >= $zip or $zip >= 99999){
        $errormsg .= "Invalid zip code.<br>";
    }
    
    if($errormsg != '') {
        include('shipping.php');
        exit();
    }
?>

<html>
    <header>
        <title>Home Page</title>
        <link rel="stylesheet" href="project_style.css" />
    </header>
    <body>
        <?php include('projectHeader.php'); ?>
        <h3>Shipping Reciept:</h3>
            <p>From Address: 919 Some Street, A Town, New Jersey, 23489</p>
            <p>To Address: <?php echo $street . $city . $state . $zip ?></p>
            <p>Package Dimensions: <?php echo $dimensions ?></p>
            <p>Package Value: <?php echo $total ?></p>
            <p>Shipping Company: UPS</p>
            <p>Shipping Class: Priority Mail</p>
            <p>Tracking number: 483205741-07483</p>
            <!--image of the barcode -->
            <p>Order Number: <?php echo $order ?></p>
            <p>Ship Date: <?php echo $date ?></p>

        <?php include('projectFooter.php'); ?>
    </body>
</html>