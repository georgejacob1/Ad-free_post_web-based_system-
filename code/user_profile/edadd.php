<?php
include '../db_con.php';
include 'userprofile-session.php';
$logid = $_SESSION['login_id'];
if (isset($_POST['btnsubmit'])) {
    $house = $_POST['house'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pin = $_POST['pin'];


    $user_check = "UPDATE `tbl_address` SET `house`='$house',`street`='$street',`city`='$city',`state`='$state',`pincode`='$pin' WHERE `login_id`='$logid'";
    $user_check_rslt = $conn->query($user_check);

    echo '<script> alert ("Address updated");</script>';
    echo '<script>window.location.href="userprofile.php";</script>';
}

if (isset($_POST['btnname'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];



    $user_check = "UPDATE `tbl_users` SET `user_fname`='$fname',`user_lname`='$lname' WHERE `login_id`='$logid'";
    $user_check_rslt = $conn->query($user_check);

    echo '<script> alert ("Name updated");</script>';
    echo '<script>window.location.href="userprofile.php";</script>';
}
if (isset($_POST['btnph'])) {
    $phone = $_POST['phone'];
    $email = $_POST['email'];



    $user_check = "UPDATE `tbl_users` SET `user_phone`='$phone' WHERE `login_id`='$logid'";
    $user_check_rslt = $conn->query($user_check);
    $user_check1 = "UPDATE `tbl_login` SET `email`='$email' WHERE `login_id`='$logid'";
    $user_check_rslt1 = $conn->query($user_check1);
    echo '<script> alert ("Contact info updated");</script>';
    echo '<script>window.location.href="userprofile.php";</script>';
}
