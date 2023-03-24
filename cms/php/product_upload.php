<?php
$file = $_FILES['file'];

if (is_uploaded_file($file['tmp_name'])) {

    // Create a custom directory to store uploaded files
    $target_dir = "../img/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Move the file from the temporary directory to the custom directory
    $target_file = $target_dir . basename($file["name"]);
    move_uploaded_file($file["tmp_name"], $target_file);

    // Read the file content
    $file_content = file_get_contents($target_file);

    // Insert file information into the database
    $file_name = basename($target_file);
    $file_type = $file['type'];
    $file_size = $file['size'];
    $insert = $mysqli->query("INSERT into digifixx_images (product_id, file_name, uploaded_on) VALUES (".$_GET['id'].",'".$file_name."', NOW())");
    // Execute the query
    header("location:javascript://history.go(-1)");
    exit;
}