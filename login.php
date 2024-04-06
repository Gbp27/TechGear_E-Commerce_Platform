<!--Name: Geetha Punukollu-->
<!--Date: March 05 2024-->
<!--Course/Section: IT-202-004-->
<!--Assignment Name: Phase 4-->
<!--Email: gbp@njit.edu-->

<?php 
    if (!isset($login_message)) {
        $login_message = 'You must login to view this page.';
        }
        ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
        <link rel="stylesheet" href="project_style.css" />
    </head>
    <body>
        <h1>Essecial Tech Accessories</h1>
        <main>
            <h1>Login</h1>

                
            <form action="authenticate.php" method="post">

                <?php print_r($_SESSION['is_valid_admin']); ?>

                <label>Email:</label>
                <input type="text" name="email" value="">
                <br>
                <label>Password:</label>
                <input type="password" name="password" value="">
                <br>
                <input type="submit" value="Login">
            </form>
                <p><?php echo $login_message; ?></p>
        </main>
    </body>
</html>