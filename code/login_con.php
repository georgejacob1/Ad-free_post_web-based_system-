<?php
session_start(); 
include 'db_con.php';
if(isset($_POST['submit_login'])){
    $user = $_POST['username'];
    $password = $_POST['password'];
    $login_check = "SELECT * FROM tbl_login as a,tbl_usertype as b WHERE a.email='$user' AND a.password='$password' AND a.type_id=b.type_id";
	$login_check_result = mysqli_query($conn, $login_check);
	$rsltcheck = mysqli_num_rows($login_check_result);
    $row = mysqli_fetch_array($login_check_result);
    if($rsltcheck == 1){
        if($row['email'] == $user && $row['password'] == $password && $row['type_name'] == "user"){
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['type_name'] = $row['type_name'];
            header("location: user.php");
        }
        else if($row['email'] == $user && $row['password'] == $password && $row['type_name'] == "admin"){
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['type_name'] = $row['type_name'];
            header("location: admin/index.php");
        }
    }
    else{
        echo '<script> alert ("Invalid credentials");</script>';
	    echo'<script>window.location.href="login.php";</script>';
    }

}
?>