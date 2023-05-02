<?php

if(isset($_FILES['image'])) {
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_name_parts = explode('.', $_FILES['image']['name']);
    $file_ext = strtolower(end($file_name_parts));
    $extensions = array("jpeg","jpg","png");
    
    if(in_array($file_ext, $extensions) === false) {
        echo "Error: File type not allowed, please choose a JPEG or PNG file.";
        exit();
    }
    
    if($file_size > 2097152) {
        echo "Error: File size must be less than 2 MB.";
        exit();
    }
    
    $cfile = curl_file_create($file_tmp, $file_type, $file_name);
    $post_data = array('image' => $cfile);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://localhost:5000/predict');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    echo $response;
}
else {
    echo "Error: No image file selected.";
}
