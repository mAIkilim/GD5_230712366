<?php
session_start();
if (!isset($_SESSION["host"])) {
  header("Location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Item - SplitYuk</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header class="site-header">
    <div class="logo">SplitYuk</div>
    <nav>
      <a href="dashboard.php">Dashboard</a>
      <a href="prosesLogout.php">Keluar</a>
    </nav>
  </header>

  <main>
    <img src="assets/icon-split.png" alt="" width="40">
    <h1>Tambah Item Patungan</h1>
    <p><a href="dashboard.php">Kembali ke Dashboard</a></p>

    <form action="prosesTambah.php" method="post" enctype="multipart/form-data">
      <p>
        <label>Nama Item:</label><br>
        <input type="text" name="nama" id="namaItem" required>
      </p>
      <p>
        <label>Harga (Rp):</label><br>
        <input type="number" name="harga" id="hargaItem" required>
      </p>
      <p>
        <label>Jumlah Orang Patungan:</label><br>
        <input type="number" name="jumlahOrang" id="jumlahOrangItem" min="1" required>
      </p>
      <p>
        <button type="button" onclick="hitungSplit()">Hitung Otomatis</button>
      </p>
      <p id="hasilHitung"></p>

      <p>
        <label>Status Pembayaran:</label><br>
        <select name="status" required>
          <option value="Belum Bayar">Belum Bayar</option>
          <option value="DP">DP</option>
          <option value="Lunas">Lunas</option>
        </select>
      </p>
      <p>
        <label>Bukti Struk (opsional):</label><br>
        <input type="file" name="buktiStruk" accept=".jpg,.jpeg,.png">
      </p>
      <button type="submit">Simpan Item</button>
    </form>
  </main>

  <script>
    function hitungPerOrang() {
      const harga = document.getElementById("hargaItem").value;
      const jumlahOrang = document.getElementById("jumlahOrangItem").value;
      const perOrang = harga / jumlahOrang;
      document.getElementById("hasilSplit").innerText = "Per orang: Rp" + perOrang;
    }
  </script>
</body>
</html>
