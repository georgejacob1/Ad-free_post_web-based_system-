<?php
include '../db_con.php';

include 'userprofile-session.php';
$logid = $_SESSION['login_id'];
if (isset($_POST["btnsubmit"])) {

  $name = $_POST['name'];

  $sid = $_POST['sid'];
  $des = $_POST['des'];
  $photo = $_FILES["photo"]["name"];
  $photo2 = $_FILES["photo2"]["name"];
  $photo3 = $_FILES["photo3"]["name"];
  $price = $_POST['price'];
  $year = $_POST['year'];



  move_uploaded_file($_FILES["photo"]["tmp_name"], "images/" . $_FILES["photo"]["name"]);
  move_uploaded_file($_FILES["photo2"]["tmp_name"], "images/" . $_FILES["photo2"]["name"]);
  move_uploaded_file($_FILES["photo3"]["tmp_name"], "images/" . $_FILES["photo3"]["name"]);

  $sql34 = mysqli_query($conn, "INSERT INTO `tbl_product`(`login_id`, `subcat_id`, `p_name`, `p_description`, `p_image`,`p_image2`,`p_image3`, `price`, `year`,`delete_status`) VALUES('$logid','$sid','$name','$des','$photo','$photo2','$photo3','$price','$year','1')");




  // if ($sql34) {

  //   echo "<script>alert('Product Details Registered Successfully!!');window.location='ads.php'</script>";
  // } else {
  //   echo "<script>alert('Error');window.location='ads.php'</script>";
  // }
} ?>
<?php
if (isset($_GET['ppid'])) {
  $product_id = mysqli_real_escape_string($conn, $_GET['ppid']);

  $query = "UPDATE `tbl_product` SET `delete_status`='0' WHERE `product_id`='$product_id'";
  $query_run = mysqli_query($conn, $query);
}

if (isset($_GET['pid'])) {
  $pid = mysqli_real_escape_string($conn, $_GET['pid']);
  $query = "SELECT a.*, b.*, c.* FROM tbl_product a INNER JOIN tbl_subcat b INNER JOIN tbl_categories c ON a.subcat_id=b.sub_id and b.cat_id=c.cat_id and a.product_id='$pid'";
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

if (isset($_GET['aid'])) {
  $pid = mysqli_real_escape_string($conn, $_GET['aid']);
  $query = "SELECT a.*, b.*, c.* FROM tbl_product a INNER JOIN tbl_subcat b INNER JOIN tbl_categories c ON a.subcat_id=b.sub_id and b.cat_id=c.cat_id and a.product_id='$pid'";
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

if (isset($_POST['update_sub'])) {
  $pid = mysqli_real_escape_string($conn, $_POST['pid']);
  $name = $_POST['name'];
  $des = $_POST['des'];
  $price = $_POST['price'];
  $query = "UPDATE `tbl_product` SET `p_name`='$name',`p_description`='$des',`price`='$price' WHERE `product_id`='$pid'";
  $query_run = mysqli_query($conn, $query);
}




//image checking

if (isset($_FILES['file']['name'])) {

  /* Getting file name */
  $filename = $_FILES['file']['name'];

  /* Location */
  $location = "images/" . $filename;
  $imageFileType = pathinfo($location, PATHINFO_EXTENSION);
  $imageFileType = strtolower($imageFileType);

  /* Valid extensions */
  $valid_extensions = array("jpg", "jpeg", "png");

  $response = 0;
  /* Check file extension */
  if (in_array(strtolower($imageFileType), $valid_extensions)) {
    if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
      // $response = $location;
      // echo "<span style='color:red;'>".$response."</span>";
      echo "<script>$('#addsub').prop('disabled',false);</script>";
    }
  } else {
    echo "<span style='color:red;'>upload files with extension jpg,jpeg,png are allowed</span>";
    echo "<script>$('#addsub').prop('disabled',true);</script>";
  }
}
if (isset($_FILES['file2']['name'])) {

  /* Getting file name */
  $filename = $_FILES['file2']['name'];

  /* Location */
  $location = "images/" . $filename;
  $imageFileType = pathinfo($location, PATHINFO_EXTENSION);
  $imageFileType = strtolower($imageFileType);

  /* Valid extensions */
  $valid_extensions = array("jpg", "jpeg", "png");

  $response = 0;
  /* Check file extension */
  if (in_array(strtolower($imageFileType), $valid_extensions)) {
    if (move_uploaded_file($_FILES['file2']['tmp_name'], $location)) {
      // $response = $location;
      // echo "<span style='color:red;'>".$response."</span>";
      echo "<script>$('#addsub').prop('disabled',false);</script>";
    }
  } else {
    echo "<span style='color:red;'>upload files with extension jpg,jpeg,png are allowed</span>";
    echo "<script>$('#addsub').prop('disabled',true);</script>";
  }
}

if (isset($_FILES['file3']['name'])) {

  /* Getting file name */
  $filename = $_FILES['file3']['name'];

  /* Location */
  $location = "images/" . $filename;
  $imageFileType = pathinfo($location, PATHINFO_EXTENSION);
  $imageFileType = strtolower($imageFileType);

  /* Valid extensions */
  $valid_extensions = array("jpg", "jpeg", "png");

  $response = 0;
  /* Check file extension */
  if (in_array(strtolower($imageFileType), $valid_extensions)) {
    if (move_uploaded_file($_FILES['file3']['tmp_name'], $location)) {
      // $response = $location;
      // echo "<span style='color:red;'>".$response."</span>";
      echo "<script>$('#addsub').prop('disabled',false);</script>";
    }
  } else {
    echo "<span style='color:red;'>upload files with extension jpg,jpeg,png are allowed</span>";
    echo "<script>$('#addsub').prop('disabled',true);</script>";
  }
}

?>

