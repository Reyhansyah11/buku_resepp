<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'resep';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi Error: " . $conn->connect_error);
}
