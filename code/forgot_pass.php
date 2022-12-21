<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
include 'db_con.php';
if(isset($_POST['send_otp'])){
    $mail = $_POST['email'];
    $checkMail = "SELECT * FROM tbl_login WHERE email='$mail'";
    $result = mysqli_query($conn,$checkMail);
    $rsltCheck = mysqli_num_rows($result);
    $fetch = mysqli_fetch_array($result);
    if($rsltCheck>0){
        $_SESSION['email'] = $fetch['email'];
        $email = $_SESSION['email'];
        $code = rand(999999, 111111);
        $insert_otp = "UPDATE `tbl_login` SET `otp_code`='$code' WHERE `email`='$email'";
        $data_check = mysqli_query($conn, $insert_otp);
        if($data_check){
        //     $subject = "Password Reset Verification Code";
        //     $message = "Your verification code is $code";
        //     $sender = "From:alanshijo@ymail.com";
        //     if(mail($email, $subject, $message, $sender)){
        //         echo '<script> alert ("OTP sent successfully");</script>';
        //         echo'<script>window.location.href="enter-otp.php";</script>';
        //     }else{
        //         echo '<script> alert ("OTP sent failed");</script>';
        //         echo'<script>window.location.href="forgot.php";</script>';
        // }
        $mail = new PHPMailer(true);
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'georgejacob2023a@mca.ajce.in';                     //SMTP username
        $mail->Password   = '8547123510';                               //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('georgejacob2023a@mca.ajce.in', 'easyBuy');
        $mail->addAddress($email);     //Add a recipient
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Forgot Password - OTP Verification';
        $body = "Need to reset your password? <br><br> Use your secret code! <br><br> <strong>$code</strong>";
        $mail->Body    = $body;
        $mail->AltBody = strip_tags($body);
    
        //$mail->send();
        if($mail->send()){
            echo '<script> alert ("OTP sent successfully");</script>';
            echo'<script>window.location.href="enter-otp.php";</script>';
        }else{
            echo '<script> alert ("OTP sent failed");</script>';
            echo'<script>window.location.href="forgot_pass.php";</script>';
        }
        }
    }
    else{
        echo '<script> alert ("The user doesnot exist!");</script>';
	    echo'<script>window.location.href="forgot_pass.php";</script>';
    }
}
?>
<html>
    <head>

    
    <style>
    .msg{
            color: #bf0808;
            font-size: small;
            font-weight: bold;
            } 
        </style>
    


        <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="sty.css">
    </head>


    <body>


    <script>
                function add()
                {
    var a=document.getElementById("ema").value;
    var st=/^[\w\+\'\.-]+@[\w\'\.-]+\.[a-zA-Z]{2,}$/;
    if(a!="" && st.test(a)==false){
        //alert("Invalid email id");
        document.getElementById('message').style.display = "block";
        document.getElementById('message').innerHTML = "Invalid Email id";
        return false;
    }
    else{
        document.getElementById('message').style.display = "none";
    }
               }
    </script>
        


    <div class="login-form-container active">
        
            <form action="" method="post">
                <h3>Forgot Password</h3>
                <a href="index.php"><center><img src="image/logo.png" class="logo" alt="" height="60px" width="60px"></a></center>  
                <span>email</span>
                <input type="email" name="email" class="box" placeholder="enter your email" id="ema" required pattern="/^[\w\+\'\.-]+@[\w\'\.-]+\.[a-zA-Z]{2,}$/" onkeyup="return add()">
                <span class="msg" id="message"></span>
                <!-- <div class="checkbox">
                    <input type="checkbox" name="" id="remember-me">
                    <label for="remember-me"> remember me</label>
                </div> -->
                <input type="submit" value="Send OTP" class="btn" name="send_otp">
                <p>don't have an account ? <a href="reg.php">create one</a></p>
            </form>
        
        </div>
    </body>
    
</html>
