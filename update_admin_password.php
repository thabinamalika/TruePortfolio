<?php
include 'db_connect.php';

$username = 'admin'; // Ganti jika username Anda berbeda
$new_password = 'malik123'; // Password baru
$hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

$query = "UPDATE admins SET password = ? WHERE username = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'ss', $hashed_password, $username);

if (mysqli_stmt_execute($stmt)) {
    echo "Password untuk admin '$username' berhasil diperbarui!";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>