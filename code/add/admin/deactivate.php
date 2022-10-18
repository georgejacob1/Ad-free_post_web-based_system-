<?php
include '../db_con.php';
if($_GET['deactid']){
  $id = $_GET['deactid'];
  $act = "UPDATE `tbl_users` SET `user_status`='deactive' WHERE `user_id`='$id'";
  $act_run = mysqli_query($conn,$act);
  if($act_run){
    echo '<script>alert("Deactivated");</script>';
    echo '<script>window.location.href="index.php"</script>';
  }
}
?>