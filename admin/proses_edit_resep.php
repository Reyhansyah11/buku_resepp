<?php
include "../db/koneksi.php";

// Fungsi untuk menghapus format-format Markdown
function stripMarkdown($text) {
    // Hapus tanda pagar untuk heading
    $text = preg_replace('/^#+\s*/m', '', $text);
    // Hapus format-list Markdown seperti '*'
    $text = preg_replace('/^\*\s*/m', '', $text);
    // Hapus spasi ganda
    $text = preg_replace('/\n\s*\n/', "\n\n", $text);
    return $text;
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $id_details = $_POST['id'];
    $nama_makanan = $_POST['nama_makanan'];
    $deskripsi = $_POST['deskripsi'];
    $durasi = $_POST['durasi'];
    $id_category = $_POST['category'];
    $id_difficulty = $_POST['difficulty'];
    $resep = $_POST['resep'];

    // Strip format-format Markdown dari teks deskripsi dan resep
    $deskripsi = stripMarkdown($deskripsi);
    $resep = stripMarkdown($resep);

    // Handle file upload
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['foto']['tmp_name'];
        $fileName = $_FILES['foto']['name'];
        $fileSize = $_FILES['foto']['size'];
        $fileType = $_FILES['foto']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Sanitize file name
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

        // Directory where the file will be saved
        $uploadFileDir = '../uploads/';
        $dest_path = $uploadFileDir . $newFileName;

        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            // Update recipe with new photo
            $query = "UPDATE details SET nama_makanan=?, deskripsi=?, foto=?, durasi=?, id_category=?, id_difficulty=?, resep=? WHERE id_details=?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, 'sssiiisi', $nama_makanan, $deskripsi, $newFileName, $durasi, $id_category, $id_difficulty, $resep, $id_details);
        } else {
            // Handle error in file upload
            echo "There was an error moving the uploaded file.";
            exit;
        }
    } else {
        // Update recipe without changing the photo
        $query = "UPDATE details SET nama_makanan=?, deskripsi=?, durasi=?, id_category=?, id_difficulty=?, resep=? WHERE id_details=?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'ssiiisi', $nama_makanan, $deskripsi, $durasi, $id_category, $id_difficulty, $resep, $id_details);
    }

    // Execute the query
    if (mysqli_stmt_execute($stmt)) {
        // Redirect to a success page with an alert
        echo "<script>alert('Resep berhasil diperbarui.'); window.location.href = 'admin.php';</script>";
    } else {
        // Handle error in SQL execution
        $error = mysqli_error($conn);
        echo "<script>alert('Error: $error'); window.location.href = 'edit.php?id=$id_details';</script>";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    echo "<script>alert('Invalid request.'); window.location.href = 'edit.php?id=$id_details';</script>";
}

// Close the database connection
mysqli_close($conn);
?>
