<?php
include('_dbconnection.php');

if ($_SERVER['REQUEST_METHOD']=='POST') {
    $cont_name=$_POST['cont_name'];
    $cont_mobile=$_POST['cont_mobile'];
    $cont_email=$_POST['cont_email'];
    $cont_sub=$_POST['cont_sub'];
    $cont_message=$_POST['cont_message'];
  
  
            $sql="INSERT INTO `contact` ( `name`, `mobile_no`, `email`, `subject`, `message`) VALUES ('$cont_name', '$cont_mobile', '$cont_email', '$cont_sub', '$cont_message')";
            $Result=mysqli_query($conn,$sql);
            if ($Result) {
                $ShowAlert='Your message sent successful.';
                header('location: ../index.php?ShowAlert='.$ShowAlert.'');
            } else {
                $ShowError = "Error! your message is not send Please try again.";
                header('location: ../index.php?ShowError=' . $ShowError . '');
            }
        }   
       
?>