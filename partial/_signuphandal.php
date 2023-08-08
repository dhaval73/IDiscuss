<?php
include('_dbconnection.php');

if ($_SERVER['REQUEST_METHOD']=='POST') {
    $user_email=$_POST['email'];
    $user_pass=$_POST['pass'];
    $user_cpass=$_POST['cpass'];
    $user_name=$_POST['uname'];
    $ExistSql="SELECT * FROM `users` WHERE `user_email`='$user_email'";
    $ExistRuselt=mysqli_query($conn,$ExistSql);
    if (mysqli_num_rows($ExistRuselt)>0) {
        $ShowError="User is alredy Exist";
        header('location: ../index.php?ShowError='.$ShowError.'') ;   
    }
    else{
        if ($user_pass==$user_cpass) {
            
            $hash=password_hash($user_pass, PASSWORD_DEFAULT);
            $sql="INSERT INTO `users` (`user_name`,`user_email`, `user_pass`) VALUES ('$user_name','$user_email', '$hash')";
            $Result=mysqli_query($conn,$sql);
            if ($Result) {
                $ShowAlert='Your signup is Succussful. Now you can login.';
                header('location: ../index.php?ShowAlert='.$ShowAlert.'');
            } else {
                header('location: ../index.php?ShowAlert=false') ;   
            }
            
        } else {
            $ShowError="Password not match";
            header('location: ../index.php?ShowError='.$ShowError.'') ;   
        }
    }
}
?>