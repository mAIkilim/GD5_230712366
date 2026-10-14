<?php
if (!isset($_SESSION["host"])) {
  header("Location: login.php");
  exit;
}

if (!isset($_SESSION["daftarItem"])) {
  $_SESSION["daftarItem"] = [];
}

$folderTujuan = "uploads/";
$namaFileBukti = "";

if (isset($_FILES["bukti"]) && $_FILES["bukti"]["name"] != "") {
  $namaFileBukti = $folderTujuan . basename($_FILES["bukti"]["name"]);
  move_uploaded_file($_FILES["bukti"]["tmp_name"], $namaFileBukti);
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
