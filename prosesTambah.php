<?php

session_start();

if (!isset($_SESSION["host"])) {
  header("Location: login.php");
  exit;
}

if (!isset($_SESSION["daftarItem"])) {
  $_SESSION["daftarItem"] = [];
}

$folderTujuan = __DIR__ . "/uploads/";
$namaFileBukti = "";

if (
  isset($_FILES["buktiStruk"]) &&
  $_FILES["buktiStruk"]["error"] !== UPLOAD_ERR_NO_FILE
) {
  $file = $_FILES["buktiStruk"];

  if ($file["error"] !== UPLOAD_ERR_OK) {
    die("Upload struk gagal. Kode error: " . $file["error"]);
  }

  if (!is_dir($folderTujuan)) {
    if (!mkdir($folderTujuan, 0755, true)) {
      die("Folder uploads gagal dibuat.");
    }
  }

  $tipeFile = mime_content_type($file["tmp_name"]);

  $ekstensiDiizinkan = [
    "image/jpeg" => "jpg",
    "image/png" => "png"
  ];

  if (!isset($ekstensiDiizinkan[$tipeFile])) {
    die("Format file harus JPG atau PNG.");
  }

  $namaFile = bin2hex(random_bytes(8)) . "." .
    $ekstensiDiizinkan[$tipeFile];

  $lokasiTujuan = $folderTujuan . $namaFile;

  if (!move_uploaded_file($file["tmp_name"], $lokasiTujuan)) {
    die("Gagal menyimpan foto struk.");
  }

  $namaFileBukti = "uploads/" . $namaFile;
}

$itemBaru = [
  "nama" => $_POST["nama"],
  "harga" => $_POST["harga"],
  "jumlahOrang" => $_POST["jumlahOrang"],
  "status" => $_POST["status"],
  "bukti" => $namaFileBukti,
];

array_push($_SESSION["daftarItem"], $itemBaru);

header("Location: dashboard.php");
exit;
