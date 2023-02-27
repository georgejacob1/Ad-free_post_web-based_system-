<?php
include '../db_con.php';
if (!empty($_POST['cat'])) {
    $cat = $_POST['cat'];
    $s = mysqli_query($conn, "SELECT count(*) as count FROM tbl_categories WHERE category='$cat'");
    $display = mysqli_fetch_array($s);
    if ($display['count'] > 0) {
        echo "<span>This category name is already exist</span>";
    } else {
        echo "<span>This category name </span>";
    }
}

if (isset($_GET['cat_id'])) {
    $cat_id = mysqli_real_escape_string($conn, $_GET['cat_id']);

    $query = "SELECT * FROM `tbl_categories` WHERE cat_id='$cat_id'";
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

if (isset($_POST['update_cat'])) {
    $newcat = $_POST['cat'];
    $cat_id = $_POST['cat_id'];
    $query = "UPDATE `tbl_categories` SET `category`='$newcat' WHERE `cat_id`='$cat_id'";
    $query_run = mysqli_query($conn, $query);
}

if (isset($_POST['delete_cat'])) {
    $cat_id = $_POST['cat_id'];
    $query = "UPDATE `tbl_categories` SET `del_status`='1' WHERE `cat_id`='$cat_id'";
    $query_run = mysqli_query($conn, $query);
}

if (isset($_GET['sub_id'])) {
    $sub_id = mysqli_real_escape_string($conn, $_GET['sub_id']);
    $query = "SELECT a.*, b.* FROM tbl_subcat a INNER JOIN tbl_categories b ON a.cat_id=b.cat_id and a.sub_id='$sub_id'";
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

// if (isset($_POST['update_subcat'])) {

//     $query = "UPDATE `tbl_categories` SET `category`='$newcat' WHERE `cat_id`='$cat_id'";
//     $query_run = mysqli_query($conn, $query);
// }


if (isset($_POST['delete_subcat'])) {
    $sub_id = $_POST['sub_id'];
    $query = "UPDATE `tbl_subcat` SET `del_status`='1' WHERE `sub_id`='$sub_id'";
    $query_run = mysqli_query($conn, $query);
}


if (isset($_POST['update_subcat'])) {
    $sub_id = mysqli_real_escape_string($conn, $_POST['sub_id']);
    $sub = $_POST['sub'];
    $sub_cat = $_POST['sub_cat'];
    $query = "UPDATE `tbl_subcat` SET `p_name`='$name',`p_description`='$des',`price`='$price' WHERE `sub_id`='$sub_id'";
    $query_run = mysqli_query($conn, $query);
  }