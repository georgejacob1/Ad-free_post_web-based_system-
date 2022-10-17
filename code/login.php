<?php
session_start();
session_destroy();

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
        
            <form action="login_con.php" method="post">
                <h3>sign in</h3>
                <a href="index.php"><center><img src="image/logo.png" class="logo" alt="" height="60px" width="60px"></a></center>  
                <span>username</span>
                <input type="email" name="username" class="box" placeholder="enter your email" id="ema" required pattern="/^[\w\+\'\.-]+@[\w\'\.-]+\.[a-zA-Z]{2,}$/" onkeyup="return add()">
                <span class="msg" id="message"></span>
                <span>password</span>
                <input type="password" name="password" class="box" placeholder="enter your password" id="">
                <!-- <div class="checkbox">
                    <input type="checkbox" name="" id="remember-me">
                    <label for="remember-me"> remember me</label>
                </div> -->
                <input type="submit" value="sign in" class="btn" name="submit_login">
                <p>forget password ? <a href="forgot_pass.php">click here</a></p>
                <p>don't have an account ? <a href="reg.php">create one</a></p>
            </form>
        
        </div>
    </body>
    
</html>
