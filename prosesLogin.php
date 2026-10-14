<?php
session_start();

if (empty($_POST["namaHost"])) {
  $_SESSION["error"] = "Nama host harus diisi!";
  header("Location: login.php");
  exit;
}

$_SESSION["host"] = [
  "nama" => $_POST["namaHost"],
  "mulai_at" => date("Y-m-d H:i:s")
];

if (!isset($_SESSION["daftarItem"])) {
  $_SESSION["daftarItem"] = [];
}

header("Location: dashboard.php");
exit;
