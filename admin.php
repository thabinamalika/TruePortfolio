<?php
include 'db_connect.php';

// Ambil data sertifikat
$result = mysqli_query($conn, "SELECT * FROM sertifikat");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
    }
    .admin-container {
      max-width: 800px;
      margin: auto;
    }
    h1 {
      text-align: center;
    }
    form {
      margin-bottom: 30px;
    }
    input[type="text"], input[type="file"] {
      padding: 10px;
      width: 100%;
      margin-bottom: 10px;
    }
    button {
      padding: 10px 20px;
      background: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th, td {
      padding: 12px;
      border: 1px solid #ccc;
      text-align: center;
    }
    img {
      max-width: 100px;
    }
  </style>
</head>
<body>
  <div class="admin-container">
    <h1>Dashboard Admin - Sertifikat</h1>
    
    <form action="process.php" method="POST" enctype="multipart/form-data">
      <input type="text" name="description" placeholder="Deskripsi Sertifikat" required>
      <input type="file" name="image" accept="image/*" required>
      <button type="submit">Tambah Sertifikat</button>
    </form>

    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Gambar</th>
          <th>Deskripsi</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; while ($row = mysqli_fetch_assoc($result)) : ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><img src="uploads/<?= htmlspecialchars($row['image']) ?>" alt="sertifikat"></td>
            <td><?= htmlspecialchars($row['description']) ?></td>
            <td>
              <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
              <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
