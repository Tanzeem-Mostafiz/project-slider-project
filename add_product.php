<?php
include 'db_config.php';

if (empty($_POST['product_name']) || empty($_POST['category']) || empty($_POST['manufacturing_date']) || empty($_POST['image_url'])) {
    echo "<script>alert('All fields are required!'); window.history.back();</script>";
    exit;
}

$product_name = $_POST['product_name'];
$category = $_POST['category'];
$manufacturing_date = $_POST['manufacturing_date'];
$image_url = $_POST['image_url'];

// Validate date
$currentDate = date("Y-m-d");
if ($manufacturing_date > $currentDate) {
    echo "<script>alert('Invalid date!'); window.history.back();</script>";
    exit;
}

// Download image from URL
$image = basename($image_url);
$image_path = "images/" . $image;
file_put_contents($image_path, file_get_contents($image_url));

// Insert into database
$sql = "INSERT INTO Products (product_name, category, manufacturing_date, image)
        VALUES ('$product_name', '$category', '$manufacturing_date', '$image')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Product added successfully!'); window.history.back();</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
