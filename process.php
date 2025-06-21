<?php
include 'db_connect.php';

$description = $_POST['description'];
$target_dir = "uploads/";

$target_file = $target_dir . basename($_FILES["image"]["name"]);
$image_name = basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$uploadOk = 1;
$allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

// Validasi ekstensi
if (!in_array($imageFileType, $allowedTypes)) {
    echo "Hanya file JPG, JPEG, PNG, dan GIF yang diperbolehkan.";
    $uploadOk = 0;
}

// Cek jika upload ok
if ($uploadOk && move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    $stmt = $conn->prepare("INSERT INTO sertifikat (image, description) VALUES (?, ?)");
    $stmt->bind_param("ss", $image_name, $description);
    $stmt->execute();
    $stmt->close();
    header("Location: admin.php");
} else {
    echo "Upload gagal.";
}
?>
