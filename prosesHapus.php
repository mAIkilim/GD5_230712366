<?php
session_start();

if (isset($_POST["hapus"])) {
  unset($_SESSION["daftarItem"][$_POST["hapus"]]);
}

header("Location: dashboard.php");
exit;
