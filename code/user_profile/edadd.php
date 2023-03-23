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


if (isset($_POST['btnpro'])) {
    $c_image = $_FILES['profileimg']['name'];
    $c_image_temp = $_FILES['profileimg']['tmp_name'];

    move_uploaded_file($c_image_temp, "images/$c_image");

    $c_update = "UPDATE `tbl_address` SET `profileimg`='$c_image' WHERE `login_id`='$logid'";

    $run_update = mysqli_query($conn, $c_update);

    if ($run_update) {

        echo "<script>alert('profile image updated')</script>";
        echo "<script>window.open('userprofile.php','_self')</script>";
    }
}



if (isset($_POST['removeimg'])) {
    

    $r_update = "UPDATE `tbl_address` SET `profileimg`='NILL' WHERE `login_id`='$logid'";

    $rem_update = mysqli_query($conn, $r_update);

    if ($rem_update) {

        echo "<script>alert('profile image removed')</script>";
        echo "<script>window.open('userprofile.php','_self')</script>";
    }
}




// if (isset($_POST["btnpro"])) {
//     $profileimg = $_FILES["profileimg"]["name"];
//     echo $profileimg;
//     exit;
//     move_uploaded_file($_FILES["profileimg"]["tmp_name"], "images/" . $_FILES["profileimg"]["name"]);



//     $user_profile = "UPDATE `tbl_address` SET `profileimg`='$profileimg' WHERE `login_id`='$logid'";
//     $user_profile_rslt = $conn->query($user_profile);

//     echo '<script> alert ("profile image updated");</script>';
//     echo '<script>window.location.href="userprofile.php";</script>';
// }

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
