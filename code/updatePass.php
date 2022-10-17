<?php
include 'db_con.php';
session_start();
// if(!empty($_SESSION['email']))
// {
//     echo $_SESSION['email'];
// }
$pass_value = $_SESSION['email'];
// echo $pass_value;
if(isset($_POST['submit_reset'])){
    $cpass = $_POST['cpass'];
        $insert = "UPDATE `tbl_login` SET `password`='$cpass' WHERE `email`='$pass_value'";
        mysqli_query($conn,$insert);
        echo '<script> alert ("Password updated successfully");</script>';
	    echo'<script>window.location.href="login.php";</script>';
    
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
    var pw1 = document.getElementById("pass").value;
    var pw2 = document.getElementById("cpass").value;
    if(pw1 != pw2) {
        document.getElementById('msg1').style.display = "block";
        document.getElementById('msg1').innerHTML = "Password doesnot match";
        return false;
    }else{
        document.getElementById('msg1').style.display = "none";
    }
       
    }

    </script>
        


    <div class="login-form-container active">
        
            <form action="" method="post" onsubmit="return add()">
                <h3>Forgo</h3>
                <a href="index.php"><center><img src="image/logo.png" class="logo" alt="" height="60px" width="60px"></a></center>  
                <span>password</span>
                <input type="password" name="password" class="box" placeholder="Enter your new password here" required id="pass">
                <span>Confirm Password</span>
                <input type="password" name="cpass" class="box" placeholder="Re-enter your password here" onkeyup="return add()"   id="cpass">
                <span class="msg" id="msg1"></span>
                <!-- <div class="checkbox">
                    <input type="checkbox" name="" id="remember-me">
                    <label for="remember-me"> remember me</label>
                </div> -->
                <input type="submit" value="submit_reset" class="btn" name="submit_reset">
                <p>forget password ? <a href="forgot_pass.php">click here</a></p>
                <p>don't have an account ? <a href="reg.php">create one</a></p>
            </form>
        
        </div>
    </body>
    
</html>