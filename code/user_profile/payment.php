<?php
include('../db_con.php');
include 'userprofile-session.php';
$logid = $_SESSION['login_id'];
$pymnt_id = $_POST['pay_id'];
$name = $_POST['name'];
$sid = $_POST['sid'];
$des = $_POST['des'];
$photo = $_POST['photo1'];
$photo2 = $_POST['photo2'];
$photo3 = $_POST['photo3'];
$d = date('y-m-d');
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$price = $_POST['price'];
date_default_timezone_set('Asia/Kolkata');
$pr_date = date('Y/d/m h:i:s a', time());
// $email = $_SESSION['email'];
$sql = "INSERT INTO `tbl_payment`(`login_id`, `trans_id`, `amount`, `transcation_date`) VALUES ('$logid', '$pymnt_id','100','$pr_date')";
$res21 = mysqli_query($conn, $sql);
$sql2 = "SELECT * FROM `tbl_payment` WHERE login_id='$logid' ORDER BY `pay_id` DESC LIMIT 1";
$res3 = mysqli_query($conn, $sql2);
$row3 = mysqli_fetch_array($res3);
//print_r($row2);
$payment_id = $row3['pay_id'];


echo $sql34 = "INSERT INTO `tbl_product`(`login_id`, `subcat_id`, `p_name`, `p_description`, `latitude`, `longitude`, `p_image`, `p_image2`, `p_image3`, `price`, `date`, `delete_status`, `paymet_id`) VALUES('$logid','$sid','$name','$des','$latitude','$longitude','$photo','$photo2','$photo3','$price','$d','1','$payment_id')";
mysqli_query($conn, $sql34);
