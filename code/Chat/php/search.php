<?php
    session_start();
    include_once "../../db_con.php";

    $outgoing_id = $_SESSION['login_id'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    $sql = "SELECT * FROM tbl_users WHERE NOT login_id = {$outgoing_id} AND (user_fname LIKE '%{$searchTerm}%' OR user_lname LIKE '%{$searchTerm}%') ";
    $output = "";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }else{
        $output .= 'No user found related to your search term';
    }
    echo $output;
