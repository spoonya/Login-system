<?php
    require "header.php"
?>

    <main>
        <div class="wrapper-main">
            <section class="section-default">
                <h1>Sign Up</h1>
                <form action="includes/singup.inc.php" method="post">
                    <input type="text" name="uid" placeholder="Username">
                    <input type="mail" name="email" placeholder="Email">
                    <input type="password" name="pwd" placeholder="Password">
                    <input type="password" name="pwd" placeholder="Repeate password">
                    <button name="signup-submit ">Sign Up</button>
            </form>
            </section>
        </div>
    </main>

<?php
    require "footer.php";
?>