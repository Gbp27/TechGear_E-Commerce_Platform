<!--Name: Geetha Punukollu-->
<!--Date: February 16 2024-->
<!--Course/Section: IT-202-004-->
<!--Assignment Name: Phase 1-->
<!--Email: gbp@njit.edu-->

<html>
    <header>
        <title>Shipping Page</title>
        <link rel="stylesheet" href="project_style.css" />
    </header>
    <body>
        <?php include('projectHeader.php'); ?>
        <form action="shipping_results.php" method="post">
        <h3>Shipping Details:</h3>
        <?php
            if( !empty($errormsg)) {
                echo "<p style=\"color:red\">";
                echo $errormsg;
                echo "</p>";
            }
        ?>
        
        <table>
        <tr>
            <td>
            <label>First Name:</label>
            </td>
            <td>
            <input type='text' name="first_name" />
            </td>
        </tr>
        <tr>
            <td>
            <label>Last Name:</label>
            </td>
            <td>
            <input type='text' name="last_name" />
            </td>
        </tr>
        <tr>
            <td>
            <label>Street:</label>
            </td>
            <td>
            <input type='text' name="street" />
            </td>
        </tr>
        <tr>
            <td>
            <label>City: </label>
            </td>
            <td>
            <input type='text' name="city" />
            </td>
        </tr>
        <tr>
            <td>
            <label>State: </label>
            </td>
            <td>
            <input type='text' name="state" />
            </td>
        </tr>
        <tr>
            <td>
            <label>Zip Code: </label>
            </td>
            <td>
            <input type='text' name="zip_code" />
            </td>
        </tr>
        <tr>
            <td>
            <label>Shipping date: </label>
            </td>
            <td>
            <input type='text' name="shipping_date" />
            </td>
        </tr>
        <tr>
            <td>
            <label>Order number: </label>
            </td>
            <td>
            <input type='text' name="order_number" />
            </td>
        </tr>
        <tr>
            <td>
            <label>Dimensions: (in.)</label>
            </td>
            <td>
            <input type='text' name="dimensions" />
            </td>
        </tr>
        <tr>
            <td>
            <label>Total Value: </label>
            </td>
            <td>
            <input type='text' name="total_value" />
            </td>
        </tr>
        </table>
        <input type="submit" value="Purchase" />
        <?php include('projectFooter.php'); ?>
    </body>
</html>