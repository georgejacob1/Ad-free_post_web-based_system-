<?php
include 'db_con.php';
include 'session.php';
// session_start();
if ($_SESSION['email']) {
    $email = $_SESSION['email'];

    $name = "SELECT * FROM tbl_login as a, tbl_users as b WHERE a.login_id=b.login_id and a.email='$email'";
    $name_check = mysqli_query($conn, $name);
    $row = mysqli_fetch_array($name_check);
}
if(isset($_GET['product']))
{
    $id=$_GET['product'];
    $sq="DELETE from `tbl_cart` WHERE id=$id";
    $re=mysqli_query($conn,$sq);
    if($re){
        header('location:cart.php');
    }
}
