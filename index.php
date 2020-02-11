<?php
    require "header.php"
?>
<style>
    .wrapper-main {
    width: 100%;
    max-width: 400px;
    margin: 0 auto;
    margin-top: 50px;
    padding: 20px;

    text-align: center;

    color: #000;
    border-radius: 2px;
    background-color: #fff;
}
</style>

    <section class="wrapper-main">
        <?php
            if (isset($_SESSION['userId'])) {
                echo '<p class="login-status">You are logged in!</p>';
            }
            else {
                echo '<p class="login-status">You are logged out!</p>';
            }
        ?>
    </section>

<?php
    require "footer.php";
?>