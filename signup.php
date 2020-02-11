<?php
    require "header.php"
?>

<style>
    .wrapper__inner {
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

        color: #000;
    }

    .form__sign-up input {
        margin-bottom: 15px;

        border: 1px solid #c7c7c7;
    }
</style>

<section class="wrapper">
    <div class="wrapper__inner">
        <form class="form__sign-up" action="includes/signup.inc.php" method="post">
            <h1>Sign Up</h1>
            <input type="text" name="username" placeholder="Username" require>
            <input type="mail" name="email" placeholder="Email" require>
            <input type="password" name="pwd" placeholder="Password" require>
            <input type="password" name="pwd-repeat" placeholder="Repeate password" require>
            <button class="btn" name="signup-submit">Sign Up</button>
        </form>
    </div>
</section>

<?php
    require "footer.php";
?>