<?php

include '../db_con.php';
$query = "SELECT a.p_name AS PRODUCT_NAME, b.email AS USER_ID,c.user_fname AS FIRST_NAME,c.user_lname AS LAST_NAME ,d.trans_id AS TRANSCTION_ID,d.transcation_date AS TRANSCTION_DATE,d.amount AS AMOUNT from tbl_product a INNER JOIN tbl_login b INNER JOIN tbl_users c INNER JOIN tbl_payment d ON a.login_id=b.login_id and c.login_id=b.login_id and a.login_id=d.login_id Where a.delete_status='1' AND a.paymet_id!='0' And a.paymet_id=d.pay_id";
$result = mysqli_query($conn, $query) or die("database error:" . mysqli_error($conn));
$records = array();
while ($rows = mysqli_fetch_assoc($result)) {
    $records[] = $rows;
}
if (isset($_POST["export_csv_data"])) {
    $csv_file = "phpzag_csv_export_" . date('Ymd') . ".csv";
    header("Content-Type: text/csv");
    header("Content-Disposition: attachment; filename=\"$csv_file\"");
    $fh = fopen('php://output', 'w');
    $is_coloumn = true;
    if (!empty($records)) {
        foreach ($records as $record) {
            if ($is_coloumn) {
                fputcsv($fh, array_keys($record));
                $is_coloumn = false;
            }
            fputcsv($fh, array_values($record));
        }
        fclose($fh);
    }
    exit;
}
