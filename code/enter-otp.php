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
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <title>Login</title>
    <style>
        body{
            background-color: #DEDEDE;
        }
     .navbar {
        overflow: hidden;
        background-color: #333;
        position: absolute;
        width: 100%;
        left: 0px;
        top: 0px;
        }


        .navbar a {
        float: right;
        color: white;
        padding-top: 30px;
        margin-right: 50px;
        text-decoration: none;
        font-family: 'Itim';
        }
        .navbar a.left {
            float: left;
            padding: 0%;
            padding-left: 25px;
        }
        .navbar a:hover {
        color: rgb(185, 185, 185);
        }
        .ticket{
            position: absolute;
            width: 561px;
            height: 497px;
            left: 807px;
            top: 163px;
        }
        table{
            position: absolute;
            left: 550px;
            top: 200px;
        }
        table label{
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 700;
            font-size: 23px;
            line-height: 48px;
        }
        input:not([type=submit]){
            box-sizing: border-box;
            background: #D9D9D9;
            border: 2px solid #757070;
            border-radius: 9px;
            padding: 10px;
            width: 300px;
            height: 45px;
        }
        input[type="submit"] {
            position: absolute;
            background: #1E1E1E;
            top: 120px;
            height: 40px;
            width: 90px;
            border-radius: 20px;
            color: white;
            border: none;
            font-family: 'Poppins';
            /* font-weight: bold; */
            
        }
        input[type="submit"]:hover{
            background-color: #000000;
            cursor: pointer;
        }
        ::placeholder{
            font-family: 'Poppins';
            padding-left: 8px;
            font-weight: 700;
        }
        </style>
</head>
<body>
    <div class="navbar">
        <a class="left" href="index.php"><img src="imgs/main-logo.png" alt="BookMyTickets" width="200" height="80"></a>
    </div>
    <form action="" method="POST">
    <table>
        <tr><td><label for="email">OTP Verification</label></td></tr>
        <tr><td><input type="text" name="otp-enter" placeholder="Enter your OTP here" maxlength="6" required></td></tr>
        <tr><td><input type="submit" name="submit_otp" value="Verify OTP"></td></tr>
    </table>
    </form>
</body>
</html>