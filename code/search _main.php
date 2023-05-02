<?php
include 'db_con.php';
include 'session.php';
// exit;
$search = $_POST['search'];
// echo $search;
?>

<?php
$sql = " SELECT * FROM ((`tbl_product` INNER JOIN tbl_subcat ON tbl_product.subcat_id=tbl_subcat.sub_id) INNER JOIN tbl_categories ON tbl_categories.cat_id=tbl_subcat.cat_id) where p_name LIKE '%$search%' OR subcat LIKE '%$search%' OR category LIKE '%$search%' AND tbl_product.delete_status='1'";
$result = $conn->query($sql);
$rc = mysqli_num_rows($result);
if ($rc != 0) {
    while ($vrow = mysqli_fetch_array($result)) {

?>



        <li class="product">
            <a href="proview.php?pd=<?php echo $vrow['product_id'] ?>" name="pd">
                <?php
                $subcat_id = $vrow['subcat_id'];
                $sql = "SELECT tbl_categories.category FROM tbl_categories INNER JOIN tbl_subcat ON tbl_subcat.cat_id=tbl_categories.cat_id INNER JOIN tbl_product ON tbl_product.subcat_id=tbl_subcat.sub_id WHERE tbl_product.subcat_id='$subcat_id'";
                $res = mysqli_query($conn, $sql);
                $sales = mysqli_fetch_array($res);
                $sales_name = $sales['category'];
                ?>
                <span class="onsale"><?php echo $sales_name; ?></span>
                <img src="user_profile/images/<?php echo $vrow['p_image']; ?>" alt="" style="width:290px;height:230px" />
                <h3><?php echo $vrow['p_name']; ?></h3>
                <span class="price">
                    <!-- <del> <span class="amount">399.000 ₫</span> </del> -->
                    <ins> <span class="amount">Rs.<?php echo $vrow['price']; ?></span> </ins><br>
                    <!-- <ins> <span class="amount"> Contact info:- <?php echo $vrow['user_phone']; ?></span> </ins> -->
                    <!-- <span class="sale-tag sale-tag-square">-33%</span> -->
                </span>
            </a>

            <!-- <a href="login.php" style="margin-left: 260px"><i class="fa-solid fa-heart fa-beat fa-2xl"></i>
                            </a> -->
            <form method="post" action="">

                <input type="hidden" value="<?php echo $vrow['product_id'] ?>" name="pd">
                <?php
                $pid = $vrow['product_id'];
                $sql11 = "select * from tbl_cart where pid='$pid' and username='$email'";
                $run11 = mysqli_query($conn, $sql11);
                $w = mysqli_num_rows($run11);
                if ($w == 0) { ?>
                    <button style="width: 40px;height:1px;color:#fff;margin-left: 240px;background-color: #fff" class=" aaa addto" type="submit" value="<?php echo $vrow['product_id']; ?>"> <i class="far fa-heart fa-lg" style="color: #2a2828;"></i></button>
                <?php } else { ?>
                    <button style="width: 40px;height:1px;color:#fff;margin-left: 240px;background-color: #fff" class=" aaa viewwish" type="submit" value="<?php echo $vrow['product_id']; ?>"> <i class="fas fa-heart fa-lg" style="color: #e64141;"></i></button>
                <?php  } ?>
            </form>

            <!-- <a href="tttt" class="btnn btnn-dark btnn-circle btnn-review" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="fa-solid fa-heart fa-beat fa-2xl"></i></a> -->
        </li>

    <?php
    }
} else { ?>
    <img src="image/img.gif" style="width:2000px;">


<?php  }


?>
<script>
    $(document).on('click', '.addto', function(e) {
        e.preventDefault();

        var prod_id = $(this).val();
        $.ajax({
            type: "POST",
            url: "viewsql.php",
            data: {
                'addtosubmit': true,
                'prod_id': prod_id
            },
            success: function(response) {
                $('.product').load('.product');
                // window.location.reload();
                // alert(response);

            }
        });

    });
    $(document).on('click', '.viewwish', function(e) {
        e.preventDefault();

        var prod_id = $(this).val();
        // alert(prod_id);
        $.ajax({
            type: "POST",
            url: "viewsql.php",
            data: {

                'deleproduct': true,
                'prod_id': prod_id
            },
            success: function(response) {
                $('.product').load(' .product');
                // window.location.reload();
                // alert(response);

            }
        });

    });
</script>