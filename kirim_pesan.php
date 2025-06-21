<?php
include 'db_connect.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$pesan = $_POST['pesan'];

$stmt = $conn->prepare("INSERT INTO contact (nama, email, pesan) VALUES (?, ?, ?)");
if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("sss", $nama, $email, $pesan);

if ($stmt->execute()) {
    echo "<script>alert('Pesan berhasil dikirim!'); window.location.href = 'index.php#kontak';</script>";
} else {
    echo "Gagal mengirim pesan: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
