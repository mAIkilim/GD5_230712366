<?php
session_start();

if (isset($_SESSION["host"])) {
  header("Location: dashboard.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mulai Sesi - SplitYuk</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header class="site-header">
    <div class="logo">SplitYuk</div>
    <nav><a href="index.php">Beranda</a></nav>
  </header>

  <main>
    <h1>Mulai Sesi Patungan</h1>

    <?php if (isset($_SESSION["error"])) { ?>
      <p class="error"><?php echo $_SESSION["error"]; unset($_SESSION["error"]); ?></p>
    <?php } ?>

    <form action="prosesLogin.php" method="post">
      <p>
        <label>Nama Kamu (sebagai host):</label><br>
        <input type="text" name="namaHost" placeholder="Misal: Dika" required>
      </p>
      <button type="submit">Mulai Sesi</button>
    </form>

    <p><a href="index.php">Kembali ke Beranda</a></p>
  </main>
</body>
</html>
