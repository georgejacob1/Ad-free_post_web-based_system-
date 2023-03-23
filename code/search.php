<?php
include 'db_con.php';
// exit;
$search = $_POST['search'];
// echo $search;
?>

<?php
$sql = " SELECT * FROM ((`tbl_product` INNER JOIN tbl_subcat ON tbl_product.subcat_id=tbl_subcat.sub_id) INNER JOIN tbl_categories ON tbl_categories.cat_id=tbl_subcat.cat_id) where p_name LIKE '%$search%' OR subcat LIKE '%$search%' OR category LIKE '%$search%' AND tbl_product.delete_status='1'";
$result = $conn->query($sql);
$rc = mysqli_num_rows($result);
?>
<!-- <div class="swiper featured-slider">

    <div class="swiper-wrapper"> -->
<?php
$cc = 0;
while ($vrow = mysqli_fetch_array($result)) {
    $cc++;
?>


    <div class="swiper-slide box" data-swiper-slide-index="<?= $cc ?>" style="width: 308px; margin-right: 10px;" role="group" aria-label=" <?= $cc ?>/ <?= $rc ?>">

        <div class="icons">
            <!-- <a href="#" class="fas fa-search"></a>
                            <a href="#" class="fas fa-heart"></a> -->
            <form action="proview.php" method="post">
                <input type="hidden" value="<?php echo $vrow['product_id'] ?>" name="pd">
                <button class="fas fa-eye" style="width: 300px;height:50px;font-size:30px"></button>
            </form>
        </div>

        <div class="image">
            <img src="user_profile/images/<?php echo $vrow['p_image']; ?>" alt="" style="width:250px;height:230px">
        </div>
        <div class="content">
            <h3><?php echo $vrow['p_name']; ?></h3>
            <div class="price">Rs.<?php echo $vrow['price']; ?> </div>
            <a href="login.php" class="btn">add to wishlist</a>
        </div>
    </div>
<?php
}
?>