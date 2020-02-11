<?php
    if (isset($_POST['signup-submit'])) {
        require 'dbh.inc.php';

        $username = $_POST['username'];
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $pwdRepeat = $_POST['pwd-repeat'];

        //Empty fields
        if (empty($username) || empty($email) || empty($pwd) || empty($pwdRepeat)) {
            header("Location: ../signup.php?error=emptyfields&username=".$username."&email=".$email);
            exit();
        }
        //Email & password check
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            header("Location: ../signup.php?error=invalidemailusername");
            exit();
        }
        //Email syntax check
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../signup.php?error=invalidemail&username=".$username);
            exit();
        }
        //Username syntax check
        else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            header("Location: ../signup.php?error=invalidusername&email=".$email);
            exit();
        }
        //Passwords equiv
        else if ($pwd !== $pwdRepeat) {
            header("Location: ../signup.php?error=passwordcheck&username=".$username."&email=".$email);
            exit();
        }
        //Username existence check
        else {
            $sql = "SELECT name_users FROM users WHERE name_users=?";
            $stmt = mysqli_stmt_init($con);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../signup.php?error=sqlerror");
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                //Username exists error
                if ($resultCheck > 0) {
                    header("Location: ../signup.php?error=usernametaken&email=".$email);
                    exit();
                }
                //Creating a new profile with a hashed pass
                else {
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

                    $sql = "INSERT into users (name_users, email_users, pwd_users) values(?, ?, ?)";
                    $stmt = mysqli_stmt_init($con);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../signup.php?error=sqlerror");
                        exit();
                    }
                    else {
                        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../signup.php?signup=success");
                        exit();
                    }
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($con);
    }
    //Access to the signup page without clicked submit-button
    else {
        header("Location: ../signup.php");
        exit();
    }