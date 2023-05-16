<?php
// Connect to the database
include 'db_con.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_GET['term'])) {

    // Get the search term from the user input
    $searchTerm = $_GET['term'];


    // Escape special characters in search term to prevent SQL injection
    $searchTerm = mysqli_real_escape_string($conn, $searchTerm);

    // Query the database for matching results
    $sql = "SELECT  tbl_product.*, tbl_subcat.subcat, tbl_categories.category 
        FROM tbl_product 
        INNER JOIN tbl_subcat ON tbl_product.subcat_id = tbl_subcat.sub_id 
        INNER JOIN tbl_categories ON tbl_subcat.cat_id = tbl_categories.cat_id 
        WHERE tbl_product.delete_status = 1 
        AND (tbl_product.p_name LIKE '%$searchTerm%' 
             OR tbl_subcat.subcat LIKE '%$searchTerm%' 
             OR tbl_categories.category LIKE '%$searchTerm%') 
        LIMIT 3";

    $result = $conn->query($sql);

    // Fetch the results and store them in an array
    $matches = array();
    while ($row = $result->fetch_assoc()) {
        $matches[] = $row['category'];
        $matches[] = $row['p_name'];
        // $matches[] = $row['subcat'];

    }

    // Convert the array to a JSON object and return it to the client
    echo json_encode($matches);
}

if (isset($_GET['lterm'])) {
    $lsearchTerm = $_GET['lterm'];
    $lsearchTerm = mysqli_real_escape_string($conn, $lsearchTerm);

    $sql2 = "SELECT distinct `street`,`city`,`state` FROM tbl_address WHERE `street` LIKE '%$lsearchTerm%' OR `city` LIKE '%$lsearchTerm%' OR `state` LIKE '%$lsearchTerm%' ";





    $lresult = $conn->query($sql2);

    // Fetch the results and store them in an array
    $lmatches = array();
    while ($row1 = $lresult->fetch_assoc()) {
        $lmatches[] = $row1['street'];
        // $lmatches[] = $row1['p_name'];
        // $matches[] = $row['subcat'];

    }

    // Convert the array to a JSON object and return it to the client
    echo json_encode($lmatches);
}
