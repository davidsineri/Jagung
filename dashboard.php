<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Sistem Pakar Bibit Jagung</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(to bottom right, #e0f7df, #baf0bb);
    min-height: 100vh;
    margin: 0;
}
.card-main {
    max-width: 950px;
    margin: 60px auto;
    background: rgba(255,255,255,0.95);
    border-radius: 18px;
    padding: 40px;
    box-shadow: 0 15px 40px rgba(0,0,0,.15);
}
.card-main h1 {
    font-weight: 700;
    text-align: center;
    margin-bottom: 10px;
}
.card-main p {
    text-align: center;
    font-size: 1.1rem;
    color: #555;
    margin-bottom: 30px;
}
.btn-menu {
    background: #28a745;
    color: #fff;
    font-weight: 600;
    border-radius: 30px;
    padding: 12px 26px;
    margin: 8px;
    text-decoration: none;
    display: inline-block;
    transition: .25s;
}
.btn-menu:hover {
    background: #218838;
    transform: translateY(-2px);
}
.btn-logout {
    background: #6c757d;
}
.btn-logout:hover {
    background: #5a6268;
}
#riwayatBox {
    display: none;
    margin-top: 30px;
}
footer {
    margin-top: 20px;
    text-align: center;
    color: #666;
}
</style>
</head>

<body>

<div class="card-main">

    <h1>🌽 Sistem Pakar Bibit Jagung</h1>
    <p>
        Selamat datang, <strong><?= htmlspecialchars($_SESSION['username']); ?></strong><br>
        Gunakan sistem ini untuk rekomendasi bibit jagung terbaik sesuai kondisi lahan Anda.
    </p>

    <!-- MENU -->
    <div class="text-center mb-4">
        <a href="diagnosa.php" class="btn-menu">🧩 Diagnosa</a>
        <a href="varietas.php" class="btn-menu">🌾 Varietas</a>
        <button onclick="toggleRiwayat()" class="btn-menu">📜 Riwayat</button>
        <a href="about.php" class="btn-menu">👥 Tentang</a>
        <a href="Petunjuk.html" class="btn-menu">📘 Petunjuk</a>
        <a href="auth/logout.php" class="btn-menu btn-logout">🔒 Logout</a>
    </div>

    <!-- RIWAYAT (HIDDEN) -->
    <div id="riwayatBox">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <strong>📜 Riwayat Diagnosa</strong>
            </div>
            <div class="card-body">
                <?php include 'riwayat.php'; ?>
            </div>
        </div>
    </div>

</div>

<footer class="mb-3">
    <small>© 2025 Sistem Pakar Bibit Jagung | Universitas Janabadra</small>
</footer>

<script>
function toggleRiwayat() {
    const box = document.getElementById('riwayatBox');
    box.style.display = (box.style.display === 'none' || box.style.display === '') 
        ? 'block' 
        : 'none';
}
</script>

</body>
</html>