<?php
include 'db_connect.php';

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $image = mysqli_real_escape_string($conn, $_POST['image']);

    $query = "UPDATE sertifikat SET description='$description', image='$image' WHERE id=$id";

    if (mysqli_query($conn, $query)) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Gagal mengedit sertifikat: " . mysqli_error($conn);
    }
}

$result = mysqli_query($conn, "SELECT * FROM sertifikat WHERE id=$id");
$data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Sertifikat</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="admin-container">
        <h2>Edit Sertifikat</h2>
        <form method="POST">
            <input type="text" name="description" value="<?= htmlspecialchars($data['description']) ?>" required>
            <input type="text" name="image" value="<?= htmlspecialchars($data['image']) ?>" required>
            <button type="submit">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>
