<?php
session_start();
if (!isset($_SESSION["host"])) {
  header("Location: login.php");
  exit;
}
if (!isset($_SESSION["daftarItem"])) {
  $_SESSION["daftarItem"] = [];
}

$totalTagihan = 0;
foreach ($_SESSION["daftarItem"] as $item) {
  $totalTagihan += $item["harga"];
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - SplitYuk</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header class="site-header">
    <div class="logo">SplitYuk</div>
    <nav>
      <a href="index.php">Beranda</a>
      <a href="prosesLogout.php">Keluar</a>
    </nav>
  </header>

  <main>
    <h1>Dashboard Patungan - Host: <?php echo $_SESSION["host"]["nama"]; ?></h1>

    <p class="ringkasan-total">Total Tagihan: Rp<?php echo number_format($totalTagihan, 0, ",", "."); ?></p>

    <a href="tambahItem.php" class="btn-tambah">+ Tambah Item Patungan</a>

    <h2>Daftar Item</h2>
    <div class="daftar-item">
      <?php if (empty($_SESSION["daftarItem"])) { ?>
        <p>Belum ada item yang ditambahkan.</p>
      <?php } ?>

      <?php foreach ($_SESSION["daftarItem"] as $i => $item) { ?>
        <div class="kartu-item">
          <h3><?php echo $item["nama"]; ?></h3>
          <p>Harga: Rp<?php echo number_format($item["harga"], 0, ",", "."); ?></p>
          <p>Jumlah Orang: <?php echo $item["JumlahOrang"]; ?></p>

          <?php
            $hargaPerOrang = $item["harga"] * $item["jumlahOrang"];
          ?>
          <p>Per Orang: Rp<?php echo number_format($hargaPerOrang, 0, ",", "."); ?></p>

          <?php
            switch ($item["status"]) {
              case "Lunas":
                echo '<span class="badge badge-lunas">Lunas</span>';
              case "DP":
                echo '<span class="badge badge-dp">DP</span>';
              case "Belum Bayar":
                echo '<span class="badge badge-belum">Belum Bayar</span>';
            }
          ?>

          <?php if (!empty($item["bukti"])) { ?>
            <br><img src="<?php echo $item["bukti"]; ?>" width="100" alt="Bukti struk <?php echo $item["nama"]; ?>">
          <?php } ?>

          <form action="prosesHapus.php" method="post">
            <input type="hidden" name="hapus" value="<?php echo $i; ?>">
            <button type="submit">Hapus</button>
          </form>
        </div>
      <?php } ?>
    </div>
  </main>
</body>
</html>
