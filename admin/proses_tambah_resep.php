<?php
session_start();

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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../db/koneksi.php';

    $id_category = $_POST['category'];
    $id_difficulty = $_POST['difficulty'];
    $foto = $_FILES['foto']['name'];
    $durasi = $_POST['durasi'];
    $nama_makanan = $_POST['nama_makanan'];
    $deskripsi = $_POST['deskripsi'];
    $resep = $_POST['resep'];

    // Debugging: Check the values received from the form
    error_log("Received values - category: $id_category, difficulty: $id_difficulty, foto: $foto, Durasi: $durasi, nama_makanan: $nama_makanan, deskripsi: $deskripsi, resep: $resep");

    $valid = true;

    // Check id_category
    $query = "SELECT COUNT(*) AS count FROM category WHERE id_category = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id_category);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    if ($row['count'] == 0) {
        $valid = false;
        error_log("Invalid category ID: $id_category");
        echo "<script>alert('category tidak valid'); window.location.href='tambah_details.php';</script>";
    }

    // Check id_difficulty
    $query = "SELECT COUNT(*) AS count FROM difficulty WHERE id_difficulty = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id_difficulty);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    if ($row['count'] == 0) {
        $valid = false;
        error_log("Invalid difficulty ID: $id_difficulty");
        echo "<script>alert('difficulty tidak valid'); window.location.href='tambah_details.php';</script>";
    }


    // Check if nama_makanan is empty or has a value of 0
    if (empty($nama_makanan) || $nama_makanan == '0') {
        $valid = false;
        error_log("Nama makanan tidak valid: $nama_makanan");
        echo "<script>alert('Nama makanan tidak valid'); window.location.href='tambah_details.php';</script>";
    }

    // Tentukan folder tujuan untuk menyimpan file
    $target_dir = "../uploads/"; // Nama folder tempat Anda ingin menyimpan file
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Cek apakah file gambar atau bukan
    $check = getimagesize($_FILES["foto"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Cek apakah file sudah ada
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Cek ukuran file
    if ($_FILES["foto"]["size"] > 50000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    $allowed_extensions = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowed_extensions)) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Cek jika uploadOk = 0
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // jika berhasil, upload file
    } else {
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["foto"]["name"])) . " has been uploaded.";

            // Strip format-format Markdown dari teks resep
            $deskripsi = stripMarkdown($deskripsi);
            $resep = stripMarkdown($resep);

            // Insert data if all foreign key values are valid
            if ($valid) {
                $sql = "INSERT INTO details (id_category, id_difficulty, foto, durasi, nama_makanan, deskripsi, resep) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("iisisss", $id_category, $id_difficulty, $foto, $durasi, $nama_makanan, $deskripsi, $resep);
                if ($stmt->execute()) {
                    echo "<script>alert('resep berhasil ditambahkan'); window.location.href='admin.php';</script>";
                } else {
                    error_log("Database Error: " . $stmt->error);
                    echo "<script>alert('Gagal menambahkan resep'); window.location.href='tambah_details.php';</script>";
                }
                $stmt->close();
            }

        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $conn->close();
}
?>
