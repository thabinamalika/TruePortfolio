<?php
include 'db_connect.php';

// Ambil data sertifikat
$sertifikat = mysqli_query($conn, "SELECT * FROM sertifikat ORDER BY id DESC");

// Cek jika query gagal
if (!$sertifikat) {
    die("Query error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portfolio Malika Thabina</title>
    <link rel="stylesheet" href="styles.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">Portfolio Malika</div>
        <ul class="nav-links">
            <li><a href="#beranda">Beranda</a></li>
            <li><a href="#tentang">Tentang Saya</a></li>
            <li><a href="#keterampilan">Keterampilan</a></li>
            <li><a href="#portofolio">Portofolio</a></li>
            <li><a href="#sertifikat">Sertifikat</a></li>
            <li><a href="#kontak">Kontak</a></li>
        </ul>
    </nav>

    <!-- Beranda -->
    <section id="beranda" class="section beranda">
        <div class="beranda-content">
            <h1>Halo, Saya Malika Thabina Hidayat</h1>
            <p>Pengembang Web Kreatif dengan Semangat untuk Desain</p>
            <a href="#tentang" class="btn">Pelajari Lebih Lanjut</a>
        </div>
    </section>

    <!-- Tentang Saya -->
    <section id="tentang" class="section tentang">
        <h2>Tentang Saya</h2>
        <div class="tentang-content">
            <img src="thabina.jpg" alt="Foto Profil" class="profile-img" />
            <p>
                Hai! Saya Malika Thabina Hidayat, siswi kelas X jurusan Pengembangan Perangkat Lunak dan Gim di SMKN 1
                Ciomas. Saya senang mengembangkan website yang menarik dan fungsional, dengan sentuhan desain dan
                kreativitas. Di luar coding, saya suka menggambar, eksplorasi kafe baru, dan berolahraga.
            </p>
        </div>
    </section>

    <!-- Keterampilan -->
    <section id="keterampilan" class="section keterampilan">
        <h2>Keterampilan Saya</h2>
        <div class="keterampilan-grid">
            <div class="keterampilan-card">
                <h3>HTML & CSS</h3>
                <div class="progress-bar">
                    <div class="progress" style="width: 90%;"></div>
                </div>
            </div>
            <div class="keterampilan-card">
                <h3>JavaScript</h3>
                <div class="progress-bar">
                    <div class="progress" style="width: 80%;"></div>
                </div>
            </div>
            <div class="keterampilan-card">
                <h3>GitHub</h3>
                <div class="progress-bar">
                    <div class="progress" style="width: 75%;"></div>
                </div>
            </div>
            <div class="keterampilan-card">
                <h3>Canva</h3>
                <div class="progress-bar">
                    <div class="progress" style="width: 95%;"></div>
                </div>
            </div>
            <div class="keterampilan-card">
                <h3>Figma</h3>
                <div class="progress-bar">
                    <div class="progress" style="width: 85%;"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sertifikat -->
    <section id="sertifikat" class="section sertifikat">
        <h2>Sertifikat Saya</h2>
        <div class="sertifikat-gallery">
            <?php if (mysqli_num_rows($sertifikat) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($sertifikat)): ?>
                    <div class="sertifikat-item">
                        <img src="uploads/<?= htmlspecialchars($row['image']) ?>" alt="Sertifikat" class="sertifikat-img" />
                        <p><?= htmlspecialchars($row['description']) ?></p>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>Belum ada sertifikat yang ditambahkan.</p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Kontak -->
    <section id="kontak" class="section kontak">
        <h2>Hubungi Saya</h2>
        <form id="kontak-form" action="kirim_pesan.php" method="POST">
            <input type="text" name="nama" placeholder="Nama Anda" required />
            <input type="email" name="email" placeholder="Email Anda" required />
            <textarea name="pesan" placeholder="Pesan Anda" required></textarea>
            <button type="submit" class="btn">Kirim Pesan</button>
        </form>
    </section>

    <!-- Footer -->
     <!-- Tombol Login Admin -->
<div style="text-align: center; margin-top: 30px;">
  <button onclick="toggleLoginForm()" style="background-color: transparent; border: none; color: #666; cursor: pointer; font-size: 0.9rem;">
    Login Admin 🔐
  </button>

  <!-- Form Login Admin Tersembunyi -->
  <form id="adminLoginForm" action="auth.php" method="POST" style="display: none; margin-top: 10px;">
    <input type="text" name="username" placeholder="Username" required style="padding: 5px; margin: 5px;">
    <input type="password" name="password" placeholder="Password" required style="padding: 5px; margin: 5px;">
    <button type="submit" style="padding: 5px 10px;">Login</button>
  </form>
</div>

<!-- Script Toggle Login Admin -->
<script>
  function toggleLoginForm() {
    const form = document.getElementById('adminLoginForm');
    form.style.display = (form.style.display === 'none') ? 'block' : 'none';
  }
</script>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-brand">
                <p>Mewujudkan ide dengan kode dan kreativitas.</p>
            </div>
            <div class="footer-links">
                <h4>Navigasi</h4>
                <ul>
                    <li><a href="#beranda">Beranda</a></li>
                    <li><a href="#tentang">Tentang</a></li>
                    <li><a href="#keterampilan">Keterampilan</a></li>
                    <li><a href="#portofolio">Portofolio</a></li>
                    <li><a href="#sertifikat">Sertifikat</a></li>
                    <li><a href="#kontak">Kontak</a></li>
                </ul>
            </div>
            <div class="footer-social">
                <h4>Terhubung</h4>
                <div class="social-links">
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-github"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2025 Malika Thabina Hidayat. Dibuat dengan <span class="heart">♥</span>.</p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>

</html>