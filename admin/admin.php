<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALS || FOOD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/Group 24.png" type="image/x-icon">
    <style>
        .gradient-text {
            background: linear-gradient(135deg, #E61717, #F87E08);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .col-auto.bg {
    border-right: 1px solid rgba(0, 0, 0, 0.125); /* Warna border */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Bayangan */
}
        .light-70 {
            color: #ffffff;
            font-weight: 600;
            backdrop-filter: blur(5px);
            transition: backdrop-filter 0.3s ease;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
            border-radius: 10px;
            display: inline-block;
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
        .navbar-brand img {
            width: 100px;
            position: relative;
            left: 30px;
        }
        .bg {
            background: url('../assets/unsplash_jlNtfHi8oiI.png');
            background-size: cover;
            background-position: right;
        }
        th, td {
            text-align: center;
        }
        .nav-pills {
            margin-top: 20px;
        }
        .img-thumbnail {
            width: 50px;
            height: 50px;
        }
        .full-description {
            display: none;
        }
        .search-box {
            margin-bottom: 50px;
        }
        .search-box .input-group-text {
            background: transparent;
        }
        .black {
            color: #000000;
            font-weight: 600;
        }
        /* Ukuran teks untuk desktop */
        th, td {
            font-size: 14px;
        }
        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
        } 
        .btn-sm i {
            margin-right: 0.2rem;
        }
        /* Media query untuk responsif */
        @media (max-width: 767px) {
            .navbar-brand img {
            width: 50px;
            position: relative;
            left: 10px;
        }

        h1{
            font-size: 20px;
        }
        h2{
            font-size: 14px ;
        }
            .hide-on-small {
                display: none;
            }
            th, td {
                font-size: 10px;
            }
            .btn-sm {
                font-size: 0.75rem;
                padding: 0.25rem;
            }
            .btn-sm i {
                margin-right: 0;
            }
            .btn-sm span {
                display: none;
            }
        }
    </style>
</head>
<body>

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto bg col-md-3 col-xl-2 px-sm-2 px-0">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 min-vh-100">
                    <a class="navbar-brand" href="#">
                        <img src="../assets/Group 24.png" alt="">
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li>
                            <a href="/" data-bs-toggle="collapse" class="nav-link px-0 align-middle text-dark">
                                <i class="fas fa-tachometer-alt black"></i> <span class="ms-1 d-none d-sm-inline black">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="tambah_details.php" class="nav-link px-0 align-middle text-dark">
                                <i class="fas fa-plus black"></i> <span class="ms-1 d-none d-sm-inline black">Tambah Resep</span>
                            </a>
                        </li>
                        <li>
                            <a href="tambah_category.php" class="nav-link px-0 align-middle text-dark">
                                <i class="fas fa-tags black"></i> <span class="ms-1 d-none d-sm-inline black">Kategori</span>
                            </a>
                        </li>
                        <li>
                            <a href="tambah_difficulty.php" class="nav-link px-0 align-middle text-dark">
                                <i class="fas fa-signal black"></i> <span class="ms-1 d-none d-sm-inline black">Tingkat Kesulitan</span>
                            </a>
                        </li>
                    </ul>
                    <hr>
                    <div class="pb-4">
                        <a href="../proses/logika_logout.php" class="text-dark text-decoration-none light-70" id="logout">
                            <i class="fas fa-sign-out-alt black"></i> <span class="d-none d-sm-inline black">Logout</span>
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
                        <!-- Input search -->
                        <input
                            type="search"
                            class="form-control rounded"
                            placeholder="Search by name"
                            aria-label="Search"
                            aria-describedby="search-addon"
                            name="search"
                            value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"
                        >
                        <span class="input-group-text border-0" id="search-addon">
                            <i class="fas fa-search gradient-text"></i>
                        </span>
                    </div>
                </form>
            </div>

<!-- category -->
<div class="pilih-box">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
        <div class="input-group rounded">
            <div class="input-group-prepend">
                <select class="custom-select" name="pilih">
                    <option value="" <?php echo empty($_GET['pilih']) ? 'selected' : ''; ?>>
                        All Categories
                    </option>
                    <option value="heavy food" <?php echo isset($_GET['pilih']) && $_GET['pilih'] == 'heavy food' ? 'selected' : ''; ?>>
                        Heavy Food
                    </option>
                    <option value="light food" <?php echo isset($_GET['pilih']) && $_GET['pilih'] == 'light food' ? 'selected' : ''; ?>>
                        Light Food
                    </option>
                    <option value="Dessert" <?php echo isset($_GET['pilih']) && $_GET['pilih'] == 'Dessert' ? 'selected' : ''; ?>>
                        Dessert
                    </option>
                    <option value="snack" <?php echo isset($_GET['pilih']) && $_GET['pilih'] == 'snack' ? 'selected' : ''; ?>>
                        Snack
                    </option>
                    <option value="Jus" <?php echo isset($_GET['pilih']) && $_GET['pilih'] == 'Jus' ? 'selected' : ''; ?>>
                        Juice
                    </option>
                </select>
            </div>
            <div class="input-group-append">
                <button class="btn btn-transparent btn-block text-dark" type="submit" value="<?php echo isset($_GET['pilih']) ? htmlspecialchars($_GET['pilih']) : ''; ?>">
                    Check
                </button>
            </div>
        </div>
    </form>
</div>
</div>


                    <h1 class="text-center mb-4">Daftar Resep</h1>
                    <div class="row">
                        <?php
                        // Include file koneksi database
                        include "../db/koneksi.php";

                        // Query awal untuk menampilkan semua data dari tabel details dengan join ke tabel category dan difficulty
                        $search = isset($_GET['search']) ? $_GET['search'] : '';
                        $pilih = isset($_GET['pilih']) ? $_GET['pilih'] : '';
                        $query = "SELECT d.*, c.tipe AS nama_kategori, di.level AS nama_tingkat_kesulitan 
                        FROM details d 
                        JOIN category c ON d.id_category = c.id_category 
                        JOIN difficulty di ON d.id_difficulty = di.id_difficulty";
                
                // Menambahkan kondisi WHERE jika ada pencarian atau pemilihan kategori
                $whereClause = [];
                if ($search) {
                  $whereClause[] = "d.nama_makanan LIKE '%" . mysqli_real_escape_string($conn, $search) . "%'";
                }
                if ($pilih) {
                  $whereClause[] = "c.tipe = '" . mysqli_real_escape_string($conn, $pilih) . "'";
                }
                
                // Menggabungkan semua kondisi WHERE menggunakan operator AND
                if (!empty($whereClause)) {
                  $query .= " WHERE " . implode(" AND ", $whereClause);
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
                                        <th>Nama</th>
                                        <th class='hide-on-small'>Gambar</th>
                                        <th class='hide-on-small'>Deskripsi</th>
                                        <th class='hide-on-small'>Durasi</th>
                                        <th class='hide-on-small'>Kesulitan</th>
                                        <th>Action</th>
                                        </tr></thead><tbody>";
                                }
                                echo "<tr>
                                    <td>" . $row['nama_makanan'] . "</td>
                                    <td class='hide-on-small'><img src='../uploads/{$row['foto']}' class='img-thumbnail' alt='Foto Makanan'></td>
                                    <td class='hide-on-small'>" . substr($row['deskripsi'], 0, 50) . "...</td>
                                    <td class='hide-on-small'>" . $row['durasi'] . ' Menit' . "</td>
                                    <td class='hide-on-small'>" . $row['nama_tingkat_kesulitan'] . "</td>
                                    <td>
                                        <a href='view.php?id=" . $row['id_details'] . "' class='btn btn-primary btn-sm mr-2'><i class='fas fa-eye'></i> <span>View</span></a>
                                        <a href='edit.php?id=" . $row['id_details'] . "' class='btn btn-success btn-sm mr-2'><i class='fas fa-edit'></i> <span>Edit</span></a>
                                        <form action='delete.php' method='post' style='display:inline-block;' onsubmit='return confirm(\"Yakin ingin menghapus resep?\")'>
                                            <input type='hidden' name='delete_id' value='" . $row['id_details'] . "'>
                                            <button type='submit' class='btn btn-danger btn-sm'><i class='fas fa-trash'></i> <span>Delete</span></button>
                                        </form>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/js/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
