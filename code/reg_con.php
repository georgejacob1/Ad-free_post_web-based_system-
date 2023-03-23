<?php
include 'db_con.php';
if(isset($_POST['register'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mail = $_POST['mail'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $check = "SELECT * FROM tbl_login WHERE email='$mail'";
    $rslt = mysqli_query($conn, $check);
    $rsltcheck = mysqli_num_rows($rslt);
    if($rsltcheck == 0){
        $user_check = "SELECT `type_id` FROM `tbl_usertype` WHERE `type_name` = 'user'";
        $user_check_rslt = mysqli_query($conn,$user_check);
        while($row = mysqli_fetch_array($user_check_rslt)){
            //echo $row['type_id'];
        $type = $row['type_id'];
        $reg = "INSERT INTO `tbl_login`(`email`, `password`, `type_id`) VALUES ('$mail','$password','$type')";
        $reg_query = mysqli_query($conn,$reg);
        $last_id = mysqli_insert_id($conn);
        if($reg_query){
            $user_reg = "INSERT INTO `tbl_users`(`user_fname`, `user_lname`, `user_phone`, `user_status`, `login_id`) VALUES ('$fname','$lname','$phone','active','$last_id')";
            $user_reg_query = mysqli_query($conn,$user_reg);
            $user_regc = "INSERT INTO `tbl_address`(`login_id`, `house`, `street`, `city`, `state`, `pincode`,`profileimg`) VALUES ('$last_id','NILL','NILL','NILL','NILL','0','NILL')";
            $user_regc_query = mysqli_query($conn,$user_regc);
            echo'<script> alert ("Account created");</script>';
            echo'<script>window.location.href="login.php";</script>'; 
        }
        }
    }
    else{
        echo'<script> alert ("Account already exists!");</script>';
        echo'<script>window.location.href="login.php";</script>'; 
    }
}
