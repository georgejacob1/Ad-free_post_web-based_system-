<?php
session_start();
if($_SESSION['email']){
    $email = $_SESSION['email'];
}
else{
    echo '<script> alert ("Error!");</script>';
    echo'<script>window.location.href="forgot_pass.php";</script>';
}
include 'db_con.php';
if(isset($_POST['submit_otp'])){
    $otp = $_POST['otp-enter'];
    $otp_check = "SELECT `otp_code` FROM `tbl_login` WHERE `email`= '$email'";
    $otp_run = mysqli_query($conn,$otp_check);
    $row = mysqli_fetch_array($otp_run);
    // echo $row['otp_code'];
    if($row['otp_code'] === $otp){
        $upotp = "UPDATE `tbl_login` SET `otp_code`='0' WHERE `email`= '$email'";
        mysqli_query($conn,$upotp);
        echo '<script> alert ("OTP verified");</script>';
        echo'<script>window.location.href="updatePass.php";</script>';
    }else{
        echo '<script> alert ("Invalid OTP");</script>';
        echo'<script>window.location.href="enter-otp.php";</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="sty.css">
    <title>Login</title>
</head>
<body>
<div class="login-form-container active">
    <form action="" method="POST">
        <h3>OTP Verification</h3>
        <a href="index.php"><center><img src="image/logo.png" class="logo" alt="" height="60px" width="60px"></a></center> 
        <input type="text" name="otp-enter" class="box" placeholder="Enter your OTP here" maxlength="6" required>
       <input type="submit" class="btn" name="submit_otp" value="Verify OTP">
    </form>
</div>
</body>
</html>