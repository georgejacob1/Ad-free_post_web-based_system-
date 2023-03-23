<?php
session_start();
include_once "../../db_con.php";
$outgoing_id = $_SESSION['login_id'];
// $sql = "SELECT * FROM tbl_users as a, messages WHERE NOT login_id = {$outgoing_id} ORDER BY user_id DESC";
$sql = "SELECT distinct a.user_fname, a.user_lname, a.login_id FROM tbl_users a INNER JOIN messages b ON a.login_id = b.incoming_msg_id or a.login_id = b.outgoing_msg_id  WHERE NOT a.login_id = {$outgoing_id} ORDER BY user_id DESC";
$query = mysqli_query($conn, $sql);
$output = "";
if (mysqli_num_rows($query) == 0) {
    $output .= "No users are available to chat";
} elseif (mysqli_num_rows($query) > 0) {
    include_once "data.php";
}
echo $output;
?>

<!-- session_start();
    include_once "../../db_con.php";
    $outgoing_id = $_SESSION['login_id'];
    $sql = "SELECT * FROM tbl_users WHERE NOT login_id = {$outgoing_id} ORDER BY user_id DESC";
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output; -->