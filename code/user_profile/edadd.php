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

    echo '<script> alert ("Contact info updated");</script>';
    echo '<script>window.location.href="userprofile.php";</script>';
}

if (isset($_GET['uid'])) {
    $uid = mysqli_real_escape_string($conn, $_GET['uid']);
    $query = "SELECT * FROM tbl_users WHERE `login_id`='$logid' ";
    // $query = "SELECT * FROM `tbl_subcat` WHERE sub_id='$sub_id'";
    $query_run = mysqli_query($conn, $query);

    if (mysqli_num_rows($query_run) == 1) {
        $cat = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'data' => $cat
        ];
        echo json_encode($res);
        return;
    }
}


if (isset($_GET['mid'])) {
    $mid = mysqli_real_escape_string($conn, $_GET['mid']);
    $query1 = "SELECT * FROM tbl_address WHERE `login_id`='$logid' ";
    // $query = "SELECT * FROM `tbl_subcat` WHERE sub_id='$sub_id'";
    $query_run1 = mysqli_query($conn, $query1);

    if (mysqli_num_rows($query_run1) == 1) {
        $cat1 = mysqli_fetch_array($query_run1);

        $res1 = [
            'status' => 200,
            'data' => $cat1
        ];
        echo json_encode($res1);
        return;
    }
}