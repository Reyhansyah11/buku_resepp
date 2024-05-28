<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Resep</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .card {
            border-radius: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .card:hover {
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }
        
        .card-img-top {
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            height: 250px;
            object-fit: cover;
        }
        
        .card-body {
            padding: 20px;
        }
        
        .card-title {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #333;
            text-decoration: none;
        }
        
        .card-title:hover {
            color: #28a745;
        }
        
        .card-text {
            margin-bottom: 15px;
            color: #666;
        }
        
        .list-group-item {
            border-color: transparent;
            font-size: 0.9rem;
            color: #888;
        }
        
        .btn {
            border-radius: 10px;
            font-size: 0.9rem;
            padding: 8px 20px;
        }

        .modal-content {
            border-radius: 20px;
        }
        
        .modal-header {
            border-bottom: none;
        }
        
        .modal-footer {
            border-top: none;
        }

        .read-more-content {
            display: none;
        }

        .read-more-toggle::after {
            content: "Read More";
            color: #007bff;
            cursor: pointer;
        }

        .read-more-toggle.active::after {
            content: "Read Less";
        }
        
        .search-box {
            max-width: 400px;
            margin: 50px auto;
            margin-top: 50px;
        }

        .search-box .input-group-text {
            background: transparent;
        }
    </style>
</head>

<body>
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


<!-- Recipe Section -->
<section class="container mt-5">
    <h2 class="text-center mb-4">Recipe List</h2>
    <div class="row">
        <?php
        // Include file koneksi database
        include "../db/koneksi.php";

        // Pagination
        $limit = 6; // Jumlah item per halaman
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $limit;
        
        // Query untuk menampilkan data berdasarkan pencarian dengan paginasi
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $query = "SELECT d.*, c.tipe AS nama_kategori, di.level AS nama_tingkat_kesulitan 
                  FROM details d 
                  JOIN category c ON d.id_category = c.id_category 
                  JOIN difficulty di ON d.id_difficulty = di.id_difficulty";
        if ($search) {
            // Jika input pencarian cocok dengan nama makanan atau kategori
            $query .= " WHERE d.nama_makanan LIKE '%" . mysqli_real_escape_string($conn, $search) . "%' OR c.tipe LIKE '%" . mysqli_real_escape_string($conn, $search) . "%'";
        }
        $query .= " ORDER BY d.id_category, d.id_details DESC LIMIT $limit OFFSET $offset";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        
        while ($row = mysqli_fetch_assoc($result)) {
            // Tampilkan hasil pencarian
            echo "<div class='col-md-4 mb-4'>
                    <div class='card'>
                        <img src='../uploads/{$row['foto']}' class='card-img-top' alt='Foto Makanan'>
                        <div class='card-body'>
                            <a href='#' class='card-title'>{$row['nama_makanan']}</a>
                            <p class='card-text'>
                                <span class='read-more-short'>" . substr($row['deskripsi'], 0, 100) . "...</span>
                                <span class='read-more-content'>{$row['deskripsi']}</span>
                            </p>
                            <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal{$row['id_details']}'>
                                Lihat Resep
                            </button>
                        </div>
                    </div>
                  </div>";
        }

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='col-md-4 mb-4'>
            <div class='card'>
                <img src='../uploads/{$row['foto']}' class='card-img-top' alt='Foto Makanan'>
                <div class='card-body'>
                    <a href='#' class='card-title'>{$row['nama_makanan']}</a>
                    <p class='card-text'>
                        <span class='read-more-short'>" . substr($row['deskripsi'], 0, 100) . "...</span>
                        <span class='read-more-content'>{$row['deskripsi']}</span>
                    </p>
                    <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal{$row['id_details']}'>
                        Lihat Resep
                    </button>
                </div>
            </div>
          </div>";

          
    // Modal
    echo "<div class='modal fade' id='myModal{$row['id_details']}' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog modal-lg' role='document'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>{$row['nama_makanan']}</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                    <div class='modal-body'>
                        <img src='../uploads/{$row['foto']}' class='card-img-top mb-3' alt='Foto Makanan'>
                        <p><strong>Deskripsi:</strong> {$row['deskripsi']}</p>
                        <ul class='list-group list-group-flush'>
                            <li class='list-group-item'><strong>Kategori:</strong> {$row['nama_kategori']}</li>
                            <li class='list-group-item'><strong>Tingkat Kesulitan:</strong> {$row['nama_tingkat_kesulitan']}</li>
                            <li class='list-group-item'><strong>Durasi:</strong> {$row['durasi']} Menit</li>
                            <li class='list-group-item'><strong>Resep:</strong>
                                <ul>";
                                $resep_list = explode("\n", $row['resep']);
                                foreach ($resep_list as $item) {
                                    echo "<li>$item</li>";
                                }
                                echo "</ul>
                            </li>
                        </ul>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Tutup</button>
                    </div>
                </div>
            </div>
        </div>";
        }
        ?>
    </div>
</section>


<!-- Pagination -->
<section class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <ul class="pagination justify-content-center">
                <?php
                // Pagination Links
                $total_query = "SELECT COUNT(*) AS total FROM details";
                if ($search) {
                    $total_query .= " WHERE nama_makanan LIKE '%" . mysqli_real_escape_string($conn, $search) . "%'";
                }
                $total_result = mysqli_query($conn, $total_query) or die(mysqli_error($conn));
                $total_row = mysqli_fetch_assoc($total_result)['total'];
                $total_pages = ceil($total_row / $limit);

                $prev_page = $page - 1;
                $next_page = $page + 1;

                echo "<li class='page-item " . ($page == 1 ? 'disabled' : '') . "'><a class='page-link' href='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "?page=$prev_page" . (isset($_GET['search']) ? "&search=" . $_GET['search'] : '') . "'><i class='fas fa-angle-left'></i></a></li>";

                for ($i = 1; $i <= $total_pages; $i++) {
                    $active = ($i == $page) ? 'active' : '';
                    echo "<li class='page-item $active'><a class='page-link' href='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "?page=$i" . (isset($_GET['search']) ? "&search=" . $_GET['search'] : '') . "'>$i</a></li>";
                }

                echo "<li class='page-item " . ($page == $total_pages ? 'disabled' : '') . "'><a class='page-link' href='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "?page=$next_page" . (isset($_GET['search']) ? "&search=" . $_GET['search'] : '') . "'><i class='fas fa-angle-right'></i></a></li>";
                ?>
            </ul>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
