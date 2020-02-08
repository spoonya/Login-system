<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                    <form action="includes/login.inc.php" method="post">
                        <input type="text" name="mailuid" placeholder="Email or Username">
                        <input type="password" name="mailuid" placeholder="Password">
                        <button class="btn" name="login-submit">Log In</button>
                    </form>

                    <a class="header__sign-up" href="signup.php">Sign Up</a>

                    <form action="includes/logout.inc.php" method="post">
                        <button class="btn" name="logout_submit">Log Out</button>
                    </form>
                </div>
            </div>
        </div>
    </header>
</body>

</html>