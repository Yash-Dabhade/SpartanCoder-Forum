<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_dbconnect.php';
    $email = $_POST['loginEmail'];
    $pass = $_POST['loginPass'];

    $sql = "Select * from users where user_email='$email'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if ($numRows == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($pass, $row['user_pass'])) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['useremail'] = $email;
            if ($email == "admin@gmail.com") {
                $_SESSION['isAdmin'] = true;
                header("Location:  /projects/StudyForum/admin/dashboard.php");
                exit();
            }
        } else {
            $showError = "User does not exist or Password do not match";
            header("Location: /projects/StudyForum/index.php?loginsuccess=false&error=$showError");
            exit();
        }
        header("Location:  /projects/StudyForum/index.php");
    } else {
        $showError = "User does not exist or Password do not match";
        header("Location: /projects/StudyForum/index.php?loginsuccess=false&error=$showError");
        exit();
    }
    header("Location:  /projects/StudyForum/index.php");
}
