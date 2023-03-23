<?php
include '../db_con.php';
?>

<?php
if (isset($_POST['subsubmit'])) {
	$sub = $_POST['sub'];
	$cat = $_POST['sub_cat'];
	$s = mysqli_query($conn, "SELECT count(*) as count, `del_status` FROM tbl_subcat WHERE cat_id='$cat' AND subcat='$sub';");
	$display = mysqli_fetch_array($s);

	if ($display['count'] > 0) {
		if ($display['del_status'] == 1) {
			$ql = "UPDATE `tbl_subcat` SET `del_status`='0' WHERE cat_id='$cat' AND subcat='$sub'";
			echo "<script>alert('Sub-Category Details Registered Successfully!!');window.location='sub_cat.php'</script>";
			$result = $conn->query($ql);
		} else {
			echo "<script>alert('This sub name is already exist');window.location='sub_cat.php'</script>";
		}
		// echo "<script>alert('This sub-category name is already exist');window.location='sub_cat.php'</script>";
	} else {
		$sql = "INSERT INTO `tbl_subcat`(`cat_id`, `subcat`) VALUES ('$cat','$sub')";
		$result = $conn->query($sql);
	}
	if ($sql) {

		echo "<script>alert('Sub-Category Details Registered Successfully!!');window.location='sub_cat.php'</script>";
	} else {
		echo "<script>alert('Error');window.location='index.php'</script>";
	}
}
?>


<?php
if (isset($_POST['submit'])) {
	$cat = $_POST['cat'];
	$s = mysqli_query($conn, "SELECT count(*) as count FROM tbl_categories WHERE category='$cat'");
	$display = mysqli_fetch_array($s);
	if ($display['count'] > 0) {
		echo "<script>alert('This category name is already exist');window.location='category.php'</script>";
	} else {
		$sql = "INSERT INTO `tbl_categories`(`category`) VALUES ('$cat')";
		$result = $conn->query($sql);
	}
	if ($sql) {

		echo "<script>alert('Category Details Registered Successfully!!');window.location='category.php'</script>";
	} else {
		echo "<script>alert('Error');window.location='index.php'</script>";
	}
}
// SELECT * FROM tbl_subcat INNER JOIN tbl_categories on tbl_subcat.cat_id=tbl_categories.cat_id WHERE tbl_categories.category='car' AND tbl_subcat.subcat='hatch back';
?>
