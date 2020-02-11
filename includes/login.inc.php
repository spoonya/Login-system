<?php
    if (isset($_POST['login-submit'])) {
        require 'dbh.inc.php';

        $mailUsername = $_POST['mail-username'];
        $pwd = $_POST['pwd'];

        if (empty($mailUsername) || empty($pwd)) {
            header("Location: ../index.php?error=emptyfields");
            exit();
        }
        else {
            $sql = "SELECT * FROM users WHERE name_users=? OR email_users=?;";
            $stmt = mysqli_stmt_init($con);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../index.php?error=sqlerror");
            exit();
            }
            else {
                mysqli_stmt_bind_param($stmt, "ss", $mailUsername, $mailUsername);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if ($row = mysqli_fetch_assoc($result)) {
                    $pwdCheck = password_verify($pwd, $row['pwd_users']);
                    if ($pwdCheck == false) {
                        header("Location: ../index.php?error=wrongpassword");
                    exit();
                    }
                    else if ($pwdCheck == true) {
                        session_start();
                        $_SESSION['userId'] = $row['id_users'];
                        $_SESSION['username'] = $row['name_users'];

                        header("Location: ../index.php?login=success");
                        exit();
                    }
                    else {
                        header("Location: ../index.php?error=wrongpassword");
                        exit();
                    }
                }
                else {
                    header("Location: ../index.php?error=nouser");
                    exit();
                }
            }
        }
    }
    else {
        header("Location: ../index.php");
        exit();
    }