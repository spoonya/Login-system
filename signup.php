<?php
    require "header.php"
?>

<style>
    .wrapper {
        width: 100%;
        max-width: 400px;
        margin: 0 auto;
        margin-top: 50px;
        padding: 20px;

        border-radius: 2px;
        background-color: #fff;
    }

    .form__sign-up {
        display: flex;
        align-items: center;
        flex-direction: column;
    }

    .form__sign-up h1 {
        text-align: center;
        margin-bottom: 10px;
        color: #000;
    }

    .form__sign-up input {
        margin-bottom: 15px;

        border: 1px solid #c7c7c7;
    }

    .signup-error {
        color: rgb(229, 9, 20);
        text-align: center;
    }
    .signup-success {
        color: rgb(13, 221, 58);
        text-align: center;
    }
</style>

<section class="wrapper">
    <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == "emptyfields") {
                echo '<p class="signup-error">Fill in all fields!</p>';
            }
            else if ($_GET['error'] == "invalidemailusername") {
                echo '<p class="signup-error">Invalid username and email!</p>';
            }
            else if ($_GET['error'] == "invalidemail") {
                echo '<p class="signup-error">Invalid email!</p>';
            }
            else if ($_GET['error'] == "invaliusername") {
                echo '<p class="signup-error">Invalid username!</p>';
            }
            else if ($_GET['error'] == "passwordcheck") {
                echo '<p class="signup-error">Passwords do not match!</p>';
            }
            else if ($_GET['error'] == "usernametaken") {
                echo '<p class="signup-error">Username is already taken!</p>';
            }
        }
        else if ($_GET['signup'] == "success") {
            echo '<p class="signup-success">Sign up successfull!</p>';
        }
    ?>
    <form class="form__sign-up" action="includes/signup.inc.php" method="post">
        <h1>Sign Up</h1>
        <input type="text" name="username" placeholder="Username" require>
        <input type="mail" name="email" placeholder="Email" require>
        <input type="password" name="pwd" placeholder="Password" require>
        <input type="password" name="pwd-repeat" placeholder="Repeate password" require>
        <button class="btn" name="signup-submit">Sign Up</button>
    </form>
</section>

<?php
    require "footer.php";
?>