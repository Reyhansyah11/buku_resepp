<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_id'])) {
    include '../db/koneksi.php';

    // Tangkap id yang akan dihapus
    $delete_id = $_POST['delete_id'];

    // Query untuk menghapus data berdasarkan id
    $query = "DELETE FROM details WHERE id_details = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $delete_id);

    // Eksekusi query
    if ($stmt->execute()) {
        // Jika penghapusan berhasil
        echo "<script>alert('Data berhasil dihapus'); window.location.href='admin.php';</script>";
    } else {
        // Jika terjadi kesalahan
        error_log("Database Error: " . $stmt->error);
        echo "<script>alert('Gagal menghapus data'); window.location.href='admin.php';</script>";
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
} else {
    // Redirect jika tidak ada data yang dihapus
    header("Location: admin.php");
    exit();
}
?>
