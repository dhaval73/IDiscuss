<?php
include('_dbconnection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Login_email = $_POST['LoginEmail'];
    $Login_pass = $_POST['LoginPass'];

    $Sql = "SELECT * FROM `users` WHERE `user_email`='$Login_email'";
    $Ruselt = mysqli_query($conn, $Sql);
    if (mysqli_num_rows($Ruselt) == 1) {
        $row = mysqli_fetch_assoc($Ruselt);
        if (password_verify($Login_pass, $row['user_pass'])) {
            session_start();
            $_SESSION['user_login']=true;
            $_SESSION['user_name']=$row['user_name'];
            $_SESSION['user_id']=$row['user_id'];
            $ShowAlert = 'Your login Is Successful.';
            header('location: ../index.php?ShowAlert=' . $ShowAlert . '');
        } else {
            $ShowError = "Password not match";
            header('location: ../index.php?ShowError=' . $ShowError . '');
        }
    } else {
        $ShowError = "Invalid login Credential";
        header('location: ../index.php?ShowError=' . $ShowError . '');
    }
}
?>