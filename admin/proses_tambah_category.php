<?php
session_start();

include '../db/koneksi.php';

$tipe = $_POST['tipe'];

$sql = "INSERT INTO category (tipe) VALUES ('$tipe')";

$result = $conn->query($sql);

if ($result) {
    echo "<script>alert('Data berhasil ditambahkan'); window.location.href='admin.php';</script>";
} else {
    echo "<script>alert('Data gagal ditambahkan'); window.location.href='admin.php';</script>";
}
