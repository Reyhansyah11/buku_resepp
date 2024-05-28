<?php
session_start();

include '../db/koneksi.php';

$level = $_POST['level'];

$sql = "INSERT INTO difficulty (level) VALUES ('$level')";

$result = $conn->query($sql);

if ($result) {
    echo "<script>alert('Data berhasil ditambahkan'); window.location.href='admin.php';</script>";
} else {
    echo "<script>alert('Data gagal ditambahkan'); window.location.href='admin.php';</script>";
}
