<html>
    
    <head>
        <style>
            .login-form-container form {
                width: 0%;
            }
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
        <div class="login-form-container active">
            <script>
                function add()
                {
                // if(document.getElementById("pass").value != document.getElementById("cpass").value)
                // {
                // alert("Passwords are not same");
                // return false;
                // }
    var pw1 = document.getElementById("pass").value;
    var pw2 = document.getElementById("cpass").value;
    if(pw1 != pw2) {
        //alert("Passwords doesnot match");
        // pw2 = setCustomValidity("Passwords are not same");
        // pw2.reportValidity();
        //return false;
        document.getElementById('msg1').style.display = "block";
        document.getElementById('msg1').innerHTML = "Password doesnot match";
        return false;
    }
    else{
        document.getElementById('msg1').style.display = "none";
    }
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

    // var ph = document.getElementById("phn").value;
    // var expr = /^[6-9]\d{9}$/;
    // if(expr.test(ph)==false){
    //     document.getElementById('msg2').style.display = "block";
    //     document.getElementById('msg2').innerHTML = "Invalid Phone number";
    //     return false;
    //             }
    //             else{
    //     document.getElementById('msg2').style.display = "none";
    // }
            }


        function phno(){
            var ph = document.getElementById("phn").value;
    var expr = /^[6-9]\d{9}$/;
    if(expr.test(ph)==false){
        document.getElementById('msg2').style.display = "block";
        document.getElementById('msg2').innerHTML = "Invalid Phone number";
        return false;
                }
                else{
        document.getElementById('msg2').style.display = "none";
    }
        }
            
                </script>
        
            <form action="reg_con.php" method="post" onsubmit="return add()">
                <h3>Sign up</h3>
                <a href="index.php "><center><img src="image/logo.png" class="logo" alt="" height="60px" width="60px"></a></center>  
                <span>Name</span>
                <input type="text" name="fname"
                 class="box" placeholder="Firstname" style="width: 179px" id="" pattern="[a-zA-Z]+"  title="Name must be alphabets">
                <input type="text" name="lname" class="box" placeholder="Lastname" style="width: 179px;margin: -100px; margin-left: 7px;" id="" pattern="[a-zA-Z]+" title="Name must be alphabets" >
                <span>Email</span>
                <input type="email" name="mail" class="box" placeholder="enter your email" id="ema"   required pattern="/^[\w\+\'\.-]+@[\w\'\.-]+\.[a-zA-Z]{2,}$/" onkeyup="return add()">
                <span class="msg" id="message"></span>
                <span>Phone no.</span>
                <input type="tel" name="phone" class="box" placeholder="Enter your phone number" id="phn" required pattern="^[6-9]\d{9}$"  title="Please enter a valid phone number" onkeyup="return phno()">
                <span class="msg" id="msg2"></span>
                <span>password</span>
                <input type="password" name="password" class="box" placeholder="Enter your new password here" required id="pass">
                <span>Confirm Password</span>
                <input type="password" name="confirm-password" class="box" placeholder="Re-enter your password here" onkeyup="return add()"   id="cpass">
                <span class="msg" id="msg1"></span>
                <input type="submit" value="sign up" class="btn" name="register">
                <p>Already have an account?<a href="login.php">Sign In</a></p>
            </form>
        
        </div>
    </body>`
    
</html>
