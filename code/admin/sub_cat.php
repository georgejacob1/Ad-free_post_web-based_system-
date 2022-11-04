<?php
include '../db_con.php';
if(isset($_POST['submit'])){
    $sub=$_POST['sub'];
    $cat=$_POST['sub-cat'];
    $sql="INSERT INTO `tbl_subcat`(`cat_id`, `subcat`) VALUES ('$cat','$sub')";
    $result=$conn->query($sql);
}
?>
<html>
    <head><title>categoirs</title></head>
<body>
    <form action="" method="POST">
        <input type="text" name="sub" placeholder="sub-category">
        <select id="cat" name="sub-cat">
            <?php
            $s="SELECT * FROM `tbl_categories`";
            $r=$conn->query($s);
            if($r->num_rows > 0){
                while($row=$r->fetch_assoc()){
                    ?>
                    <option value="<?php echo $row['cat_id'];?>"><?php echo $row['category']; ?></option>

                    <?php
                }
            } ?>
            </select>
        <input type="submit" name="submit" value="sumbit">
    </form>
</body>
</html>