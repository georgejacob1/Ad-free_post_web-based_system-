




<?php
include 'db_con.php';

  if (isset($_POST['query'])) {
    $search = $_POST['query'];
    $sql = " SELECT * FROM ((`tbl_product` INNER JOIN tbl_subcat ON tbl_product.subcat_id=tbl_subcat.sub_id) INNER JOIN tbl_categories ON tbl_categories.cat_id=tbl_subcat.cat_id) where p_name LIKE '%$search%' OR subcat LIKE '%$search%' OR category LIKE '%$search%' AND tbl_product.delete_status='1'";
    $stmt = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($stmt);

    if ($result) {
      foreach ($result as $row) {
        echo '<a href="#" class="list-group-item list-group-item-action border-1">' . $row['p_name'] . '</a>';
      }
    } else {
      echo '<p class="list-group-item border-1">No Record</p>';
    }
  }
?>