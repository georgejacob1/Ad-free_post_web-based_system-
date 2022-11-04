<?php
	include '../db_con.php';
	$category_id=$_POST["cid"];
	$result = mysqli_query($conn,"SELECT * FROM tbl_subcat where cat_id='$category_id'");
?>
<option value="">Select SubCategory</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
	<option value="<?php echo $row["sub_id"];?>"><?php echo $row["subcat"];?></option>
<?php
}
?>