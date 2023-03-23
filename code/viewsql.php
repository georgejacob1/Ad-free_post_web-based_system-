
<?php
include 'db_con.php';
include 'session.php';
if (isset($_POST['addtosubmit'])) {
    // $pname = $_POST['pname'];
    // $price = $_POST['price'];
    // $desc = $_POST['desc'];
    // $img = $_POST['img'];
    // $user = $_POST['user'];
    // $phone = $_POST['phone'];
    $pid = $_POST['prod_id'];

    $prod_query = "SELECT * FROM `tbl_product` WHERE product_id='$pid'";
    $prod_query_run = mysqli_query($conn, $prod_query);
    while ($prod_row = mysqli_fetch_array($prod_query_run)) {
        $pname = $prod_row['p_name'];
        $price = $prod_row['price'];
        $img = $prod_row['p_image'];
        $desc = $prod_row['p_description'];

        $sqll = "select * from tbl_cart where pid='$pid' and username='$email'";
        $run = mysqli_query($conn, $sqll);
        $s = mysqli_num_rows($run);
        if ($s != 0) {
            echo "<script>alert('Product Already Exist')</script>";
            // header("location:cart.php");
        } else {
            $ab = "INSERT INTO `tbl_cart`(`pid`,`pname`, `price`,`image`, `description`,`username`) VALUES ('$pid','$pname','$price','$img','$desc','$email')";
            $exe = mysqli_query($conn, $ab);

            if ($exe) {
                echo "alert('Product Added')";
                // header("location:userview.php");
            }
        }
    }
    // echo "<script>alert('$pname')</script>";
}






// session_start();

if (isset($_POST['deleproduct'])) {
    $pid = $_POST['prod_id'];
    $sq = "DELETE from `tbl_cart` WHERE pid='$pid' and username='$email'";
    $re = mysqli_query($conn, $sq);
    if ($re) {
        echo '<script>alert("product removed")</script>';
    }
}

?>