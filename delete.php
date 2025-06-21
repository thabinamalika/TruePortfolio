<?php
include 'db_connect.php';

$id = $_GET['id'];

$query = "DELETE FROM sertifikat WHERE id=$id";

if (mysqli_query($conn, $query)) {
    header("Location: admin.php");
    exit();
} else {
    echo "Gagal menghapus sertifikat: " . mysqli_error($conn);
}
?>
