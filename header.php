<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
    <link href="https://fonts.googleapis.com/css?family=Solway:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header__inner">
                
                <nav class="header__nav">
                    <a class="nav__item" href="index.php">Home</a>
                </nav>
                
                <div class="header__signInUp">
                    <?php
                        if (isset($_SESSION['userId'])) {
                            echo '<form action="includes/logout.inc.php" method="post">
                                    <button class="btn" name="logout_submit">Log Out</button>
                                </form>';
                        }
                        else {
                            echo '<form action="includes/login.inc.php" method="post">
                                    <input type="text" name="mail-username" placeholder="Email or Username">
                                    <input type="password" name="pwd" placeholder="Password">
                                    <button class="btn" name="login-submit">Log In</button>
                                    <a class="header__sign-up" href="signup.php">Sign Up</a>
                                </form>';
                        }
                    ?>
                </div> <!-- /.header__signInUp -->
            </div> <!-- /.header__inner -->
        </div> <!-- /.container -->
    </header>
</body>

</html>