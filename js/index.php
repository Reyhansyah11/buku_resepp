<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodypedia</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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

        .gradient-text-blue {
            background: linear-gradient(135deg, #003d99, #0075FF);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .black{
            color: #000000;
        }

        .bg-blue-opacity {
    background-color: rgba(0, 123, 255, 0.8); /* Warna biru primary dengan opasitas 0.5 */
}

        .navbar{
            height: 50px;
        }

        .hero {
            background-image: url('../assets/2149141362.jpg') ;
            background-size: cover;
            height: 340px;
            background-position: center;
            color: #ffffff; /* Mengatur warna teks untuk kontras dengan gambar latar belakang */
            padding: 100px 0; /* Sesuaikan sesuai kebutuhan */
            margin-top: 50px; /* Menambahkan margin top agar tidak menempel pada navbar */
        }

        .hero-content {
            max-width: 600px; /* Batasi lebar konten agar tidak terlalu lebar di layar yang besar */
            margin: 0 auto; /* Mengatur margin horizontal menjadi auto untuk membuat konten berada di tengah */
            text-align: center; /* Mengatur teks ke tengah */
        }

        .card {
            border-radius: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            margin-top: 50px;
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
        }

        .search-box .input-group-text {
            background: transparent;
        }
    </style>
</head>
<body>

<!-- Navbar Section -->
<nav class="navbar navbar-expand-lg navbar-light bg-blue-opacity fixed-top" role="navigation">
    <div class="container">
        <a class="navbar-brand" href="#">Brand</a>

        <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
            <li class="dropdown order-1">
                <button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn dropdown-toggle">Login <span class="caret"></span></button>
                <ul class="dropdown-menu dropdown-menu-right mt-1">
                    <li class="p-3">
                        <form class="form" role="form" action="../proses/logika_login.php" method="POST"> <!-- Menambahkan action dan method -->
                            <div class="form-group">
                                <input id="nameInput user_name" name="user_name" placeholder="user_name" class="form-control form-control-sm user_name" type="text" required="">
                            </div>
                            <div class="form-group">
                                <input id="passwordInput password" name="password" placeholder="Password" class="form-control form-control-sm password" type="password" required=""> <!-- Mengubah type menjadi password -->
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                            <div class="form-group text-xs-center">
                                <small><a href="#">Forgot password?</a></small>
                            </div>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 hero-content black">
                <h1>Welcome to <span class="gradient-text-blue"> Foodypedia </span></h1>
                <p class="light-70">Discover delicious recipes from around the world.</p>
            </div>
        </div>
    </div>
</section>

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


<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
