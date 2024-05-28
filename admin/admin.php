<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resep Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<style>
.light-70{
            color: #ffffff;
            font-weight: 600;
            backdrop-filter: blur(5px); /* Efek blur pada teks */
            transition: backdrop-filter 0.3s ease; /* Transisi mulus */
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5); /* Efek shadow untuk menyamarkan batas blur */
            border-radius: 10px; /* Membuat blur menjadi lebih bulat */
            display: inline-block; /* Mengubah display menjadi inline-block */
            padding: 5px;
        }

    /* CSS untuk tombol logout */
#logout {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    text-align: center;
    padding: 10px;
    margin-bottom: 30px;
}

    .logo {
        border-bottom: 1.5px solid black;
        margin-top: 10px;
        margin-bottom: -10px;
    }

    .bg {
        background: url('../assets/unsplash_usfIE5Yc7PY.jpg');
        background-size: cover;
    }

    th {
        font-size: 12px;
        text-align: center;
    }

    .nav-pills {
        margin-top: 20px;
    }

    .img-thumbnail {
        width: 50px; /* Sesuaikan dengan ukuran yang diinginkan */
        height: auto; /* Biarkan tinggi otomatis agar proporsi gambar tetap terjaga */
    }

    /* Hide full description by default */
    .full-description {
        display: none;
    }

    .search-box{
        margin-bottom: 50px;
    }

</style>

<body>

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto bg col-md-3 col-xl-2 px-sm-2 px-0">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 min-vh-100">
                    <a href="/" class="d-flex align-items-center mb-md-0 me-md-auto text-white text-decoration-none logo text-dark">
                        <span class="fs-5 d-none d-sm-inline">Menu</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li>
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle text-dark light-70">
                                <i class="fas fa-tachometer-alt"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="tambah_details.php" class="nav-link px-0 align-middle text-dark light-70">
                                <i class="fas fa-plus"></i> <span class="ms-1 d-none d-sm-inline">Tambah Resep</span>
                            </a>
                        </li>
                        <li>
                            <a href="tambah_category.php" class="nav-link px-0 align-middle text-dark light-70">
                                <i class="fas fa-tags"></i> <span class="ms-1 d-none d-sm-inline">Kategori</span>
                            </a>
                        </li>
                        <li>
                            <a href="tambah_difficulty.php" class="nav-link px-0 align-middle text-dark light-70">
                                <i class="fas fa-signal"></i> <span class="ms-1 d-none d-sm-inline">Tingkat Kesulitan</span>
                            </a>
                        </li>
                    </ul>
                    <hr>
                    <div class="pb-4">
                        <a href="../proses/logika_logout.php" class="text-dark text-decoration-none light-70" id="logout">
                            <i class="fas fa-sign-out-alt"></i> <span class="d-none d-sm-inline">Logout</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col py-3">
                <div class="container mt-5">
                    <!-- Search Box -->
                    <div class="search-box">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
                            <div class="input-group rounded">
                                <!-- Input Pencarian -->
                                <input type="search" class="form-control rounded" placeholder="Search by name or category" aria-label="Search" aria-describedby="search-addon" name="search" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                                <!-- Tombol Cari -->
                                <span class="input-group-text border-0" id="search-addon">
                                    <i class="fas fa-search"></i>
                                </span>
                            </div>
                        </form>
                    </div>

                    <h1 class="text-center mb-4">Daftar Resep</h1>
                    <div class="row">
                        <?php
                        // Include file koneksi database
                        include "../db/koneksi.php";

                       // Query awal untuk menampilkan semua data dari tabel details dengan join ke tabel category dan difficulty
$query = "SELECT d.*, c.tipe AS nama_kategori, di.level AS nama_tingkat_kesulitan
FROM details d
JOIN category c ON d.id_category = c.id_category
JOIN difficulty di ON d.id_difficulty = di.id_difficulty";

// Periksa apakah ada parameter pencarian
if (isset($_GET['search']) && !empty($_GET['search'])) {
$search = mysqli_real_escape_string($conn, $_GET['search']);
// Tambahkan kondisi pencarian ke query
$query .= " WHERE d.nama_makanan LIKE '%$search%' OR c.tipe LIKE '%$search%'";
}

// Lakukan query ke database
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

// Mengecek apakah ada hasil pencarian
if (mysqli_num_rows($result) > 0) {
// Jika ada, tampilkan hasil pencarian
$current_category = '';
while ($row = mysqli_fetch_assoc($result)) {
if ($current_category != $row['id_category']) {
  if ($current_category != '') {
      echo "</tbody></table><br/>";
  }
  $current_category = $row['id_category'];
  echo "<h2>Kategori: " . $row['nama_kategori'] . "</h2>";
  echo "<table class='table table-bordered'>";
  echo "<thead><tr>
          <th>Gambar</th>
          <th>Nama</th>
          <th>Deskripsi</th>
          <th>Durasi</th>
          <th>Kesulitan</th>
          <th>Action</th>
          </tr></thead><tbody>";
}
echo "<tr>
<td><img src='../uploads/{$row['foto']}' class='img-thumbnail' alt='Foto Makanan'></td>
<td>" . $row['nama_makanan'] . "</td>
<td>" . substr($row['deskripsi'], 0, 50) . "...</td>
<td>" . $row['durasi'] . ' Menit' . "</td>
<td>" . $row['nama_tingkat_kesulitan'] . "</td>
<td>
  <a href='view.php?id=" . $row['id_details'] . "' class='btn btn-primary btn-sm mr-2'><i class='fas fa-eye'></i> View</a>
  <a href='edit.php?id=" . $row['id_details'] . "' class='btn btn-success btn-sm mr-2'><i class='fas fa-edit'></i> Edit</a>
  <a href='delete.php?id=" . $row['id_details'] . "' class='btn btn-danger btn-sm'><i class='fas fa-trash'></i> Delete</a>
</td>
</tr>";
}
if ($current_category != '') {
echo "</tbody></table><br/>";
}
} else {
// Jika tidak ada hasil pencarian, tampilkan pesan
echo "<div class='alert alert-warning' role='alert'>Tidak ada resep yang ditemukan.</div>";
}

// Menutup koneksi database
mysqli_close($conn);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

