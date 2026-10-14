<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SplitYuk - Patungan Jadi Gampang</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <header class="site-header">
    <h1 class="logo">SplitYuk</h1>
    <nav>
      <a href="index.php">Beranda</a>
      <a href="login.php">Mulai Patungan</a>
    </nav>
  </header>

  <section class="hero">
    <img src="assets/logo-splityuk.png" alt="Logo SplitYuk" width="80">
    <h2>Nongkrong Bareng, Bayar Adil</h2>
    <p>SplitYuk membantu kamu dan teman-teman membagi tagihan nongkrong tanpa ribet dan tanpa drama "siapa belum bayar".</p>
    <a href="login.php" class="btn-mulai">Mulai Sesi Patungan</a>
  </section>

  <?php if (isset($_SESSION["host"])) { ?>
    <p class="info-sesi">
      Kamu sedang login sebagai host: <strong><?php echo $_SESSION["host"]["nama"]; ?></strong>
      - <a href="dashboard.php">Lanjut ke Dashboard</a>
    </p>
  <?php } ?>

</body>
</html>
